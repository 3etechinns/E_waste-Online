<?php
$db=mysqli_connect('localhost', 'root', '', 'registration');
$a = $_GET['email'];
$r;
$id1;
$que="SELECT * FROM recycler WHERE Mail like '".trim($a)."'";
echo $que;

$result = mysqli_query($db,$que);
if (!$result) {
    echo 'Could not run query: ' . mysqli_error($db);
    exit;
}
$row = mysqli_fetch_row($result);

$r = $row[9]; // 42
$id1=$row[0]; // the email value


require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'shubhamparmar817@gmail.com';                 // SMTP username
$mail->Password = 'parmarshubham9067131079';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('shubhamparmar817@gmail.com', 'Mailer');
$mail->addAddress(trim($a));               // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'E-WASTE REGISTRASION';
$mail->Body    = 'This is Your Activation Code:'.$r;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

ob_clean();
ob_start();

   header("Location:ractivate2.php?id= ".$id1);
?>