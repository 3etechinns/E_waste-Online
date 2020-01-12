<?php
	session_start();
	if($_SESSION["ad"]==true)
	{
	}
	else
	{
		header('location:AdminLogin.php');
	}
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	if(!$db)
	{
		echo connect_error();
	}
if (!(isset($_SESSION['ad']) && $_SESSION['ad'] != ''))
{
    header("location:AdminLogin.php");
}
else{
	if(isset($_POST['re_password']))
	{
		$Password1=$_POST['password1'];
		$Password2=$_POST['password2'];
		$username=$_SESSION['ad'];
		$sql = "UPDATE admin SET Password='$Password1' WHERE Username='$username'";
		$r = mysqli_query($db,$sql);
		echo $r;
		echo "<script type='text/javascript'>alert('Password Change Sucessfully');window.location='adminhome.php'</script>";
	}
}
?>
<html>
<head>
<title>Manage Account</title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
<link href="css/login.css" rel="stylesheet">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="adminhome.php">Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php
					if($_SESSION["ad"]==true)
					{
						echo $_SESSION["ad"];
					}
				?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="adminhome.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="userdetails.php"><em class="fa fa-users">&nbsp;</em>Users</a></li>
			<li><a href="recyclerdetails.php"><em class="fa fa-recycle">&nbsp;</em>Recycler</a></li>
			<li><a href="productdetails.php"><em class="fa fa-toggle-off">&nbsp;</em>Product</a></li>
			<li class="active"><a href="adminmanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><center>Change Password</center></h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
<form method="post" id="passwordForm" action="#">
<input type="password" required class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
<div class="row">
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
</div>
</div>
<input type="password" required class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
<input type="submit" name="re_password" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password"/>

</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/adminmanageaccount.js"></script>
</body>
</html>