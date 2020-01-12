<?php include('serverRecycler.php'); ?>
<html>
<head>
<title>Register</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/contact.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
\<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">E-waste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
              <a href="myaccount.php" class="nav-link"><span class="glyphicon glyphicon-print"></span> My Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Login and Sell Your Useless E-Waste</p>
                        <a href="RecyclerLogin.php"><input type="submit" name="" value="Login"></a><br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
			<form method="post" action="#">
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Apply as a Recycler</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                        <input type="text" class="form-control" name="F_name"placeholder="First Name *" value="<?php echo $F_name; ?>" required />
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="L_name"   placeholder="Last Name *" value="<?php echo $L_name; ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="Password_1" class="form-control" placeholder="Password *" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="Password_2" class="form-control"  placeholder="Confirm Password *" required />
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline"> 
                            <input type="radio" name="Gender" value="Male" <?php if ($Gender != "Female") echo "checked"; ?> checked>
                            <span> Male </span> 
                             </label>
                            <label class="radio inline"> 
                                <input type="radio" name="Gender" value="Female" <?php if ($Gender == "Female") echo "checked"; ?>>
                                <span>Female </span> 
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                         <input type="text" class="form-control" name="Mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter valid email" value="<?php echo $Mail; ?>"      placeholder="Your Email *" value="" />
                     </div>
                    <div class="form-group">
                      <div class="result" style="color:red;"id="result"></div>
                        <input type="text" class="form-control" placeholder="Your Phone *" id="Mobile" name="Mobile" required pattern="[0-9]{10}" title="Please enter valid 10 digit phone number" value="<?php echo $Mobile; ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Pincode *" name="P_code" required pattern="[0-9]{6}" title="Please enter valid pincode" value="<?php echo $P_code; ?>"  required />
                    </div>
                    <div class="form-group">
                        <textarea name="Address" class="form-control" placeholder="Address" rows="3" cols="23" value="<?php echo $Address; ?>"  required></textarea>
                    </div>
                                <button type="submit" class="btnRegister"  id="btnSubmit" name="register" >Sign Up</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#Mobile').keyup(function(){
// alert('sds');
var username = $(this).val(); // Get username textbox using $(this)

var Result = $('#result'); // Get ID of the result DIV where we display the results

if(username.length > 2) { // if greater than 2 (minimum 3)
Result.html('Loading...'); // you can use loading animation here
var dataPass = 'action=availability&username='+username;
$.ajax({ // Send the username val to available.php
type : 'POST',
data : dataPass,
url  : 'varidatarecycler.php',
success: function(responseText){ // Get the result
//alert(responseText);
if(responseText == 0){
Result.html('<span class="success"></span>');
$('#btnSubmit').prop('disabled', false);
}
else if(responseText > 0){
Result.html('<span class="error">Taken</span>');
$('#btnSubmit').prop('disabled', true);
}
else{
alert('Problem with sql query');
}
}
});
}
if(username.length == 0) {
Result.html('');
}
});
});
</script>
</form>
</body>
</html>