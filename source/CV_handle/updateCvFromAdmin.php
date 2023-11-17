<?php
session_start();
require_once('../connection.php');
if(isset($_POST['cvId']) && isset($_POST['cvState'])){
    $state=$_POST['cvState'];
    $id=$_POST['cvId'];
    $sql = "UPDATE apply_job SET state='$state' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        die("Update successfully");
        
    } else {
        die("Update failed");
    }
}
if(isset($_POST['cvInterviewDate']) && isset($_POST['cvBusinessNote'])){
    echo $_POST['cvId'];
    // echo "cc ne";
    $date=$_POST['cvInterviewDate'];
    $note=$_POST['cvBusinessNote'];
    $id=$_POST['cvId'];
    $sql = "UPDATE apply_job SET interviewDate='$date' , businessNote='$note' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../Admin_handle/adminHome.php?action=Yes");        
    } else {
        die("Update failed");
    }
}
?>