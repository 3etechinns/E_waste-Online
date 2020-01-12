<?php
	session_start();
	if($_SESSION["ad"]==true)
	{
	}
	else
	{
		header('location:AdminLogin.php');
	}
 ?>
<html>
<head>
<title>User Manage</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="adminhome.php">Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php
					if($_SESSION["ad"]==true)
					{
						echo $_SESSION["ad"];
					}
				?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="adminhome.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="userdetails.php"><em class="fa fa-users">&nbsp;</em>Users</a></li>
			<li><a href="recyclerdetails.php"><em class="fa fa-recycle">&nbsp;</em>Recycler</a></li>
			<li><a href="#"><em class="fa fa-toggle-off">&nbsp;</em>Product</a></li>
			<li><a href="adminmanageaccount.php"><em class="fa fa-user">&nbsp;</em>Manage Account</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
    <div id="wrapper" style="margin-left:250px;">
            <?php
			$db = mysqli_connect('localhost', 'root', '', 'registration');
			if(!$db)
			{
				echo connect_error();
			}
			if (!(isset($_SESSION['ad']) && $_SESSION['ad'] != ''))
			{
				header("location:AdminLogin.php");
			}
			$Mobile=$_SESSION['ad'];
            ?>
            
            <!-- Page Content -->
            <form method="post">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Delete User </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Frist Name</th>
                                                    <th>Last Name</th>
                                                    <th>Gender</th>
													<th>Mobile</th>
													<th>Mail</th>
													<th>Address</th>
													<th>Pin code</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $id=$_GET['id'];
                                                $sql = "SELECT * FROM users where User_id='$id'";
                                                $result = $db->query($sql); 
                                                
                                                if ($result->num_rows ==1) {
                                                // output data of each row
                                                 while($row = $result->fetch_assoc()) {

                                                print "<tr> <td>";
                                                //echo $row["c_id"];
                                                echo "1"; 
                                                $id = $row['User_id'];
                                                print "</td> <td>";
                                                echo $row['F_name']; 
                                                print "</td> <td>";
                                                echo $row['L_name']; 
                                                print "</td> <td>";
                                                echo $row['Gender'];
												print "</td> <td>";
                                                echo $row['Mobile'];
												print "</td> <td>";
                                                echo $row['Mail'];
												print "</td> <td>";
                                                echo $row['Address'];
												print "</td> <td>";
                                                echo $row['P_code'];
                                                print "</td><td>";
                                                 $id = $row['User_id'];        
 
                                   echo '<input type="submit"  value="Delete" name = "Delete" class="btn btn-danger" ></a>';

                                                echo ' ';
                              echo '<a href="userdetails.php")>  <button type="button"  name = "Back" class="btn btn-primary" >Back</button>   </a>';

                            
                                               }
                                           }
                                           else {
                                                    echo "0 results";                   
                                                }

                                              //$con->close();
                                               ?>    
                                            
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        </form>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['Delete']))
{
    $sql = "Delete from users where User_id='$id'";
    $r = mysqli_query($db,$sql);
    echo $r;
    echo "<script type='text/javascript'>alert('Record Delete Sucessfully');window.location='userdetails.php'</script>";
}
?>