<?php
	session_start();
	if($_SESSION["ad"]==true)
	{
	}
	else
	{
		header('location:AdminLogin.php');
	}
 ?>
<html>
<head>
<title>Admin</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	
<link href="css/product.css" rel="stylesheet">
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
				<a class="navbar-brand" href="myproduct.php">Admin</a>
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
			<li class="active"><a href="productdetails.php"><em class="fa fa-toggle-off">&nbsp;</em>Product</a></li>
			<li><a href="adminmanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<div style="margin-left:250px;">
	<?php
			$db = mysqli_connect('localhost', 'root', '', 'registration');
			if(!$db)
			{
				echo connect_error();
			}
			if (!(isset($_SESSION['ad']) && $_SESSION['ad'] != ''))
			{
				header("location:AdminLogin.php");
			}
            $Mobile=$_SESSION['ad'];
			$sql = "SELECT * FROM product";
			$result = $db->query($sql); 
			$count = 0;
			if ($result->num_rows > 0) {
			// output data of each row
			 while($row = $result->fetch_assoc()){
			$P_id=$row['P_id'];
	?>
	<div class="product-item">
	<?php
		echo '<a href="adminproductview.php?id=',$P_id,'")">'
	?>
		<div class="product-image"><img src="<?php echo $row['photo1'];?>" height="170" width="250"></div>
		<div class="product-tile-footer">
		<div class="product-price"><?php echo "₹".$row['price']; ?></div><br>
		<div class="product-title"><?php echo $row['title']; ?></div>
		<?php
		echo '</a>'?>
		</div>
	</div>
<?php
	}
}
?>
	</div>
</body>
</html>