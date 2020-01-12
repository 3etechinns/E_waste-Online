<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Activation</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Activation</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Varify Your Mail</h4>
            <p>Enter your OTP</p>
          </div>
          <form method="post" action="#">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="otp" placeholder="Enter otp" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter OTP</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit OTP">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="RecyclerRegister.php">Register an Account</a>
            <a class="d-block small" href="RecyclerLogin.php">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<?php
$db=mysqli_connect('localhost', 'root', '', 'registration');
$a = $_GET['id'];
$act1;
echo "<script>alert('ID'.$a);</script>";
if(isset($_POST['submit']))
{
$r = $_POST['otp'];
$que = "select * from recycler where Recycler_id = ".$a;
$result = mysqli_query($db,$que);
if (!$result) {
    echo 'Could not run: ' . mysqli_error($db);
  
}
$row = mysqli_fetch_row($result);
$act1=$row[9];
if($r == $act1)
{
$qu = "update recycler set  status = 1 where Recycler_id=".$a;
mysqli_query($con,$qu);
echo "<script>alert('Your Account Is Activated Login Please');</script>";
header('location:RecyclerLogin.php');
}
else if($r!=$act1)
{
    echo "<script>alert('Incorrect Activation Code');</script>";
    exit;
}

}

?>