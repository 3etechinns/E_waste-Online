<?php
    session_start();
    if($_SESSION["mob"]==true)
	  {
	  }
	  else
	  {
		  header('location:login.php');
    }
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $p_id=$_GET['id'];
    ?>
    <html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User</title>

  <!-- Bootstrap core CSS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	
<link href="css/product.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="userhome.php">User</a>
			</div>
            
		</div><!-- /.container-fluid -->
</nav>

  <!-- Page Content -->
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
      <li><a href="userhome.php"><em class="fa fa-home">&nbsp;</em>Home</a></li>
			<li class="active"><a href="myproduct.php"><em class="fa fa-toggle-off">&nbsp;</em>My Product</a></li>
			<li><a href="usermanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logoutuser.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
    <div style="margin-left:250px;">
    <form method="post" action="#">
    <h1>You Want delete this Product</h1>
    <input class="btn btn-primary" type="submit" name="delete" value="Yes">
    <?php echo '<a href="myproductview.php?id=',$p_id,'")">' ?><button type="button" class="btn btn-danger">No</button></a>
    </form>
    </div>
    </body>
    </html>
    <?php
        if(isset($_POST['delete']))
        {
            $sql = "Delete from product where P_id='$p_id'";
            $r = mysqli_query($db,$sql);
            echo $r;
            echo "<script type='text/javascript'>alert('Delete  Product Sucessfully');window.location='myproduct.php'</script>";
        }
    ?>