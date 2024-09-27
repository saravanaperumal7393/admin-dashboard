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

<style>
  .contact-table .action-label a .badge-outline-warning::before {
    content: "";
    width: 5px;
    height: 5px;
    border-radius: 10px;
    position: absolute;
    left: 0;
    background: #f7b84b!important;
    margin-left: 10px;
}
  .badge-outline-warning {
    color: #f7b84b!important;
    border: 1px solid #f7b84b;
    background-color: transparent;
}
.badge-soft-light {
    color: #ff00cd;
    background-color: rgb(0 128 255 / 7%);
}
.stats-box h3{
font-size:19px;
color:#8d71e8;
}
.hrs_calculate{
  font-size: 13px;
  color:#000;
  
}
.float-end{
  font-size: 18px;
  color: #8d71e8;
}
.stats-box {
  background-color: #f9f9f900;
    margin: 0 0 15px;
    padding: 5px;
}
.stats-box h3 {
    font-size: 22px;
    color: #8d71e8;
    text-align: center;
}
  </style>

<div class="page-wrapper">

<div class="content container-fluid pb-0">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Welcome Admin!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active">Dashboard</li>
</ul>
</div>
</div>
</div>

<div class="row">

<div class="col-md-7 col-sm-7 col-lg-7 col-xl-7">
  
<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa-solid fa-cubes"></i></span>
<div class="dash-widget-info">
<?php

$sql = "SELECT COUNT(*) AS total_jobs FROM jobcreate ";


if (!empty($start_date) && !empty($end_date)) {
  $sql .= " AND completion BETWEEN '$start_date' AND '$end_date'";
}

