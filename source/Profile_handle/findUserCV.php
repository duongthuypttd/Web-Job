<?php
session_start();
require_once '../connection.php';
$userID=$_SESSION['user_id'];
$sql = "SELECT  * FROM user_cv WHERE user_id='$userID'";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)===1){
    $row= mysqli_fetch_assoc($result);
    $_SESSION['cv_id'] = $row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['birthday']=$row['birthday'];
    $_SESSION['gender']=$row['sex'];
    $_SESSION['phone']=$row['phone'];
    $_SESSION['email']=$row['email'];
    $_SESSION['address']=$row['address'];
    $_SESSION['cccd']=$row['cccd'];
    $_SESSION['study']=$row['study'];
    $_SESSION['experience']=$row['experience'];
    $_SESSION['certificate']=$row['certificate'];
    $_SESSION['award']=$row['award'];
}
?>