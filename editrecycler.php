<?php
	ob_start();
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	if(!$db)
	{
		echo connect_error();
	}
	if (!(isset($_SESSION['ad']) && $_SESSION['ad'] != ''))
	{
		header("location:AdminLogin.php");
	}
	$id=$_GET['id'];
	$query = "SELECT * from recycler where Recycler_id = '$id'";
	$result = mysqli_query($db,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		?>
<html>
<head>
<title>Manage Account</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/usermanageaccount.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">E-waste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="userhome.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
<hr>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Edit Account details</h4>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="F_name" class="form-control" required type="text" placeholder="First Name" value="<?php echo $row['F_name']; ?>" >
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="L_name" class="form-control" required type="text" placeholder="Last Name" value="<?php echo $row['L_name']; ?>">
    </div><!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email address" type="email" value="<?php echo $row['Mail']; ?>" disabled>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="mobile" class="form-control" required pattern="[0-9]{10}" placeholder="Phone number" disabled type="text" value="<?php echo $row['Mobile']; ?>">
    </div>
	 <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		</div>
		<input name="P_code" class="form-control" required pattern="[0-9]{6}"  placeholder="Pin Code" type="text" value="<?php echo $row['P_code']; ?>">
	</div> 
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		</div>
		<textarea name="Address" required class="form-control" placeholder="Address" type="text"><?php echo $row['Address']; ?></textarea>
	</div> <!-- form-group end.// -->
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="profile" value="Update"><br>
        <a href="recyclerdetails.php"><button type="button" class="btn btn-primary btn-block">Back</button></a>
    </div>
    </form>
</article>
</div> <!-- card.// -->

</div>
</body>
</html>
<?php
}
if(isset($_POST['profile']))
	{
		$F_name=$_POST['F_name'];
		$L_name=$_POST['L_name'];
		$P_code=$_POST['P_code'];
		$Address=$_POST['Address'];
		$sql = "UPDATE recycler SET F_name='$F_name',L_name='$L_name',P_code='$P_code',Address='$Address' WHERE Recycler_id ='$id'";
		$r = mysqli_query($db,$sql);
		echo $r;
		echo "<script type='text/javascript'>alert('Profile Update Sucessfully');window.location='recyclerdetails.php';</script>";
	}
?>