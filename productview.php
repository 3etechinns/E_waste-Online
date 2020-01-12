<?php
	session_start();
	if($_SESSION["rec"]==true)
	{
	}
	else
	{
		header('location:RecyclerLogin.php');
    }
    $id=$_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Recycler</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link href="css/slide.css" rel="stylesheet">
    <link href="css/shop-item.css" rel="stylesheet">
    <style>
.mySlides {display:none;}
</style>
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
				<a class="navbar-brand" href="recyclerhome.php">Recycler</a>
			</div>
		</div><!-- /.container-fluid -->
</nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php
					if($_SESSION["rec"]==true)
					{
						echo $_SESSION["rec"];
					}
				?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
      <li><a href="recyclerhome.php"><em class="fa fa-home">&nbsp;</em>Home</a></li>
			<li><a href="recyclermanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logoutrecycler.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
    <?php
			$db = mysqli_connect('localhost', 'root', '', 'registration');
			if(!$db)
			{
				echo connect_error();
			}
			if (!(isset($_SESSION['rec']) && $_SESSION['rec'] != ''))
			{
				header("location:RecyclerLogin.php");
			}
            $Mobile=$_SESSION['rec'];
			$sql = "SELECT * FROM product where P_id='$id'";
			$result = $db->query($sql); 
			$count = 0;
			if ($result->num_rows > 0) {
			// output data of each row
			 while($row = $result->fetch_assoc()){
	?>
      <!-- /.col-lg-3 -->
      <div style="margin-left:250px;">
      <div class="col-lg-9">

        <div class="card mt-4">
        <div class="w3-content w3-display-container">
        <img class="mySlides" src="<?php echo $row['photo1'];?>" width="600" height="400">
        <img class="mySlides" src="<?php echo $row['photo2'];?>" width="600" height="400">
        <img class="mySlides" src="<?php echo $row['photo3'];?>" width="600" height="400"> 
        <img class="mySlides" src="<?php echo $row['photo4'];?>" width="600" height="400">

         <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
         <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
          <div class="card-body" style="height: 525px; width:900px;">
          <hr size="20">
            <h2 class="card-title"><b>Detail</b></h2>
            <div class="product-title"><b>Category</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['category']; ?></div>
            <div class="product-title"><b>Brand</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['brand']; ?></div>
            <hr size="30">
            <h3><b><?php echo "₹".$row['price']; ?></b></h3>
            <div class="product-title"><?php echo $row['title']; ?></div>
            <hr size="30">
            <h2 class="card-title"><b>Description</b></h2>
            <p class="card-text"><?php echo $row['description']; ?></p>
            <hr size="30">
            <h2 class="card-title"><b>Seller description</b></h2>
            <div class="product-title"><b>Name</b>&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['Name']; ?></div>
            <div class="product-title"><b>Phone Number</b>&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['Mobile']; ?></div>
            <div class="product-title"><b>Address</b>&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $row['Address']; ?></div>
          </div>
        </div>

      </div>
      </div>
      <!-- /.col-lg-9 -->
      <?php
	}
}
?>
    </div>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</body>

</html>
