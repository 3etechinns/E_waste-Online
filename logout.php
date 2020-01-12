<?php
	session_start();
	$_SESSION['ad']=null;
	session_destroy();
	header('location:index.php');
?>