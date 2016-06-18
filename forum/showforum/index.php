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
    <a href="/" class="breadcrumb">Magicus</a>
        <a href="/forum" class="breadcrumb">Forum</a>
        <?php if(isset($_GET['id'])){echo '<a href="/forum" class="breadcrumb">Forum #'.$_GET['id'].'</a>';}?>   
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
    <div class="card col s10 offset-s1">
    <h1>SubForum Title</h1>
    <table class="bordered highlight responsive-table">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Author</th>
              <th data-field="price">Replies</th>
              <th data-field="price">Last Post</th>
          </tr>
        </thead>

        <tbody>
          <tr class="thread-col" data-href="/forum/viewthread?id=1">
            <td>Where to the ducks go?Where to the ducks go? But Where do the ducks goWhere do the ducks g</td>
            <td>HoldenNNNNN123456789</td>
            <td>100000</td>
            <td>12 06 16</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>4</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>4</td>
          </tr>
        </tbody>
      </table>
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