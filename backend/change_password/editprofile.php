<?php
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $client_id = $_POST["id1"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $field_names = $_POST["field_names"];
    $field_values = $_POST["field_values"];
    

    $targetDir = "../../../avatarjobs/members_img/"; // Directory where uploaded files will be stored
    $extension = pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION); // Get file extension
    $timestamp = time(); // Get the current timestamp
    $newFileName = $timestamp . '.' . $extension; // Create a new unique filename

    $targetFile = $targetDir . $newFileName; // Path of the renamed file

// Check if a file was uploaded
if (!empty($_FILES["imageUpload"]["name"])) {
    // File uploaded, perform file handling and update query
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
    // Loop through the posted field names and values to construct the update query
    foreach ($field_names as $index => $fieldName) {
        $fieldValue = $field_values[$fieldName];
        
        // Construct the SQL update query
        $sqlUpdate = "UPDATE members SET fname='$fname', lname='$lname',  profile_picture ='$targetFile', ";
        $updateFields = [];
        foreach ($field_names as $fieldName) {
            $fieldValue = $field_values[$fieldName];
            $updateFields[] = "$fieldName = '$fieldValue'";
        }
        
        // Join all field assignments with commas
        $sqlUpdate .= implode(', ', $updateFields);
        
        $sqlUpdate .= " WHERE id = $client_id";
        // Execute the SQL update query
        if (!$db->query($sqlUpdate)) {
            echo "Error updating " . $fieldName . ": " . $db->error;
            exit;
        }
        echo "<script>alert('Data updated successfully!');window.location.href='../../profile.php?id=$client_id&name_value=1';</script>";
        // echo "Field Name: " . $fieldName . ", Field Value: " . $fieldValue . " - Updated Successfully<br>";
    }
} 

}
else{
    foreach ($field_names as $index => $fieldName) {
        $fieldValue = $field_values[$fieldName];
        
        $sqlUpdate = "UPDATE members SET fname='$fname', lname='$lname'";

        $updateFields = [];
        foreach ($field_names as $fieldName) {
            $fieldValue = $db->real_escape_string($field_values[$fieldName]);
            $updateFields[] = "$fieldName = '$fieldValue'";
        }
        
        // Join all field assignments with commas
        $sqlUpdate .= ', ' . implode(', ', $updateFields);
        
        $sqlUpdate .= " WHERE id = $client_id";
        // echo $sqlUpdate;
        // exit;
        // Execute the SQL update query
        if (!$db->query($sqlUpdate)) {
            echo "Error updating " . $fieldName . ": " . $db->error;
            exit;
        }
}
echo "<script>alert('Data updated successfully!');window.location.href='../../profile.php?id=$client_id&name_value=1';</script>";
}
    
   
}

?>