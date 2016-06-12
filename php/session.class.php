<?php
class Session
{
	private $OpenID;
	private $OnLoginCallback;
	private $OnLoginFailedCallback;
	private $OnLogoutCallback;

	public function __construct($Server = 'DEFAULT')
	{
	}

	public function __call($closure, $args)
	{
	}

	public function Init()
	{
        define('DB_SERVER', "localhost");
        define('DB_USER', "username");
        define('DB_PASSWORD', "password");
        define('DB_TABLE', "sqlserver");
	}

	function generateRandomString($length) {
		$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function Login()
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql = new mysqli("localhost","username","password","sqlserver");
		$checklogin = "SELECT * FROM sqlserver.accounts WHERE username='".$username."'";
		$checklogin = $sql->query($checklogin);
		$checklogin = $checklogin->fetch_assoc();
		$sql->close();

		$correctpassword = $checklogin['password'];
		if($password==$correctpassword)
		{
			setcookie("session",$checklogin['cookie'],time()+3600*24,"/");
            header("Refresh:0");
		}
	}

	public function CreateAccount($ip)
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql = new mysqli("localhost","username","password","sqlserver");

		$checkusername = "SELECT id FROM sqlserver.accounts WHERE username='".$username."'";
		$checkusername = $sql->query($checkusername);
		$checkusername = $checkusername->fetch_assoc();
		$checkusername = $checkusername['id'];
		if($checkusername=="") //username is not taken, create account
		{
		$id = "SELECT MAX(ID) FROM sqlserver.accounts";
		$id = $sql->query($id);
		$id = $id->fetch_assoc()["MAX(ID)"];
		$id+=1;
        
		$cookie=$this->generateRandomString(30);
		
		$create = "INSERT INTO sqlserver.accounts (`id`, `username`, `password`, `cookie`,`ip`) VALUES (".$id.",'".$username."','".$password."','".$cookie."','".$ip."')";
		$sql->query($create);
		
		$imgquery = "INSERT INTO sqlserver.imageblob (`user_id`) VALUES (".$id.")";
		$sql->query($imgquery);
		
		$sql->close();
        
        $oldmask = umask(0);
        mkdir('../users/'.$username,0777);
        copy('../php/index.php','../users/'.$username.'/index.php');
        umask($oldmask);
        
        header('Location: ../');
		}
		else
		{
		echo '<div class="error">error: username taken</div>';
		}
	}

	public function Verify($cookie)
	{
		$sql = new mysqli("localhost","username","password","sqlserver");
		$user = "SELECT * FROM sqlserver.accounts WHERE cookie='".$cookie."'";
		$user = $sql->query($user);
		$user = $user->fetch_assoc();
		if($user['username']=="")
		{
		return 0;
		}
		return $user;
        $sql->close();
	}

	public function Logout()
	{
		setcookie("session","",time()-1,"/");
		header("Refresh:0");
	}
    
    public function getUsers()
    {
        echo '<div class="results">';
        $query = $_POST['searchbar'];
        $sql = new mysqli("localhost","username","password","sqlserver");
        $query = "SELECT * FROM sqlserver.accounts WHERE username LIKE '%".$query."%'";
        $query = $sql->query($query);
		$sql->close();
        while($user = $query->fetch_assoc())
        {
            echo '<div class="result">';
			echo '<img class="imageresult" src="data:image/jpeg;base64,'.$this->getChatImage($user['id'])['chatimage'].'"></img>';
			//echo '<div class="usernameresult">'.$user['username'].'</div>';
			echo '<a href ="'.$user['username'].'" class="usernameresult">'.$user['username'].'</a>';
			echo '</div>';
			//echo '<a class = "result" href = "../profile">'.$user['username'].' '.$user['blurb'].'</a><br>';
			
			//echo '<a class = "result" href = "http://www.astrum.xyz/profile/">'.$user['username'].' '.$user['blurb'].'</a><br>'; //fix css
        }
        echo '</div>';
    }
    
    public function getUsername($cookie)
    {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT username FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($username_result);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $username_result;
    }
        else
        {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return '';
    }
    public function getEmail($cookie)
    {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT email FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($email_result);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $email_result;
    }
        else
        {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return '';
    }
    public function getBirthday($cookie)
    {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT birthday FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($birthday_result);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $birthday_result;
    }
        else
        {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return '';
    }
    public function getCash($cookie)
    {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT cash FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($cash_result);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $cash_result;
    }
        else
        {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return '';
    }
    public function getCoins($cookie)
    {
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    
    $query = "SELECT coins FROM accounts WHERE cookie = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $cookie); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($coins_result);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        return $coins_result;
    }
        else
        {
            trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
        }
        $conn->close();
        return '';
    }
    public function getCookie()
    {
        
    }
}
?>