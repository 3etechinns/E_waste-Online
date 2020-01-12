<?php
	session_start();
	if($_SESSION["mob"]==true)
	{
	}
	else
	{
		header('location:index.php');
	}
 ?>
<html>
<head>
<title>User</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="userhome.php">USER</a>
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
					if($_SESSION["mob"]==true)
					{
						echo $_SESSION["mob"];
					}
				?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="userhome.php"><em class="fa fa-home">&nbsp;</em>Home</a></li>
			<li><a href="myproduct.php"><em class="fa fa-toggle-off">&nbsp;</em>My Product</a></li>
			<li><a href="usermanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logoutuser.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div style="display:flex;align-items:center;justify-content:center;height:560px;width:1150px; background:url(img/user.jpg);" >
	<a href="addproduct.php">
		<button style="width:200px;opacity:0.9;" type="button" class="btn btn-success btn-lg">Sell</button>
	</a>
	</div>
	
	
	</div>
</body>
</html>