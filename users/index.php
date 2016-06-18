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
    <div class="nav-wrapper">
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

<div id="search" class="row">
    <div class="card col s10 offset-s1">
        <h1>User Search</h1>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="user-search-bar" type="text" class="validate">
                    <label for="user-search-bar">Username</label>
                </div>
                <a id="user-search-button" class="btn waves-effect waves-light" type="submit" name="username" style="background-color:#ee6e73">Search
                    <i class="material-icons right">send</i>
                </a>
            </div>
        </form>
    </div>
    <?php
    if(isset($_GET['username']))
    {
        echo "<div id='results' class='col s10 offset-s1'>";
        $username_wildcard='%'.$_GET['username'].'%';
        $users = array();
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
        if ($conn->connect_error)
        {
            trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
            echo 'unable to connect to database';
        }

        $query = "SELECT username FROM accounts WHERE username LIKE ?";
        $stmt = $conn->prepare($query);
        if ($stmt)
        {   
            $stmt->bind_param("s", $username_wildcard); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
            $stmt->execute();
            $stmt->bind_result($username_result);
            $users=array();
            while($stmt->fetch())
            {
                $users[]=$username_result;
            }
            $stmt->close();
            foreach($users as $username_result)
            {
            $query = "SELECT blurb FROM social WHERE username = ?";
                $blurb_stmt = $conn->prepare($query);
                if ($blurb_stmt)
                {
                    $blurb_stmt->bind_param("s", $username_result); /* s = string, i = integer, d = double,  b = blob */
                    $blurb_stmt->execute();
                    $blurb_stmt->bind_result($blurb_result);
                    $blurb_stmt->fetch();
                    $img = strtoupper(substr($username_result,0,1));
                    echo "<div class='col s3'>
                            <div class='card' style='overflow: hidden;'>
                                <div class='card-image waves-effect waves-block waves-light'>
                                    <img class='activator' src='/profileimages/$img.png'>
                                </div>
                                <div class='card-content'>
                                    <span class='card-title activator grey-text text-darken-4'>$username_result
                                        <i class='material-icons right'>more_vert</i>
                                    </span>
                                </div>
                                <div class='card-action'>
                                    <a href='/users/profile?username=$username_result'>View Profile</a>
                                </div>
                                <div class='card-reveal' style='display: none; transform: translateY(0px);'>
                                    <span class='card-title grey-text text-darken-4'>$username_result<i class='material-icons right'>close</i></span>
                                    <p>$blurb_result</p>
                                </div>
                            </div>
                        </div>";
                $blurb_stmt->close();
                }
            }
        }
        echo "</div>";
    }
    ?>
    <!--?php
        if(isset($_GET['username']))
        {
            echo '<div class="col s10 offset-s1">
                <div class="white col s6" style="border:1px solid #3B3F51">
                <img src="/profileimages/B.png" style="width:35px;height:35px;float:left">
                <h4>beaujibby</h4>
                </div>
                <div class="white col s6" style="border:1px solid #3B3F51">
                    <h4>beaujibby</h4>
                </div>
            </div>';
        }
    ?-->
</div>

<footer class="page-footer">
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