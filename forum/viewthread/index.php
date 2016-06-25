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
    $query = "SELECT id, forum_id, poster, poster_id, title, body, time FROM threads WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $id_get); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($thread_id_result, $forum_id_result, $thread_poster_result, $thread_poster_id, $thread_title_result, $thread_body_result, $thread_time_result);
        $stmt->fetch();
        $stmt->close();
        if(!($thread_id_result==$id_get))
        {
            header('Location: /forum');
        }
    }
    $query = "SELECT username,id,time,posts FROM accounts WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("i", $thread_poster_id); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($username_result,$id_result,$time_result,$posts_result);
        $stmt->fetch();
        $time_result = strtok($time_result, " ");
        $time_result = explode("-",$time_result);
        $date_joined = array('year'=>$time_result[0],'month'=>$time_result[1],'day'=>$time_result[2]);
        $stmt->close();
        $poster_time_result = $date_joined['month'].' '.$date_joined['day'].' '.$date_joined['year'];
    }
    $query = "SELECT id, name FROM forums WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $forum_id_result); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($id_result, $name_result);
        $stmt->fetch();
        $stmt->close();
    }
    
    }
    $query = "SELECT id, poster, poster_id, body, time FROM replies WHERE thread_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt)
    {
        $stmt->bind_param("s", $thread_id_result); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $stmt->execute();
        $stmt->bind_result($reply_id_result, $reply_poster_result, $reply_poster_id, $reply_body_result, $reply_time_result);
        $replies_arr=array();
        while($stmt->fetch())
        {
            $replies_arr=array('id'=>$reply_id_result,'poster'=>$reply_poster_result, 'poster_id'=>$reply_poster_id,'body'=>$reply_body_result,'time'=>$reply_time_result);
            $replies[]=$replies_arr;
        }
        $stmt->close();
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
        <?php if(isset($_GET['id'])){echo '<a href="/forum/showforum?id='.$forum_id_result.'" class="breadcrumb">'.$name_result.'</a>';}?>   
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
        <h1><?php echo htmlspecialchars($thread_title_result); ?></h1>
        <div class="border" style="height:1px;background-color:#ee6e73"></div><br>
        <?php echo "<a style='background-color:#ee6e73' href='/forum/newreply?id=$thread_id_result' class='btn waves-effect waves-light'>Reply</a>"; ?>
        <table class="bordered highlight table">
            <thead>
                <tr>
                <th data-field="id">Author</th>
                <th data-field="name">Message</th>
                </tr>
            </thead>
            <tbody>
            <tr class="message-col">
                <td style="border-right:1px solid;width:100px;border-color:#C5C5C5">
                <h5><?php echo $thread_poster_result; ?></h5><h6><?php echo $poster_time_result; ?></h6><h6><?php echo $posts_result.' Posts';?></h6></td>
                <td><?php echo htmlspecialchars($thread_body_result); ?></td>
            </tr>
            <?php
                if(isset($replies))
                {
                foreach($replies as $reply){
                    $reply_id = $reply['id'];
                    $reply_poster = $reply['poster'];
                    $reply_poster_id = $reply['poster_id'];
                    $reply_body = $reply['body'];
                    $reply_time =  $reply['time'];
                    
                    $query = "SELECT username,id,time,posts FROM accounts WHERE id = ?";
                    $stmt = $conn->prepare($query);
                    if ($stmt)
                    {
                        $stmt->bind_param("i", $reply_poster_id); /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
                        $stmt->execute();
                        $stmt->bind_result($reply_username_result,$reply_id_result,$reply_time_result,$reply_posts_result);
                        $stmt->fetch();
                        $reply_time_result = strtok($reply_time_result, " ");
                        $reply_time_result = explode("-",$reply_time_result);
                        $date_joined = array('year'=>$reply_time_result[0],'month'=>$reply_time_result[1],'day'=>$reply_time_result[2]);
                        $stmt->close();
                        $reply_time_result = $date_joined['month'].' '.$date_joined['day'].' '.$date_joined['year'];
                    }
                    $reply_body=htmlspecialchars($reply_body);
                    $reply_poster=htmlspecialchars($reply_poster);
                    
                    echo "<tr class='message-col'>
                <td style='border-right:1px solid;width:100px;border-color:#C5C5C5'>
                <h5>$reply_poster</h5><h6>$reply_time_result</h6><h6>$reply_posts_result Posts</h6></td>
                <td>$reply_body</td>
            </tr>";
                }
                }
                $conn->close();
            ?>
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