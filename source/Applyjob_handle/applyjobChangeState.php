<?php
session_start();
require_once("../connection.php");
if(isset($_POST['applyjob_id']) && isset($_POST['state'])){
    $state=$_POST['state'];
    $id=$_POST['applyjob_id'];
    $sql = "UPDATE apply_job SET state='$state' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
}
?>