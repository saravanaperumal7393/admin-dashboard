<?php

error_reporting(0);
ob_start();
session_start();
include("backend/connection.php");
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

}
elseif($count==1)
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
          
        }
    }

    if ($name_member_id !== '1') {
        header("location: index.php"); // Redirect to the login page
        exit(); // Terminate further script execution
    }
$dashboard=1;
include('header.php');
include('sidebar.php');
?>


<div class="page-wrapper">

<div class="content container-fluid pb-0">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Profile</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
<li class="breadcrumb-item active">Profile</li>
</ul>
</div>
</div>
</div>

<div class="card mb-0">
<div class="card-body">
<div class="row">
<?php
// $sqlUpdated = "SELECT * FROM jobcreate WHERE clientname = '$client_name' AND job_status = '' OR job_status IS NULL ORDER BY completion ASC";
$sqlUpdated = "SELECT * FROM members WHERE id = '$log_name'";
$resultUpdated = mysqli_query($db, $sqlUpdated);


 while ($row = mysqli_fetch_assoc($resultUpdated)) {

  $fname= $row["fname"];
  $lname= $row["lname"];
  $email = $row["email"];
  $mobile = $row["mobile"];
  $username = $row["username"];
  $email = $row["email"];
  $city = $row["city"];
//   $email = $row["email"];
 

?>
<div class="col-md-12">
<div class="profile-view">
<div class="profile-img-wrap">
<div class="profile-img">
<a href="#"><img src="../avatarjobs/<?php echo $row['profile_picture'] ?>" alt="<?php echo $row['name'] ?>"></a>
</div>
</div>
<div class="profile-basic">

        <div class="row">
        <div class="col-md-10">
                                  <div class="profile-info-left">
                                    <ul class="personal-info">
                                    <li>
                                    <div class="title">Name </div>
                                    <div class="text"><span>:  <?php echo $fname ?> <?php echo $lname ?></span></div>
                                    </li>
        <?php
                            
                            $sql = "SHOW COLUMNS FROM members WHERE Field != 'id' AND Field != 'lname' AND Field != 'gender' AND Field != 'username' AND Field != 'doj' AND Field != 'profile_picture' AND Field != 'job_location' AND Field != 'password' AND Field != 'status' AND Field != 'address2' AND Field != 'address3' AND Field != 'bank_account_details' AND Field != 'address'";
                            $result = $db->query($sql);
                            $firstFieldSkipped = false;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $fieldName = $row['Field'];
                                    
                                    if (!$firstFieldSkipped) {
                                        // Skip the first field
                                        $firstFieldSkipped = true;
                                        continue;
                                    }
                                    
                                    $sqlData = "SELECT $fieldName FROM members WHERE id = $log_name";
                                    $resultData = $db->query($sqlData);
                                    $rowData = $resultData->fetch_assoc();
                                    $fieldValue = $rowData[$fieldName];
                                    ?>
                      
                                 
                                    <li>
                                    <div class="title"><?php echo $fieldName ?></div>
                                    <div class="text"><span>:  <?php echo $fieldValue ?></span></div>
                                    </li>


                                    
                             <?php
                                }
                             }
                            ?>
                            </ul>
                                  </div>
                                </div>
</div>
</div>
<div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa-solid fa-pencil"></i></a></div>
</div>
</div>
</div>
<?php }?>
</div>
</div>

<div class="tab-content">

<div id="emp_profile" class="pro-overview tab-pane fade show active">
<div class="row">
<div class="col-md-6 d-flex">
<div class="card profile-box flex-fill">
<div class="card-body">
<h3 class="card-title">Change Password <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa-solid fa-pencil"></i></a></h3>
<ul class="personal-info">


</ul>
</div>
</div>
</div>

</div>


</div>
</div>

</div>
</div>
</div>
</div>



