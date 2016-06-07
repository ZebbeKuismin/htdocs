<!DOCTYPE html>
<html>
<head>
<title>magicusxyz</title>
<link rel='stylesheet' type='text/css' href='css/loginsheet.css'/>
<link rel='stylesheet' type='text/css' href='css/materialize.css'/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>

</head>
<body style="background:#3B3F51">

<div class="row">
<div class="col s12">
<ul class="tabs">
<li class="tab col s3"><a class="active" href="#home">Home</a></li>
<li class="tab col s3"><a href="#games">Games</a></li>
<li class="tab col s3"><a href="#catalog">Catalog</a></li>
<li class="tab col s3"><a href="#users">Users</a></li>
<li class="tab col s3"><a href="#forum">Forum</a></li>
</ul>
</div>
    
</div>
    
<div id="home" class="row">
    <div class="col s3 offset-s1">
        <img src="blogo.png" style="width:100%;height:100%">
    </div>
    <div class="card col s7" style="color:#3B3F51">
        <h1>Hello beaujibby</h1>
        <div class="border" style="height:1px;background-color:#ee6e73"></div>
        <br>
        <div class="input-field col s7">
            <input id="status" type="text" class="validate">
            <label for="status">Status</label>
        </div>
        <div class="col s7">
        <img src="/svg/wallet.svg" style="float:left" title="cash">
        <p style="font-size:24px;line-height:24px">100</p>
        <img src="/svg/coin.svg" style="float:left" title="coins">
        <p style="font-size:24px;line-height:24px">50</p>
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
    
<div id="games" class="row">Test 2</div>
<div id="catalog" class="row">Test 3</div>
<div id="users" class="row">
    <div class="col s3 offset-s1">
        <img src="blogo.png" style="width:100%;height:100%">
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

<div id="forum" class="row">Test 5</div>

<footer class="page-footer">
<div class="container" style="margin-top:-50px;height:200px"> <!--Remove style later-->
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
</div>
</div>
</footer>

<?php
?>
</body>
</html>