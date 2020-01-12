<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$mob = $_POST['username'];
	$pass = $_POST['pass'];
	if(!$db)
	{
		echo connect_error();
	}
	$sql = "SELECT * FROM admin where Username='".$mob."' and Password='".$pass."'";
	$r = mysqli_query($db,$sql);
	if(mysqli_num_rows($r)>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($mob==$row['Username'] && $pass == $row['Password'])
			{
				$_SESSION["ad"]=$mob;
				header('location:adminhome.php');
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Username and Password is incorrect');window.location='AdminLogin.php'</script>";
	}
?>