<?php
	$F_name = "";
	$L_name = "";
	$Gender = "";
	$Mobile = "";
	$Address = "";
	$P_code = "";
	$Mail = "";
	$Password_1 = "";
	$Password_2 = "";
	$errors = array();
	
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	
	//registration button click
	if(isset($_POST['register']))
	{
		$F_name = mysqli_real_escape_string($db, $_POST['F_name']);
		$L_name = mysqli_real_escape_string($db, $_POST['L_name']);
		$Gender = mysqli_real_escape_string($db, $_POST['Gender']);
		$Mobile = mysqli_real_escape_string($db, $_POST['Mobile']);
		$Address = mysqli_real_escape_string($db, $_POST['Address']);
		$P_code = mysqli_real_escape_string($db, $_POST['P_code']);
		$Mail = mysqli_real_escape_string($db, $_POST['Mail']);
		$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
		$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);
		
		//Fields are filled properly
		if($Password_1 != $Password_2)
		{
			echo "<script type='text/javascript'>alert('Password Does not Match');window.location='RecyclerRegister.php';</script>";	
		}
		else
		{
		//if there are no error,save user to database
		if(count($errors)== 0)
		{
			$random=rand(1111,9999);
			$sql = "INSERT INTO recycler (F_name, L_name, Gender, Mobile, Mail, Password, Address, P_code, activation, status) 
				VALUES ('$F_name', '$L_name', '$Gender', '$Mobile', '$Mail', '$Password_1', '$Address', '$P_code',$random,0)";
				
			mysqli_query($db, $sql);
			header("Location:ractivate.php?email= ".$Mail."");
		}
		}
	}
?>