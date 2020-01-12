<?php
    session_start();
    if($_SESSION["ad"]==true)
	  {
	  }
	  else
	  {
		  header('location:login.php');
    }
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $p_id=$_GET['id'];
	$query = "SELECT * from product where P_id=$p_id";
    $result = mysqli_query($db,$query);
    $ph1="";
    $ph2="";
    $ph3="";
    $ph4="";
	while($row=mysqli_fetch_assoc($result))
	{
        $ph1=$row['photo1'];
        $ph2=$row['photo2'];
        $ph3=$row['photo3'];
        $ph4=$row['photo4'];
?>
<html>
<head>
<title>Edit Product</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/usermanageaccount.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="css/editproduct.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="editmyproduct.php">User</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo 'adminproductview.php?id=',$p_id,'' ?>">Home
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
	<h4 class="card-title mt-3 text-center">Update your Gadget Details</h4>
	<form method="post" action="#" enctype="multipart/form-data">
    <div class="form-group input-group">
    <?php $cat=$row['category'];?>
    <select class="mdb-select md-form" name="category" required>
        <option value="" disabled selected>Category*</option>
        <option value="Mobile" <?php if($cat=="Mobile"){ echo 'selected="selected"'; }?>>Mobile</option>
        <option value="TVs" <?php if($cat=="TVs"){ echo 'selected="selected"'; }?>>TVs</option>
        <option value="Computer" <?php if($cat=="Computer"){ echo 'selected="selected"'; }?>>Computer</option>
        <option value="Laptops" <?php if($cat=="Laptops"){ echo 'selected="selected"'; }?>>Laptops</option>
        <option value="ACs" <?php if($cat=="Acs"){ echo 'selected="selected"'; }?>>ACs</option>
        <option value="Friges" <?php if($cat=="Friges"){ echo 'selected="selected"'; }?>>Friges</option>
        <option value="Printers" <?php if($cat=="Printers"){ echo 'selected="selected"'; }?>>Printers</option>
        <option value="WashingMachine" <?php if($cat=="WashingMachine"){ echo 'selected="selected"'; }?>>Washing Machine</option>
        <option value="Other" <?php if($cat=="Other"){ echo 'selected="selected"'; }?>>Other Item</option>
    </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select class="mdb-select md-form" name="brand" required>
    <?php $bra=$row['brand'];?>
        <option value="" disabled selected>Brand*</option>
        <option value="Samsung" <?php if($bra=="Samsung"){ echo 'selected="selected"'; }?>>Samsung</option>
        <option value="iPhone" <?php if($bra=="iPhone"){ echo 'selected="selected"'; }?>>iPhone</option>
        <option value="Micromax" <?php if($bra=="Micromax"){ echo 'selected="selected"'; }?>>Micromax</option>
        <option value="Nokia" <?php if($bra=="Nokia"){ echo 'selected="selected"'; }?>>Nokia</option>
        <option value="Sony" <?php if($bra=="Sony"){ echo 'selected="selected"'; }?>>Sony</option>
        <option value="Mi" <?php if($bra=="Mi"){ echo 'selected="selected"'; }?>>Mi</option>
        <option value="HTC" <?php if($bra=="HTC"){ echo 'selected="selected"'; }?>>HTC</option>
        <option value="Lenovo" <?php if($bra=="Lenovo"){ echo 'selected="selected"'; }?>>Lenovo</option>
        <option value="Motorola" <?php if($bra=="Motorola"){ echo 'selected="selected"'; }?>>Motorola</option>
        <option value="Oppo" <?php if($bra=="Oppo"){ echo 'selected="selected"'; }?>>Oppo</option>
        <option value="Vivo" <?php if($bra=="Vivo"){ echo 'selected="selected"'; }?>>Vivo</option>
        <option value="Gionee" <?php if($bra=="Gionee"){ echo 'selected="selected"'; }?>>Gionee</option>
        <option value="Intex" <?php if($bra=="Intex"){ echo 'selected="selected"'; }?>>Intex</option>
        <option value="LG" <?php if($bra=="LG"){ echo 'selected="selected"'; }?>>LG</option>
        <option value="Asus" <?php if($bra=="Asus"){ echo 'selected="selected"'; }?>>Asus</option>
        <option value="BlackBerry" <?php if($bra=="BlackBerry"){ echo 'selected="selected"'; }?>>BlackBerry</option>
        <option value="Karbonn" <?php if($bra=="Karbonn"){ echo 'selected="selected"'; }?>>Karbonn</option>
        <option value="Other" <?php if($bra=="Other"){ echo 'selected="selected"'; }?>>Other Mobiles</option>
    </select>
    </div> 
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-mobile"></i> </span>
		 </div>
        <input name="Title" class="form-control" required type="text" placeholder="Title*" value="<?php echo $row['title']; ?>"><br>
        <p style="font-size:small;">Mention the key features of your item (e.g. brand, model, age, type)</p>
    </div> 
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-sticky-note"></i> </span>
		</div>
		<textarea name="Description" required class="form-control" placeholder="Decription*" type="text"><?php echo $row['description']; ?></textarea>
	</div>
  <p style="font-size:small;">Include condition</p>
  <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-rupee-sign"></i> </span>
		 </div>
        <input name="Price" class="form-control" required type="text" placeholder="Price*" value="<?php echo $row['price']; ?>">
    </div> 
    <div style="border-top: 1px solid #8c8b8b;"></div>
    <br>
    <h5>Upload Photos</h5><br>
    <div class="slider">
  
  <a href="#slide-1">1</a>
  <a href="#slide-2">2</a>
  <a href="#slide-3">3</a>
  <a href="#slide-4">4</a>

  <div class="slides">
    <div id="slide-1">
    <img class="mySlides" src="<?php echo $row['photo1'];?>">
    </div>
    <div id="slide-2">
    <img class="mySlides" src="<?php echo $row['photo2'];?>">
    </div>
    <div id="slide-3">
    <img class="mySlides" src="<?php echo $row['photo3'];?>"> 
    </div>
    <div id="slide-4">
    <img class="mySlides" src="<?php echo $row['photo4'];?>">
    </div>
  </div>
</div><br><br>
<p>Note:-You can change Picture of product upload 1'st pic in 1'st Picture upload</p>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input  type="file" name="p1" class="form-control" value="<?php echo $row['photo1'];?>"/>
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p2" class="form-control" value="<?php echo $row['photo2'];?>"/>
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p3" class="form-control" value="<?php echo $row['photo3'];?>"/>
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		 </div>
        <input type="file" name="p4" class="form-control" value="<?php echo $row['photo4'];?>"/>
    </div>
    <div style="border-top: 1px solid #8c8b8b;"></div>
    <br>
    <h5>Seller Details</h1>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" required type="text" placeholder="Seller Name*" value="<?php echo $row['Name']; ?>">
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-address-book"></i> </span>
		 </div>
        <input name="Address" class="form-control" required type="text" placeholder="Address*" value="<?php echo $row['Address']; ?>">
    </div>
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		 </div>
        <input name="Mobile" class="form-control" required pattern="[0-9]{10}" type="text" placeholder="Mobile Number*" value="<?php echo $row['Mobile']; ?>">
    </div>
     <!-- form-group end.// -->
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="addpro" value="Update Product">
    </div>
    </form>
</article>
</div> <!-- card.// -->

</div>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
fetch('https://api.unsplash.com/photos/random/?count=5&client_id=52d8369eb3e2576a5f5b6423865e074e9c7045761bff1ac5664ff3e0bdb57a1d') 
</script>
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
    $pho1="";
    $pho2="";
    $pho3="";
    $pho4="";
    $userid=$_SESSION['User_id'];
    $valid_file=true;
    $new_file_name1="";
    $new_file_name2="";
    $new_file_name3="";
    $new_file_name4="";
    $ph1v=$_FILES['p1']['name'];
    $ph2v=$_FILES['p2']['name'];
    $ph3v=$_FILES['p3']['name'];
    $ph4v=$_FILES['p4']['name'];
    $uploads_dir="uploads/";
    if(!empty($ph1v))
    {
        $rand1=strval(rand(1,1000000));
        $photo1=strval($_FILES["p1"]["name"]);
        $ext1=end(explode('.',$photo1));
        $new_file_name1=$rand1.".".$ext1;
        $tmp_name1 = $_FILES["p1"]["tmp_name"];
        move_uploaded_file($tmp_name1, "$uploads_dir/$new_file_name1");
        $p1=$uploads_dir.$new_file_name1;
    }
    if(!empty($ph2v))
    {
        $rand2=strval(rand(1,1000000));
        $photo2=strval($_FILES["p2"]["name"]);
        $ext2=end(explode('.',$photo2));
        $new_file_name2=$rand2.".".$ext2;
        $tmp_name2 = $_FILES["p2"]["tmp_name"];
        move_uploaded_file($tmp_name2, "$uploads_dir/$new_file_name2");
        $p2=$uploads_dir.$new_file_name2;
    }
    if(!empty($ph3v))
    {
        $rand3=strval(rand(1,1000000));
        $photo3=strval($_FILES["p3"]["name"]);
        $ext3=end(explode('.',$photo3));
        $new_file_name3=$rand3.".".$ext3;
        $tmp_name3 = $_FILES["p3"]["tmp_name"];
        move_uploaded_file($tmp_name3, "$uploads_dir/$new_file_name3");
        $p3=$uploads_dir.$new_file_name3;
    }
    if(!empty($ph4v))
    {
        $rand4=strval(rand(1,1000000));
        $photo4=strval($_FILES["p4"]["name"]);
        $ext4=end(explode('.',$photo4));
        $new_file_name4=$rand4.".".$ext4;
        $tmp_name4 = $_FILES["p4"]["tmp_name"];
        move_uploaded_file($tmp_name4, "$uploads_dir/$new_file_name4");
        $p4=$uploads_dir.$new_file_name4;
    }
   
    if(!empty($p1))
    {
        $pho1=$p1;
    }
    else
    {
        $pho1=$ph1;
    }
    if(!empty($p2))
    {
        $pho2=$p2;
    }
    else
    {
        $pho2=$ph2;
    }
    if(!empty($p3))
    {
        $pho3=$p3;
    }
    else
    {
        $pho3=$ph3;
    }
    if(!empty($p4))
    {
        $pho4=$p4;
    }
    else
    {
        $pho4=$ph4;
    }
    $sql = "UPDATE product set category='$category',brand='$brand',title='$title',description='$description',price='$price',photo1='$pho1',photo2='$pho2',photo3='$pho3',photo4='$pho4',Name='$Name',Address='$Address',Mobile='$Phone' where P_id='$p_id'";
    $r=mysqli_query($db,$sql);
        echo $r;
		echo "<script type='text/javascript'>alert('Edit product Sucessfully');window.location='productdetails.php';</script>";
}
?>