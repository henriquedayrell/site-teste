<?php 
session_start();
session_destroy();
header("location:/games/login.php");
?>