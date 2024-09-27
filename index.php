
<?php 
error_reporting(0);

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>


<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Avatar Global Services Clients Login">
<meta name="keywords" content="Avatar Global Services Clients Login">
<meta name="author" content="Avatar Global Services Clients Login">
<title>Avatar Global Services Admin Login</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/icon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">
<link rel="stylesheet" href="assets/css/material.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
        #showPass {
  display:inline-block;
  margin-left:-40px;
}

.dark #showPass {
  display:inline-block;
  margin-left:-40px;
  color:blue;
}
.form-control {
    display: inline-block;
    width: 95%;
    height: calc(1.5em + 1.25rem + 2px);
    padding: .625rem 1.25rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

        </style>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
<div class="container">



<div class="account-box">
    <div class="account-logo">
        <a href="dashboard.php"><img src="assets/img/logo/logo.png" alt="Dreamguy's Technologies"></a>
        </div>
<div class="account-wrapper">
<h3 class="account-title">Avatar Global Services </h3>
<p class="account-subtitle">ADMIN LOGIN</p>
<?php if($_GET['a']!="") {?><div class="alert alert-error" style="color:#6b0e0e;font-size:18px;"> <?php echo $_GET['a'];?>  <!--<strong>Error!</strong> Please enter an username and a password.-->
        </div><?php } ?>
                        
<form  action="backend/login/login_check.php" method="POST">
<div class="input-block mb-4">
<label class="col-form-label">Username</label>
<input class="form-control" type="text" name="uname"  value="">
</div>
<div class="input-block mb-4">
<div class="row align-items-center">
<div class="col">
<label class="col-form-label">Password</label>
</div>
<div class="col-auto" style="display:none;">
<a class="text-muted" href="#">
Forgot password?
</a>
</div>
</div>
<div class="position-relative">
<input type="password" class="form-control" name="pass" placeholder="Enter Password" id="myPass">
                                    <!-- <input class="form-control" type="password" name="pass" class="form-input" placeholder="Enter Password"  id="myPass"> -->
                                    <span id="showPass">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
    <i class="fa fa-eye" aria-hidden="true" style="display:none;"></i>
  </span>
</div>
</div>
<div class="input-block mb-4 text-center">
<button class="btn btn-primary account-btn" type="submit">Login</button>
</div>
<!-- <div class="account-footer">
<p>Don't have an account yet? <a href="register.html">Register</a></p>
</div> -->
</form>

</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.7.1.min.js" type="6fed5b8c6f177aaf621209aa-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="6fed5b8c6f177aaf621209aa-text/javascript"></script>

<script src="assets/js/app.js" type="6fed5b8c6f177aaf621209aa-text/javascript"></script>
<script src="assets/js/rocket-loader.min.js" data-cf-settings="6fed5b8c6f177aaf621209aa-|49" defer></script></body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"> </script>
<script>
        $(document).ready(function() {
  $("#showPass").click(function() {
    if ($("#myPass").attr("type") == "password") {
      $("#myPass").attr("type", "text");
    } else {
      $("#myPass").attr("type", "password");
    }
  });
  $("#showPass").click(function() {
    $("#showPass i").toggle();
  });
});

        </script>
</html>