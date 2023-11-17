<?php
session_start();
require_once('../connection.php');
if(isset($_POST['idLovingJob'])){
    $id=$_POST['idLovingJob'];
    $sql= "DELETE FROM love_jobs WHERE id='$id'";
    if (mysqli_query($conn, $sql)){
        die("Delete loving job successfully!") ;
    }
}
die("Delete loving job failed!");
?>