<div id="profile_info" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Profile Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="backend/change_password/editprofile.php" method="POST" enctype="multipart/form-data">
<?php
// $sqlUpdated = "SELECT * FROM jobcreate WHERE clientname = '$client_name' AND job_status = '' OR job_status IS NULL ORDER BY completion ASC";
 $sqlUpdated = "SELECT * FROM members WHERE id = '$log_name'";
 $resultUpdated = mysqli_query($db, $sqlUpdated);

 while ($row = mysqli_fetch_assoc($resultUpdated)) {

    $fname= $row["fname"];
    $lname= $row["lname"];
    $email = $row["email"];
    $mobile = $row["mobile"];
    $username = $row["username"];
    $email = $row["email"];
    $city = $row["city"];
?>
<div class="row">
<div class="col-md-12">
<div class="profile-img-wrap edit-img">
<?php if ($row['profile_picture'] != null) { ?>
<img class="inline-block" src="../avatarjobs/<?php echo $row['profile_picture'] ?>" alt="<?php echo $row['fname'] ?>">
<?php }else{ ?>
  <img class="inline-block" src="../avatarjobs/<?php echo $row['profile_picture'] ?>" alt="<?php echo $row['fname'] ?>">
  <?php } ?>
<div class="fileupload btn">
<span class="btn-text">edit</span>
<input class="upload" type='file' name= "imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg .webp">
</div>
</div>
<?php } ?>

<div class="row">
<div class="col-md-12">
<div class="input-block mb-3">
<label class="col-form-label" style="text-transform:capitalize;">First Name</label>
<input type="text" class="form-control" id="" name="fname" value="<?php echo $fname ?>">
<label class="col-form-label" style="text-transform:capitalize;">Last Name</label>
<input type="text" class="form-control" id="" name="lname" value="<?php echo $lname ?>">
<?php
                            
                            $sql = "SHOW COLUMNS FROM members WHERE Field != 'id' AND Field != 'lname' AND Field != 'username' AND Field != 'gender' AND Field != 'doj' AND Field != 'profile_picture' AND Field != 'job_location' AND Field != 'password' AND Field != 'status' AND Field != 'address2' AND Field != 'address3' AND Field != 'bank_account_details' AND Field != 'address'";
                            $result = $db->query($sql);
                            $firstFieldSkipped = false;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $fieldName = $row['Field'];
                                    
                                    if (!$firstFieldSkipped) {
                                        // Skip the first field
                                        $firstFieldSkipped = true;
                                        continue;
                                    }
                                    
                                    $sqlData = "SELECT $fieldName FROM members WHERE id = $log_name";
                                    $resultData = $db->query($sqlData);
                                    $rowData = $resultData->fetch_assoc();
                                    $fieldValue = $rowData[$fieldName];
                                    ?>
                    
                            <input name="id1" type="hidden" id="id1" value="<?php echo $log_name; ?>" />
                            <label class="col-form-label" style="text-transform:capitalize;"><?php echo $fieldName ?></label>
                            <input type="hidden" name="field_names[]" value="<?php echo $fieldName ?>">
                            <input type="text" class="form-control" id="<?php echo $fieldName ?>" name="field_values[<?php echo $fieldName ?>]" value="<?php echo $fieldValue ?>">
                          
                          <?php
                             }
                            }
                            ?>

</div>
</div>
</div>

</div>
</div>

<div class="submit-section">
<button class="btn btn-primary submit-btn">Submit</button>
</div>
</form>

</div>
</div>
</div>
</div>


<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Change Password</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="backend/change_password/changepassword.php" method="POST"  autocomplete="off">
<input type="hidden" class="form-control" id="members_id" name="members_id" value="<?php echo $log_name; ?>">
<div class="row">

<div class="col-md-12">
<div class="input-block mb-3">
<label class="col-form-label">Current Password</label>

<input class="form-control" name="old_pass" type="text" autocomplete="off">

</div>
</div>

<div class="col-md-12">
<div class="input-block mb-3">
<label class="col-form-label">New Password</label>

<input class="form-control"  name="new_pass" type="text" autocomplete="off">

</div>
</div>

<div class="col-md-12">
<div class="input-block mb-3">
<label class="col-form-label">Verify Password</label>

<input class="form-control"  name="con_pass"  type="text" autocomplete="off">

</div>
</div>

</div>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>

</div>


</div>

<?php
include('footer.php');

?>

<?php } ?>