<?php
    session_start();
    if($_SESSION["mob"]==true)
	  {
	  }
	  else
	  {
		  header('location:login.php');
    }
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $Mobile=$_SESSION['mob'];
	$query = "SELECT * from users where Mobile = '$Mobile'";
	$result = mysqli_query($db,$query);
	while($row=mysqli_fetch_assoc($result))
	{
?>
<html>
<head>
<title>Add Product</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/usermanageaccount.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">E-waste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="userhome.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
<hr>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Post your Gadget</h4>
	<form method="post" action="#" enctype="multipart/form-data">
    <div class="form-group input-group">
    <select class="mdb-select md-form" name="category" required>
        <option value="" disabled selected>Category*</option>
        <option value="Mobile">Mobile</option>
        <option value="TVs">TVs</option>
        <option value="Computer">Computer</option>
        <option value="Laptops">Laptops</option>
        <option value="ACs">ACs</option>
        <option value="Friges">Friges</option>
        <option value="Printers">Printers</option>
        <option value="WashingMachine">Washing Machine</option>
        <option value="Other">Other Item</option>
    </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select class="mdb-select md-form" name="brand" required>
        <option value="" disabled selected>Brand*</option>
        <option value="Samsung">Samsung</option>
        <option value="iPhone">iPhone</option>
        <option value="Micromax">Micromax</option>
        <option value="Nokia">Nokia</option>
        <option value="Sony">Sony</option>
        <option value="Mi">Mi</option>
        <option value="HTC">HTC</option>
        <option value="Lenovo">Lenovo</option>
        <option value="Motorola">Motorola</option>
        <option value="Oppo">Oppo</option>
        <option value="Vivo">Vivo</option>
        <option value="Gionee">Gionee</option>
        <option value="Intex">Intex</option>
        <option value="LG">LG</option>
        <option value="Asus">Asus</option>
        <option value="BlackBerry">BlackBerry</option>
        <option value="Karbonn">Karbonn</option>
        <option value="Other">Other Mobiles</option>
    </select>
    </div> 
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-mobile"></i> </span>
		 </div>
        <input name="Title" class="form-control" required type="text" placeholder="Title*"><br>
        <p style="font-size:small;">Mention the key features of your item (e.g. brand, model, age, type)</p>
    </div> 
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
		</div>
		<textarea name="Description" required class="form-control" placeholder="Decription*" type="text"></textarea>
	</div>
  <p style="font-size:small;">Include condition</p>
  <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-rupee-sign"></i> </span>
		 </div>
        <input name="Price" class="form-control" required type="text" placeholder="Price*">
    </div> 
    <div style="border-top: 1px solid #8c8b8b;"></div>
    <br>
    <h5>Upload Photos</h5>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input  type="file" name="p1" requred class="form-control" />
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p2" requred class="form-control" />
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p3" requred class="form-control" />
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p4" requred class="form-control"/>
    </div>
    <div style="border-top: 1px solid #8c8b8b;"></div>
    <br>
    <h5>Seller Details</h1>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" required type="text" placeholder="Seller Name*" value="<?php echo $row['F_name']."  ".$row['L_name']; ?>">
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-address-book"></i> </span>
		 </div>
        <input name="Address" class="form-control" required type="text" placeholder="Address*" value="<?php echo $row['Address']."  ".$row['P_code']; ?>">
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		 </div>
        <input name="Mobile" class="form-control" required pattern="[0-9]{10}" type="text" placeholder="Mobile Number*" value="<?php echo $row['Mobile']; ?>">
    </div>
     <!-- form-group end.// -->
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="addpro" value="Add Product">
    </div>
    </form>
</article>
</div> <!-- card.// -->

</div>
</body>
</html>
<?php
  }


if(isset($_POST['addpro']))
	{
    $category=mysqli_real_escape_string($db,$_POST['category']);
    $brand=mysqli_real_escape_string($db,$_POST['brand']);
		$title=mysqli_real_escape_string($db,$_POST['Title']);
		$description=mysqli_real_escape_string($db,$_POST['Description']);
    $price=mysqli_real_escape_string($db,$_POST['Price']);
    $Name=mysqli_real_escape_string($db,$_POST['name']);
    $Address=mysqli_real_escape_string($db,$_POST['Address']);
    $Phone=mysqli_real_escape_string($db,$_POST['Mobile']);
    $p1="";
    $p2="";
    $p3="";
    $p4="";
    $userid=$_SESSION['User_id'];
    $valid_file=true;
    $new_file_name1="";
    $new_file_name2="";
    $new_file_name3="";
    $new_file_name4="";
    if($_FILES['p1']['name'] && $_FILES['p2']['name'] && $_FILES['p3']['name'] && $_FILES['p4']['name'])
    {
    $rand1=strval(rand(1,1000000));
    $rand2=strval(rand(1,1000000));
    $rand3=strval(rand(1,1000000));
    $rand4=strval(rand(1,1000000));
    
    $photo1=strval($_FILES["p1"]["name"]);
    $photo2=strval($_FILES["p2"]["name"]);
    $photo3=strval($_FILES["p3"]["name"]);
    $photo4=strval($_FILES["p4"]["name"]);
    $ext1=end(explode('.',$photo1));
    $ext2=end(explode('.',$photo2));
    $ext3=end(explode('.',$photo3));
    $ext4=end(explode('.',$photo4));
    $new_file_name1=$rand1.".".$ext1;
    $new_file_name2=$rand2.".".$ext2;
    $new_file_name3=$rand3.".".$ext3;
    $new_file_name4=$rand4.".".$ext4;
    if($valid_file)
    {
      $tmp_name1 = $_FILES["p1"]["tmp_name"];
      $tmp_name2 = $_FILES["p2"]["tmp_name"];
      $tmp_name3 = $_FILES["p3"]["tmp_name"];
      $tmp_name4 = $_FILES["p4"]["tmp_name"];
      $uploads_dir="uploads/";
      move_uploaded_file($tmp_name1, "$uploads_dir/$new_file_name1");
      move_uploaded_file($tmp_name2, "$uploads_dir/$new_file_name2");
      move_uploaded_file($tmp_name3, "$uploads_dir/$new_file_name3");
      move_uploaded_file($tmp_name4, "$uploads_dir/$new_file_name4");
      $p1=$uploads_dir.$new_file_name1;
      $p2=$uploads_dir.$new_file_name2;
      $p3=$uploads_dir.$new_file_name3;
      $p4=$uploads_dir.$new_file_name4;
    }
    $sql = "insert into product(category,brand,title,description,price,photo1,photo2,photo3,photo4,User_id,Name,Address,Mobile) values('$category','$brand','$title','$description','$price','$p1','$p2','$p3','$p4','$userid','$Name','$Address','$Phone')";
		mysqli_query($db,$sql);
		echo "<script type='text/javascript'>alert('Add product Sucessfully');window.location='userhome.php';</script>";
  }
}
?>