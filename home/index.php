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
        if($account==0){
            header('Location: /');
        }
    }
    else
    {
        header('Location: /');
    }
?>
<ul id="moredropdown" class="dropdown-content">
    <li><a href="#!">Settings</a></li>
    <li><a href="#!">Exchange</a></li>
    <li class="divider"></li>
    <li><a id="logout">Logout</a></li>
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
            <li><a href="#!">Settings</a></li>
            <li><a href="#!">Exchange</a></li>
            <li class="divider"></li>
            <li><a id="logout">Logout</a></li>
        </ul>
    </div>
</nav>
    
<div id="home" class="row">
    <div class="col s3 offset-s1">
        <img src="/images/blogo.png" style="width:100%;height:100%">
    </div>
    <div class="card col s7" style="color:#3B3F51">
        <h1>Hello <?php echo $sess->getUsername($cookie); ?></h1>
        <div class="border" style="height:1px;background-color:#ee6e73"></div>
        <br>
        <div class="input-field col s7">
            <input id="status" type="text" class="validate">
            <label for="status">Status</label>
        </div>
        <div class="col s7">
            <img src="/svg/wallet.svg" style="float:left" title="cash">
            <p style="font-size:24px;line-height:24px;display: inline;"><?php echo $sess->getCash($cookie).' Cash'; ?></p>
            <br>
        </div>
        <div class="col s7">
            <img src="/svg/coin.svg" style="float:left" title="coins">
            <p style="font-size:24px;line-height:24px;display:inline"><?php echo $sess->getCoins($cookie).' Coins'; ?></p>
            <br>
        </div>
    </div>
    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color:#3B3F51">Notifications</h4></li>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Messages
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Friends Online
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">New Items
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Forum Replies
                <span class="badge" style="color:#3B3F51">4</span>
            </a>
        </ul>
    </div>
    <div class="card col s10 offset-s1" style="color:#3B3F51">
        <ul class="collection with-header">
            <li class="collection-header"><h4 style="color:#3B3F51">Friend Activity</h4></li>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Admin
                <p>went to the park</p>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">John Doe
                <p>played golf</p>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Jane Doe
                <p>wrote a book</p>
            </a>
            <a href="#!" class="collection-item" style="color:#3B3F51;font-size:1rem">Link
                <p>found it dangerous to go alone</p>
            </a>
        </ul>
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