<!DOCTYPE html>
<html>
<head>
<title>magicusxyz</title>
<link rel='stylesheet' type='text/css' href='/css/stylesheet.css'/>
<link rel='stylesheet' type='text/css' href='/css/materialize.css'/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/materialize.js"></script>

</head>
<body style="background:#3B3F51">

<ul id="moredropdown" class="dropdown-content">
    <li><a href="#!">Settings</a></li>
    <li><a href="#!">Exchange</a></li>
    <li class="divider"></li>
    <li><a href="#!">Logout</a></li>
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
            <li><a href="#!">Logout</a></li>
        </ul>
    </div>
</nav>
    
<div id="catalog" class="row">
    <div class="card col s10 offset-s1">
        <h1>Games</h1>
    </div>
    <div class="col s3 offset-s1">
        <div class="card" style="overflow: hidden;">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="/catalog/catalogimages/picture.png">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Rice Bowl Hunt<i class="material-icons right">more_vert</i></span>
                <p><a href="#!">beaujibby</a></p>
            </div>
            <div class="card-action">
                <a href="#">Play Now</a>
                <a href="#">View Game</a>
            </div>
            <div class="card-reveal" style="display: none; transform: translateY(0px);">
                <span class="card-title grey-text text-darken-4">Rice Bowl Hunt<i class="material-icons right">close</i></span>
                <p>Hunt for rice imported from the rice mines of the farthest reaches of the vast expansive Chinese Himalayas, but beware...these grains are not to be taken lightly...</p>
            </div>
        </div>
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