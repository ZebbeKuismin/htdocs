<?php
    setcookie("session","",time()-1,"/");
	header("Refresh:0");
?>