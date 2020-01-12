<?php
$connection = mysqli_connect('localhost', 'root', '', 'registration');
if(!$connection)
{
echo 'something is wrong please check carefully';
die();
}
if(isset($_POST['action']) && $_POST['action'] == 'availability')
{
if ($connection->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else
{
$username= mysqli_real_escape_string($connection,$_POST['username']);
$query  = "select Mobile from users where Mobile='".$username."'";
$res    = mysqli_query($connection,$query);
$count  = mysqli_num_rows($res);
echo $count;
$username= mysqli_real_escape_string($connection,$_POST['username']);
$query  = "select Mobile from users where Mobile='".$username."'";
$res    = mysqli_query($connection,$query);
$count  = mysqli_num_rows($res);
echo $count;
}
}

?>