// echo $sql;
// Execute the query
$result = mysqli_query($db, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Print the total number of jobs
echo "<h3>" . $row['total_jobs'] . "</h3>";
?>
<span>Total Jobs</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa-solid fa-dollar-sign"></i></span>
<div class="dash-widget-info">
<?php

$sql = "SELECT COUNT(*) AS total_jobs FROM clients where status='1' ";


if (!empty($start_date) && !empty($end_date)) {
  $sql .= " AND completion BETWEEN '$start_date' AND '$end_date'";
}

// echo $sql;
// Execute the query
$result = mysqli_query($db, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Print the total number of jobs
echo "<h3>" . $row['total_jobs'] . "</h3>";
?>
<span>Clients</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa-regular fa-gem"></i></span>
<div class="dash-widget-info">
<?php

$sql = "SELECT COUNT(*) AS total_jobs FROM jobcreate WHERE  job_status<>''";

if (!empty($start_date) && !empty($end_date)) {
  $sql .= " AND completion BETWEEN '$start_date' AND '$end_date'";
}

// Execute the query
$result = mysqli_query($db, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Print the total number of jobs
echo "<h3>" . $row['total_jobs'] . "</h3>";
?>
<span>Completed Jobs</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa-solid fa-user"></i></span>
<div class="dash-widget-info">
<?php

$sql = "SELECT COUNT(*) AS total_jobs FROM jobcreate WHERE  job_status=''";

if (!empty($start_date) && !empty($end_date)) {
  $sql .= " AND completion BETWEEN '$start_date' AND '$end_date'";
}

// Execute the query
$result = mysqli_query($db, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Print the total number of jobs
echo "<h3>" . $row['total_jobs'] . "</h3>";
?>
<span>Jobs In Queue</span>
</div>
</div>
</div>
</div>
</div>


<div class="col-md-12 col-lg-12 col-xl-12 ">
<div class="card flex-fill">
<div class="card-body">
<div class="statistic-header">
<h4>Attendance </h4>

</div>
<div class="attendance-list">
<div class="row">
<div class="col-md-4">
<div class="attendance-details">
<?php

$sql = "SELECT COUNT(*) AS total_employees FROM members WHERE  status='1'";

if (!empty($start_date) && !empty($end_date)) {
  $sql .= " AND completion BETWEEN '$start_date' AND '$end_date'";
}

// Execute the query
$result = mysqli_query($db, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Print the total number of jobs

?>
<h4 class="text-primary"><?php echo $row['total_employees'] ?></h4>
<p>Total Employees</p>
</div>
</div>

<div class="col-md-4">
<div class="attendance-details">
<?php
// Get the current year and month
$year = date('Y');
$month = date('m');

// Get the number of days in the current month
$number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Initialize the count of working days
$working_days_count = 0;

// Loop through each day of the month
for ($day = 1; $day <= $number_of_days; $day++) {
    // Get the date for the current day
    $date = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
    
    // Get the day of the week (1=Monday, 7=Sunday)
    $day_of_week = date('N', strtotime($date));
    
    // Check if the day is a working day (Monday to Saturday)
    if ($day_of_week <= 6) {
        $working_days_count++;
    }
}

// Display the number of working days
echo '<h4 class="text-info">' . $working_days_count . '</h4>';
?>

<p>Working Days</p>
</div>
</div>
<div class="col-md-4">
<div class="attendance-details">
<?php
// Get the current year and month
$year = date('Y');
$month = date('m');

// Get the number of days in the current month
$number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Initialize the count of Sundays (leave days)
$sundays_count = 0;

// Loop through each day of the month
for ($day = 1; $day <= $number_of_days; $day++) {
    // Get the date for the current day
    $date = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
    
    // Get the day of the week (1=Monday, 7=Sunday)
    $day_of_week = date('N', strtotime($date));
    
    // Check if the day is a Sunday (7)
    if ($day_of_week == 7) {
        $sundays_count++;
    }
}

// Display the number of Sundays (leave days)
echo '<h4 class="text-danger">' . $sundays_count . '</h4>';
?>

<p>Total Leaves</p>
</div>
</div>
</div>
</div>
<div class="view-attendance">
<a href="leaves-employee.html">
Apply Leave <i class="fe fe-arrow-right-circle"></i>
</a>
</div>
</div>


</div>
<div class="col-md-12 d-flex">
<div class="card analytics-card w-100">
<div class="card-body">
<div class="statistic-header">
<h4>Client Goals</h4>
<div class="dropdown statistic-dropdown">
<div class="card-select" style="display:none;">
<ul>
<li>
<a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
Last 3 months
</a>
<div class="dropdown-menu dropdown-menu-end">
<a href="javascript:void(0);" class="dropdown-item">
Last 3 months
</a>
<a href="javascript:void(0);" class="dropdown-item">
Last 6 months
</a>
<a href="javascript:void(0);" class="dropdown-item">
Last 12 months
</a>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="table-responsive">
<table class="table custom-table table-nowrap mb-0">
<thead>
<tr>
<th>Company Name</th>
<th>Total Jobs </th>
<th> Due Date of Jobs</th>
<th>Job Progress</th>
</tr>
</thead>
<tbody>
<?php 
$sql_goals = "
    SELECT clientname, 
           COUNT(*) as incomplete_jobs, 
           MAX(completion) as max_completion 
    FROM `jobcreate` 
    WHERE job_status='' 
    GROUP BY clientname";

$result_goals = mysqli_query($db, $sql_goals);

while ($row = mysqli_fetch_assoc($result_goals)) {
    $clientname = $row['clientname'];
    $incomplete_jobs = $row['incomplete_jobs'];
    $completion_raw = $row['max_completion'];
    
    // Format the completion date
    $completion = date("j F Y", strtotime($completion_raw));

    // Get the count of incomplete jobs
    $sql_incomplete = "
        SELECT COUNT(*) as total_jobs 
        FROM `jobcreate` 
        WHERE  clientname='$clientname'";
    $result_incomplete = mysqli_query($db, $sql_incomplete);
    $row_incomplete = mysqli_fetch_assoc($result_incomplete);
    $total_jobs = $row_incomplete['total_jobs'];

    // Calculate completed jobs and percentage
    $completed_jobs = $total_jobs - $incomplete_jobs;
    $completion_percentage = ($completed_jobs / $total_jobs) * 100;
?>
<tr>
    <td><?php echo $clientname; ?></td>
    <td>
        <h2 class="table-avatar d-flex">
            <span><?php echo $total_jobs; ?></span>
        </h2>
    </td>
    <td><?php echo $completion; ?></td>
    <td><span class="badge bg-inverse-danger" style="font-size: 15px;"><?php echo round($completion_percentage); ?>%</span></td>
</tr>
<?php 
} 
?>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div>

<!-- ------------------------------------- -->
<div class="col-md-5 col-sm-5 col-lg-5 col-xl-5">
        <div class="card flex-fill">
        <div class="card-body">
        <div class="statistic-header">
        <h4> Staff Current Status</h4>
        <div class="important-notification">
        <a href="#">
        View All <i class="fe fe-arrow-right-circle"></i>
        </a>
        </div>
        </div>
        <div class="notification-tab">
        <ul class="nav nav-tabs" role="tablist">
        <li>
        <a href="#" class="active" data-bs-toggle="tab" data-bs-target="#notification_tab" aria-selected="true" role="tab">
        <i class="la la-bell"></i> Notifications
        </a>
        </li>
        <li>
        <a href="#" data-bs-toggle="tab" data-bs-target="#schedule_tab" aria-selected="false" tabindex="-1" role="tab">
        <i class="la la-list-alt"></i> Schedules
        </a>
        </li>
        </ul>
        <div class="tab-content">
        <div class="tab-pane active" id="notification_tab" role="tabpanel">
        <div class="employee-noti-content">
        <ul class="employee-notification-list">
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="badge-soft-danger rounded-circle">HR</span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        Your leave request has been
        </a>
        </h6>
        <ul class="nav">
        <li>02:10 PM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="badge-soft-info rounded-circle">ER</span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        You’re enrolled in upcom....
        </a>
        </h6>
        <ul class="nav">
        <li>12:40 PM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="badge-soft-warning rounded-circle">SM</span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        Your annual compliance trai
        </a>
        </h6>
        <ul class="nav">
        <li>11:00 AM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="rounded-circle">
        <img src="assets/img/avatar/avatar-1.jpg" class="img-fluid rounded-circle" alt="User">
        </span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        Jessica has requested feedba
        </a>
        </h6>
        <ul class="nav">
        <li>10:30 AM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="badge-soft-warning rounded-circle">DT</span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        Gentle remainder about train
        </a>
        </h6>
        <ul class="nav">
        <li>09:00 AM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        <li class="employee-notification-grid">
        <div class="employee-notification-icon">
        <a href="#">
        <span class="badge-soft-danger rounded-circle">AU</span>
        </a>
        </div>
        <div class="employee-notification-content">
        <h6>
        <a href="#">
        Our HR system will be down
        </a>
        </h6>
        <ul class="nav">
        <li>11:50 AM</li>
        <li>21 Apr 2024</li>
        </ul>
        </div>
        </li>
        </ul>
        </div>
        </div>
        <div class="tab-pane fade" id="schedule_tab" role="tabpanel">
        <div class="employee-noti-content">
        <ul class="employee-notification-list">
        <?php
        $cur_date = date('Y-m-d');

        // SQL query to select jobs grouped by member
        $sql = "SELECT * 
                FROM jobcreate 
                WHERE completion = '$cur_date' 
                AND job_start_at <> '' 
                AND job_pause_at = '' OR  job_pause_at <> ''
                AND job_start_again <> ''  
                AND job_status = '' 
                GROUP BY members ";


        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $member_id = $row['members'];
            $job_name = $row['job'];
            
            // Fetch member details (assuming there's a members table)
            $member_sql = "SELECT * FROM members WHERE id = '$member_id'";
            $member_result = mysqli_query($db, $member_sql);
            $member = mysqli_fetch_assoc($member_result);

            $member_name = $member['fname'];
            $id = $member['id']; 
            $profile_picture = $member['profile_picture']; 
            ?>

        <li class="employee-notification-grid">

            <div class="employee-notification-icon">
                    <a href="#">
                    <span class="rounded-circle">
                    <img src="../avatarjobs/<?php echo $profile_picture; ?>" class="img-fluid rounded-circle" alt="<?php echo $member_name; ?>">
                    </span>
                    </a>
            </div>
            <div class="employee-notification-content">
                    <h6>
                    <a href="#">
                    <?php echo $job_name; ?>
                    </a>
                    </h6>
                    <ul class="nav">
                    <li>Currently Working On It</li>
                    <li>Job Started at <?php
                    $datetime = $row['job_start_at'];

                    // Convert the datetime string to a timestamp
                    $timestamp = strtotime($datetime);

                    // Format the time in 12-hour format with AM/PM
                    $time_12hr_format = date('h:i A', $timestamp);

                    echo $time_12hr_format;
                    ?></li>
                    </ul>
            </div>

        </li>
        <?php
        }
        ?>
        </ul>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
</div>


</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <div class="statistic-header">
                            <h4>Follow Up</h4>
                        </div>
                    </div>
                    <div class="col-sm-4 text-sm-end">
                        <div class="owl-nav project-nav nav-control"></div>
                    </div>
                </div>

                <div class="project-slider owl-carousel">
                    <?php
                    $one_week_ago = date('Y-m-d', strtotime('-1 week'));
                    $cur_date = date('Y-m-d');

                    $sql = "SELECT *, MAX(completion) AS max_completion 
    FROM jobcreate WHERE completion <= '$one_week_ago'   GROUP BY clientname 
    ORDER BY id DESC";
     
     

                    // $sql = "SELECT clients.id AS client_id, clients.name AS client_name, clients.profile_picture, 
                    //       MAX(jobcreate.completion) AS last_completion 
                    // FROM clients
                    // LEFT JOIN jobcreate ON clients.id = jobcreate.clientname 
                    // WHERE jobcreate.completion >= '$one_week_ago'
                    // GROUP BY clients.id";
                  
   
               $result = mysqli_query($db, $sql);
     
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
             $client_id = $row['client_id'];
             $client_name = $row['clientname'];
             $profile_picture = $row['profile_picture'];
             $last_completion = $row['max_completion']; 
             $job_name = $row['job'];
                
             $sql_clients = "SELECT * from clients where name='$client_name'";
             $result_clients = mysqli_query($db, $sql_clients);
         
             if ($result_clients) {
                 // Check if any rows were returned
                 if (mysqli_num_rows($result_clients) > 0) {
                     // Fetch the result as an associative array
                     $row_clients = mysqli_fetch_assoc($result_clients);
                     
                     // Access the 'name' column from the result
                     $name_clients = $row_clients['name'];
                     $name_member_id = $row_clients['id'];
                     $profile_picture_clients = $row_clients['profile_picture'];
                     
                     // Output the name
                   
                 }
             }
        
                            ?>
                            <div class="project-grid">
                            <div class="project-bottom">
                                    <div class="project-leader">
                                        <ul class="nav justify-content-center">
                                         
                                           
                                            <li>
                                            <?php if(!empty($profile_picture_clients)){  ?>
                                                <a href="#" data-bs-toggle="tooltip" aria-label="<?php echo $client_name; ?>" data-bs-original-title="<?php echo $client_name; ?>">
                                                    <img src="../avatarjobs/<?php echo $profile_picture_clients; ?>" alt="none" class="img-fluid rounded-circle">
                                                </a>
                                                <?php } ?>
                                            </li>
                                           
                                            <li class="me-2" style="text-transform:uppercase;"> <?php echo $client_name; ?></li>
                                            
                                           
                                        </ul>
                                        <br>
                                    </div>
                                    
                                </div>
                                <div class="project-top ">
                                <h6>
                                  Last Work: <?php echo $last_completion; ?>
                              </h6>
                              <h5>
                              <a href="#">Job Name : <?php echo $job_name; ?></a>
                                </h5>
                    
                                </div>

                                <div class="project-middle">
                                    <ul class="nav justify-content-around">
                                        <li>
                                            <div class="project-tasks text-center">
                                            <?php

                                              $sql5 = "SELECT COUNT(*) AS total_jobs FROM jobcreate WHERE clientname='$client_name'";


                                              // Execute the query
                                              $result5 = mysqli_query($db, $sql5);

                                              // Fetch the result
                                              $row5 = mysqli_fetch_assoc($result5);

                                              // Print the total number of jobs
                                              echo "<h4>" . $row5['total_jobs'] . "</h4>";
                                              ?>
                                                <p>Total Jobs</p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>

                        
                            </div>
                            <?php
                        }
                    } 
                    ?>
                </div> <!-- End of project-slider -->
            </div>
        </div>
    </div>
</div>

<div class="row">

<div class="col-xl-12 col-md-12 d-flex">
<div class="card flex-fill">
<div class="card-body">
<div class="row align-items-center">
<div class="col-sm-8">
<div class="statistic-header">
<h4>Retainer Clients</h4>
</div>
</div>
<div class="col-sm-4 text-sm-end">
<div class="owl-nav company-nav nav-control"></div>
</div>
</div>
<div class="company-slider owl-carousel">
<?php
                    $one_week_ago = date('Y-m-d', strtotime('-1 week'));
                    $cur_date = date('Y-m-d');

                    $sql = "SELECT *, MAX(completion) AS max_completion 
    FROM jobcreate WHERE completion >= '$one_week_ago' AND completion <= '$cur_date'  GROUP BY clientname 
    ORDER BY id DESC";
     
                     
   
               $result = mysqli_query($db, $sql);
     
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
             $client_id = $row['id'];
             $client_name = $row['clientname'];
             $job = $row['job'];
             $completion = $row['max_completion']; 

        $sql_clients = "SELECT * from clients where name='$client_name'";
        $result_clients = mysqli_query($db, $sql_clients);
    
        if ($result_clients) {
            // Check if any rows were returned
            if (mysqli_num_rows($result_clients) > 0) {
                // Fetch the result as an associative array
                $row_clients = mysqli_fetch_assoc($result_clients);
                
                // Access the 'name' column from the result
                $name_clients = $row_clients['name'];
                $name_member_id = $row_clients['id'];
                $profile_picture_clients = $row_clients['profile_picture'];
                
                // Output the name
              
            }
        }
                            ?>

<div class="company-grid company-soft-tertiary">
    <div class="company-top">
            <div class="company-icon">
                <span class="company-icon-tertiary rounded-circle">
                    <?php if(!empty($profile_picture_clients)){  ?>
                        <img src="../avatarjobs/<?php echo $profile_picture_clients; ?>" alt="none" class="img-fluid rounded-circle">
                    <?php }?>
                </span>
            </div>
            <div class="company-link">
                 <a href="#"><?php echo $client_name; ?></a>
            </div>
    </div>
    <div class="company-bottom d-flex">
        <ul>
        <li>Job Name : <?php echo $job; ?></li>
        <li>Last Date of Work : <?php echo $completion; ?></li>
        </ul>

    </div>
</div>

<?php } }?> 

</div>
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