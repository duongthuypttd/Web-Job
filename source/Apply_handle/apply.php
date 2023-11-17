<?php
session_start();
require_once("../connection.php");
if(!empty($_POST['user_id']) && !empty($_POST['name_Bs']) && !empty($_POST['position']) 
&& !empty($_POST['user_Name']) && !empty($_POST['image']) && !empty($_POST['language'])
&& !empty($_POST['area']) && !empty($_POST['experience'])){

    $name=$_POST['name_Bs'];
    $position=$_POST['position'];
    $userId=$_POST['user_id'];
    $userName=$_POST['user_Name'];
    $image=$_POST['image'];
    $language = $_POST['language'];
    $area = $_POST['area'];
    $experience = $_POST['experience'];

    $sql_checkUserHaveCV = "SELECT * FROM user_cv WHERE user_id='$userId' ";
    $result_check= mysqli_query($conn,$sql_checkUserHaveCV);
    if(mysqli_num_rows($result_check)==0){
        echo "You don't have CV please create!";
        exit();
    }
    
    $sql_check_CVApplied = "SELECT * FROM apply_job WHERE name='$name' AND position='$position' 
    AND  userId='$userId' AND userName='$userName' AND experience='$experience' ";
    $result= mysqli_query($conn,$sql_check_CVApplied);
    if(mysqli_num_rows($result)==1){
        die("You have already applied to this job!");
    }
    $sql_create = "INSERT INTO apply_job (name, position, userId, userName, img, language, experience, area) 
                VALUES ('$name', '$position' , '$userId', '$userName', '$image', '$language','$experience', '$area' )";
    if (mysqli_query($conn, $sql_create)){
        die("Apply successfully! ^^") ;
    }
}
