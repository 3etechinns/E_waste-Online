
<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$mob = $_POST['mobile'];
	$pass = $_POST['pass'];
	if(!$db)
	{
		echo connect_error();
	}
	$sql = "SELECT * FROM users where Mobile='".$mob."' and Password='".$pass."'";
	$r = mysqli_query($db,$sql);
	if(mysqli_num_rows($r)>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($mob==$row['Mobile'] && $pass == $row['Password'])
			{	
				$_SESSION["mob"]=$mob;
				$_SESSION["User_id"]=$row['User_id'];
				header('location:userhome.php');
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Username and Password is incorrect');window.location='login.php';</script>";
	}
?>