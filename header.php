

<?php
 include('backend/connection.php');
 error_reporting(0);
 ob_start();
session_start();

$password1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses156"]));
$ip1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses157"]));
$ldate1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses158"]));

  $selquery="select * from logs where pwd1='$password1' and ip1='$ip1' and ldate1='$ldate1'";
//   echo $selquery;
//   die;

  $result=mysqli_query($db,$selquery);
  $count=mysqli_num_rows($result);
  
  if($count==0)   {
  header("location: index.php");
  //mysqli_close();

}elseif($count==1)
{

$client=1;  

$log_name=$_SESSION["uname"];

$name_member = "SELECT * FROM members WHERE id = '$log_name'";
// echo $name_member;
// exit;
$result = mysqli_query($db, $name_member);

if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Access the 'name' column from the result
        $name_member2 = $row['fname'] .' '. $row['lname'];
        $name_member_id = $row['id'];
        $profile_picture = $row['profile_picture'];
        
        // Output the name
        // echo $name_member;
        // die;
    }
}
    ?>


<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Avatar Global Services Clients Login">
<meta name="keywords" content="Avatar Global Services Clients Login">
<meta name="author" content="Avatar Global Services Clients Login">
<title>Dashboard - Admin Panel</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/icon.png">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/material.css">

<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

<link rel="stylesheet" href="assets/css/style.css?v.2">

<link rel="stylesheet" href="assets/css/main.css?v.1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css@1.1.0/dist/charts.min.css">

<link rel="stylesheet" href="assets/plugins/c3-chart/c3.min.css">
<link rel="" href="https://i.icomoon.io/public/temp/c5ee16380c/UntitledProject/style.css">


<link rel="stylesheet" href="assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

<link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">


</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="dashboard.php" class="logo">
<img src="assets/img/logo/logo_website.png" alt="Logo">
</a>
<a href="dashboard.php" class="logo collapse-logo">
<img src="assets/img/logo/logo_website.png" alt="Logo">
</a>
<a href="dashboard.php" class="logo2">
<img src="assets/img/logo/logo_website.png" width="40" height="40" alt="Logo">
</a>
</div>

<a id="toggle_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>



<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

<ul class="nav user-menu">





<li class="nav-item dropdown" style="display:none;">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<i class="fa-regular fa-bell"></i> <span class="badge rounded-pill">3</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message" >
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-03.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-06.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-17.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>


<li class="nav-item dropdown display_desk" style="display:none;">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<i class="fa-regular fa-comment"></i><span class="badge rounded-pill">8</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Messages</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">Richard Miles </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">John Doe</span>
<span class="message-time">6 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-03.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author"> Tarah Shropshire </span>
<span class="message-time">5 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">Mike Litorus</span>
<span class="message-time">3 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-08.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author"> Catherine Manseau </span>
<span class="message-time">27 Feb</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="chat.html">View all Messages</a>
</div>
</div>
</li>

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img src="../avatarjobs/<?php echo  $profile_picture;?>" alt="<?php echo $name_member2; ?>">
<span class="status online"></span></span>
<span><?php echo $name_member2; ?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.php" >My Profile</a>
<!-- <a class="dropdown-item" href="settings.html" >Settings</a> -->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.php" >My Profile</a>
<!-- <a class="dropdown-item" href="settings.html" >Settings</a> -->
<a class="dropdown-item" href="logout.php" >Logout</a>
</div>
</div>

</div>
<?php } ?>