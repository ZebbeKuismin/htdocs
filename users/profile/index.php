<!DOCTYPE html>
<html>
<head>
<title>magicusxyz</title>
<link rel='stylesheet' type='text/css' href='/css/stylesheet.css'/>
<link rel='stylesheet' type='text/css' href='/css/materialize.css'/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/materialize.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

</head>
<body style="background:#3B3F51">
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/php/session.class.php";
    include_once($path);
    $sess = new Session();
    $sess->Init();
    if(isset($_COOKIE["session"]))
    {
        $cookie = $_COOKIE["session"];
        $account = $sess->Verify($_COOKIE["session"]);
    }
    else
    {
        $account=0;
    }
    if(!isset($_GET['username']))
    {
        header('Location: /users');
    }
?>
<ul id="moredropdown" class="dropdown-content">
    <li><a href="/settings">Settings</a></li>
    <li><a href="/exchange">Exchange</a></li>
    <li class="divider"></li>
    <?php
            if($account==0)
            {
                echo '<li><a href="/">Login</a></li>';
            }
            else
            {
                echo '<li><a class="logout">Logout</a></li>';
            }
    ?>
</ul>
<nav>
    <div class="nav-wrapper" style="background-color:#660198">
    <a href="/" class="brand-logo">Magicus</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/home">Home</a></li>
            <li><a href="/games">Games</a></li>
            <li><a href="/catalog">Catalog</a></li>
            <li><a href="/users">Users</a></li>
            <li><a href="/forum">Forum</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="moredropdown">More<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="/home">Home</a></li>
            <li><a href="/games">Games</a></li>
            <li><a href="/catalog">Catalog</a></li>
            <li><a href="/users">Users</a></li>
            <li><a href="/forum">Forum</a></li>
            <li><a href="/settings">Settings</a></li>
            <li><a href="/exchange">Exchange</a></li>
            <li class="divider"></li>
            <?php
            if($account==0)
            {
                echo '<li><a href="/">Login</a></li>';
            }
            else
            {
                echo '<li><a class="logout">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
<?php
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
        if ($conn->connect_error)
        {
            trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
            echo 'unable to connect to database';
        }
    $username = $_GET['username'];
    $query = "SELECT username,id,time,posts FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $username); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($username_result,$id_result,$time_result,$posts_result);
        $stmt->fetch();
        $time_result = strtok($time_result, " ");
        $time_result = explode("-",$time_result);
        $date_joined = array('year'=>$time_result[0],'month'=>$time_result[1],'day'=>$time_result[2]);
        $stmt->close();
        if($username_result!='')
        {
        $query = "SELECT blurb,status,friends,count FROM social WHERE username = ?";
            $blurb_stmt = $conn->prepare($query);
            if ($blurb_stmt)
            {
                $blurb_stmt->bind_param("s", $username_result); /* s = string, i = integer, d = double,  b = blob */
                $blurb_stmt->execute();
                $blurb_stmt->bind_result($blurb_result,$status_result,$friends_data,$friends_count);
                $blurb_stmt->fetch();
                $img_result = strtoupper(substr($username_result,0,1));
                $blurb_stmt->close();
            }
        }
        else
        {
            header('Location: /users');
        }
    }
?>
<div id="users" class="row">
    <div class="col s3 offset-s1">
        <?php echo "<img src='/profileimages/$img_result.png' style='width:100%;height:100%'>"; ?>
    </div>
    <div class="card col s7" style="color:#3B3F51">
        <h1><?php echo $username_result; ?></h1>
        <?php
        if($status_result!='')
        {
            $status_result = nl2br(htmlspecialchars($status_result));
            echo "<p style='text-style:italic'>\"$status_result\"</p>";
        }
        $blurb_result = nl2br(htmlspecialchars($blurb_result));
        ?>
        <div class="border" style="height:1px;background-color:#660198"></div>
        <h6 style="word-wrap:break-word"><?php echo $blurb_result; ?></h6>
        <div class="border" style="height:1px;background-color:#660198"></div><br>
        <a style="background-color:#660198" href="#!" class="btn waves-effect waves-light">Message</a>
        <a style="background-color:#660198" href="#!" class="btn waves-effect waves-light">Add Friend</a>
        <div style="height:10px"></div>
    </div>

    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <h3>Achievements</h3>
        <div class="border" style="height:1px;background-color:#660198"></div>
        <img src="/svg/gameboy.svg" title="From the 80s">
        <img src="/svg/program.svg" title="Made this thing">
        <img src="/svg/tank.svg" title="Crashed a tank">
        <img src="/svg/smile.svg" title="Winked at someone">
        <img src="/svg/football.svg" title="Played football">
        <img src="/svg/bamboo.svg" title="Found some bamboo">
    </div>
    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <h3>Statistics</h3>
        <div class="border" style="height:1px;background-color:#660198"></div>
        <div class="col s3">
            <h5 style="text-align:center">Date Joined</h5><h5 style="text-align:center">
                <?php echo $date_joined['month'].' '.$date_joined['day'].' '.$date_joined['year']; ?>
            </h5>
        </div>
        <div class="col s3">
            <h5 style="text-align:center">Forum Posts</h5><h5 style="text-align:center"><?php echo $posts_result; ?></h5>
        </div>
        <div class="col s3">
            <h5 style="text-align:center">Friend Count</h5><h5 style="text-align:center"><?php echo $friends_count; ?></h5>
        </div>
        <div class="col s3">
            <h5 style="text-align:center">User Number</h5><h5 style="text-align:center"><?php echo $id_result; ?></h5>
        </div>
    </div>
</div>

<footer class="page-footer" style="background-color:#660198">
<div class="container"> <!--Remove style later-->
<div class="row">
<div class="col l6 s12">
<h5 class="white-text">Magicus</h5>
<p class="grey-text text-lighten-4">Note to self: do stuff here...but later</p>
</div>
<div class="col l4 offset-l2 s12">
<h5 class="white-text">Links</h5>
<ul>
<li><a class="grey-text text-lighten-3" href="about">About</a></li>
<li><a class="grey-text text-lighten-3" href="mailto:beaujibby@gmail.com">Contact Us</a></li>
<li><a class="grey-text text-lighten-3" href="https://en.wikipedia.org/wiki/Boredom">Legal</a></li>
<li><a class="grey-text text-lighten-3" href="creators">Creators</a></li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright">
<div class="container">
6 03 16
<a class="grey-text text-lighten-4 right" href="#!">beaujibby</a>
</div>
</div>
</footer>

<?php
?>
</body>
</html>