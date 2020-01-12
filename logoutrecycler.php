<?php
	session_start();
	$_SESSION['rec']=null;
	session_destroy();
	header('location:RecyclerLogin.php');
?>