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
$username       = mysqli_real_escape_string($connection,$_POST['username']); // Get the username values
//            echo $username;
//            echo "Connected successfully";
$query  = "select Mobile from recycler where Mobile='".$username."'";
$res    = mysqli_query($connection,$query);
$count  = mysqli_num_rows($res);
echo $count;

}
}

?>