<?php
	session_start();
	$_SESSION['mob']=null;
	$_SESSION['User_id']=null;
	session_destroy();
	header('location:login.php');
?>