<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

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
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter Your New Password</p>
          </div>
          <form method="post" action="#">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="pass" placeholder="Enter Password" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="cpass" placeholder="Enter Confirm Password" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter Enter Confirm Password</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Change New PAssword">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="login.php">Login Page</a>
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
  $db = mysqli_connect('localhost', 'root', '', 'registration');
  $a  = $_GET['id'];
if(isset($_POST['submit']))
{
    $new = $_POST['pass'];
    $newre = $_POST['cpass'];
    if($new != $newre)
    {
    echo "<script type='text/javascript'>alert('Both New Password Is Not Matched')</script>";    
    }
    else
    {  
        $q2 = "update users set Password= '".$new."' Where User_id = ".$a;
        $re1 = mysqli_query($db,$q2);
        echo "<script type='text/javascript'>alert(' Your Password is Changed please Re-Login')</script>";
        session_destroy();
       header('location:login.php');
      
   }
}
?>