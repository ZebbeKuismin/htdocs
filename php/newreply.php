<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/php/session.class.php";
include_once($path);
$sess = new Session();
$sess->Init();
if(isset($_POST['body']) && isset($_GET['id']) && $_POST['body']!='' && is_numeric($_GET['id']))
{
    $body = $_POST['body'];
    $body=nl2br($body);
    $cookie= $_COOKIE['session'];
    $thread_id=$_GET['id'];
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT id,username FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($id_result,$username_result);
        $stmt->fetch();
        $stmt->close();
        if($username_result!='')
        {
            $id = "SELECT MAX(ID) FROM sqlserver.replies";
            $id = $conn->query($id);
            $id = $id->fetch_assoc()["MAX(ID)"];
            $id+=1;
            $query = "INSERT INTO replies(`id`, `thread_id`, `poster`, `poster_id`, `body`) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            if ($stmt)
            {
                $stmt->bind_param("iisis",$id,$thread_id,$username_result,$id_result,$body); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
                $stmt->execute();
                $stmt->close();
            }
            $query = "UPDATE threads SET updated=CURRENT_TIMESTAMP WHERE id=?";
            $stmt = $conn->prepare($query);
            if ($stmt)
            {
                $stmt->bind_param("i",$thread_id); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
                $stmt->execute();
                $stmt->close();
                $query = "UPDATE accounts SET posts=posts+1 WHERE id=?";
                $stmt = $conn->prepare($query);
                if ($stmt)
                {
                    $stmt->bind_param("i",$id_result); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
                    $stmt->execute();
                    $stmt->close();
                    echo 'success';
                }
            }
        }
        else
        {
            echo 'failed';
        }
    }
    else
    {
        trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
    }
        $conn->close();
}
else
{
    header('Location: /');
}
?>