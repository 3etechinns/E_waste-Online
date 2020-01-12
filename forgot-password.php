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
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
          </div>
          <form method="post" action="#">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Enter email address</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="reset" value="Reset Password">
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
if(isset($_POST['reset']))
{
  $e = rand(1111,9999);
  $db = mysqli_connect('localhost', 'root', '', 'registration');
  $a = $_POST['email'];
  $r;
  $id1;
  $que="SELECT * FROM users WHERE Mail like '".trim($a)."'";
  $result = mysqli_query($db,$que);
  if (!$result ) {
     
    echo "<script>alert('You Are Not Registred');</script>";
  }
  else
  {
  $row = mysqli_fetch_row($result);
  $r = $row[5]; // 42
  $id1=$row[0];
  if(empty($id1))
  {
    echo "<script>alert('You Are Not Registred');</script>";
  }
  else
  {
  $r = $row[5]; // 42
  $id1=$row[0]; 
  // the email value
  $qp= "update users set activation='$e' Where User_id ='".$id1."'";
  $result = mysqli_query($db,$qp);
  require 'PHPMailerAutoload.php';
  
  $mail = new PHPMailer;
  
  //$mail->SMTPDebug = 3;                               // Enable verbose debug output
  
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'shubhamparmar817@gmail.com';                 // SMTP username
  $mail->Password = 'Shubham@2001';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to
  
  $mail->setFrom('shubhamparmar817@gmail.com', 'Mailer');
  $mail->addAddress(trim($a));               // Name is optional
  
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'E-WASTE Forgot Password';
  $mail->Body    = 'This is Your Activation Code:'.$e;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }
  ob_clean();
  ob_start();
     header("Location:forgot-password2.php?id= ".$id1);
} 
}
}
?>