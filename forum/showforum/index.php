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
<?php
    if(isset($_GET['id']))
    {
    $id_get= $_GET['id'];
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);
    if ($conn->connect_error)
    {
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
        echo 'unable to connect to database';
    }
    $query = "SELECT id, name, description, threads FROM forums WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $id_get); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($id_result, $name_result, $description_result, $threads_result);
        $stmt->fetch();
        $stmt->close();
        if(!($id_result==$id_get))
        {
            header('Location: /forum');
        }
    }
    else
    {
        trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
    }
    $query = "SELECT id, poster, poster_id, title, body, updated FROM threads WHERE forum_id = ? ORDER BY updated DESC";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $id_get); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($thread_id_result, $thread_poster_result, $thread_poster_id, $thread_title_result, $thread_body_result, $thread_updated_result);
        $threads_arr=array();
        while($stmt->fetch())
        {
            $thread_arr=array('id'=>$thread_id_result,'poster'=>$thread_poster_result, 'poster_id'=>$thread_poster_id,'title'=>$thread_title_result,'body'=>$thread_body_result,'updated'=>$thread_updated_result);
            $threads[]=$thread_arr;
        }
        $stmt->close();
    }
    else
    {
        trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
    }
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
    <a href="/" class="breadcrumb">Magicus</a>
        <a href="/forum" class="breadcrumb">Forum</a>
        <?php if(isset($_GET['id'])){echo '<a href="/forum/showforum?id='.$_GET['id'].'" class="breadcrumb">'.$name_result.'</a>';}?>   
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
        <h1><?php echo $name_result; ?></h1>
        <div class="border" style="height:1px;background-color:#660198"></div><br>
        <h5><?php echo $description_result; ?></h5>
        <?php 
            echo "<a style='background-color:#660198' href='/forum/newthread?id=$id_get' class='btn waves-effect waves-light'>New Thread</a>";
        ?>
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
                <?php
                if(isset($threads)){
                    foreach ($threads as $thread)
                    {
                        $thread_id = $thread['id'];
                        $thread_poster = $thread['poster'];
                        $thread_poster_id = $thread['poster_id'];
                        $thread_title = $thread['title'];
                        $thread_body = $thread['body'];
                        $thread_updated = $thread['updated'];
                        echo "<tr class='thread-col' data-href='/forum/viewthread?id=$thread_id'>";
                        echo "<td>$thread_title</td>";
                        echo "<td>$thread_poster</td>";
                        $query = "SELECT COUNT(*) FROM replies WHERE thread_id=?";
                        $blurb_stmt = $conn->prepare($query);
                        if ($blurb_stmt)
                        {
                        $blurb_stmt->bind_param("i", $thread_id); /* s = string, i = integer, d = double,  b = blob */
                        $blurb_stmt->execute();
                        $blurb_stmt->bind_result($thread_replies);
                        $blurb_stmt->fetch();
                        $blurb_stmt->close();
                        echo "<td>$thread_replies</td>";
                        }
                        echo "<td>$thread_updated</td>";
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
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
<li><a class="grey-text text-lighten-3" href="/about">About</a></li>
<li><a class="grey-text text-lighten-3" href="mailto:beaujibby@gmail.com">Contact Us</a></li>
<li><a class="grey-text text-lighten-3" href="https://en.wikipedia.org/wiki/Boredom">Legal</a></li>
<li><a class="grey-text text-lighten-3" href="/creators">Creators</a></li>
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