<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/php/session.class.php";
include_once($path);
$sess = new Session();
$sess->Init();
$cookie = $_COOKIE["session"];
if(isset($_POST['status']))
{
    $status = $_POST['status'];
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "UPDATE social SET `status`= ? where cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("ss", $status,$cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->close();
        echo 'success';
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