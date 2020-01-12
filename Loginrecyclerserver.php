<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$mob = $_POST['mobile'];
	$pass = $_POST['pass'];
	if(!$db)
	{
		echo connect_error();
	}
	$sql = "SELECT * FROM recycler where Mobile='".$mob."' and Password='".$pass."'";
	$r = mysqli_query($db,$sql);
	if(mysqli_num_rows($r)>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($mob==$row['Mobile'] && $pass == $row['Password'])
			{
				$_SESSION["rec"]=$mob;
				header('location:recyclerhome.php');
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Username and Password is incorrect');window.location='RecyclerLogin.php';</script>";
	}
?>