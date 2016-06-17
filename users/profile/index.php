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
                echo '<li><a id="logout">Logout</a></li>';
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
                echo '<li><a id="logout">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<div id="users" class="row">
    <div class="col s3 offset-s1">
        <img src="/images/blogo.png" style="width:100%;height:100%">
    </div>
    <div class="card col s7" style="color:#3B3F51">
        <h1>beaujibby</h1>
        <div class="border" style="height:1px;background-color:#ee6e73"></div>
        <h6 style="word-wrap:break-word">filler content filler content filler content filler content filler content filler content filler content</h6>
        <div class="border" style="height:1px;background-color:#ee6e73"></div><br>
        <a style="background-color:#ee6e73" href="#!" class="btn waves-effect waves-light">Message</a>
        <a style="background-color:#ee6e73" href="#!" class="btn waves-effect waves-light">Add Friend</a>
        <div style="height:10px"></div>
    </div>

    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <h3>Achievements</h3>
        <div class="border" style="height:1px;background-color:#ee6e73"></div>
        <img src="/svg/gameboy.svg" title="From the 80s">
        <img src="/svg/program.svg" title="Made this thing">
        <img src="/svg/tank.svg" title="Crashed a tank">
        <img src="/svg/smile.svg" title="Winked at someone">
        <img src="/svg/football.svg" title="Played footbal">
        <img src="/svg/bamboo.svg" title="Found some bamboo">
    </div>
    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <h3>Statistics</h3>
        <div class="border" style="height:1px;background-color:#ee6e73"></div>
        <div class="col s3"><h5 style="text-align:center">Date Joined</h5><h5 style="text-align:center">06 03 16</h6></div>
        <div class="col s3"><h5 style="text-align:center">Forum Posts</h5><h5 style="text-align:center">0</h6></div>
        <div class="col s3"><h5 style="text-align:center">Friend Count</h5><h5 style="text-align:center">0</h6></div>
        <div class="col s3"><h5 style="text-align:center">User Number</h5><h5 style="text-align:center">1</h6></div>
    </div>
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