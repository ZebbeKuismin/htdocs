<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/php/session.class.php";
include_once($path);
$sess = new Session();
$sess->Init();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT username, password, cookie FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $username); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($username_result, $password_result, $cookie);
        $stmt->fetch();
        $stmt->close();
        if($password==$password_result)
        {
            setcookie("session",$cookie,time()+3600*24,"/");
            echo 'success';
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