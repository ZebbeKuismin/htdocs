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

<div id="forum" class="row">
    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <h1>Forum</h1>
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color:#3B3F51;display:inline">Magicus</h4><h5 class="right" style="color:#3B3F51;display:inline">Threads</h5></li>
            <a href="showforum?id=1" class="collection-item" style="color:#3B3F51;font-size:1rem">General Discussions
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=2" class="collection-item" style="color:#3B3F51;font-size:1rem">Help
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=3" class="collection-item" style="color:#3B3F51;font-size:1rem">Suggestions &amp; Ideas
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=4" class="collection-item" style="color:#3B3F51;font-size:1rem">Programmers
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
        </ul>
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color:#3B3F51;display:inline">Guilds</h4><h5 class="right" style="color:#3B3F51;display:inline">Threads</h5></li>
            <a href="showforum?id=5" class="collection-item" style="color:#3B3F51;font-size:1rem">Off Topic
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=6" class="collection-item" style="color:#3B3F51;font-size:1rem">Video Games
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=7" class="collection-item" style="color:#3B3F51;font-size:1rem">Item Duscussion
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="showforum?id=8" class="collection-item" style="color:#3B3F51;font-size:1rem">Exclusive Beta Forum
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
        </ul>
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