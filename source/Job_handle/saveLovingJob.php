<?php
session_start();
require_once('../connection.php');

    $currentId=$_SESSION['user_id']; //curent user id
    $jobId=$_POST['jobId'];
    $sql_checkSavingJob = "SELECT * FROM love_jobs WHERE user_id='$currentId' AND job_id='$jobId' ";
    $result_check= mysqli_query($conn,$sql_checkSavingJob);
    if(mysqli_num_rows($result_check)>=1){
        echo "You have saved this job!";
        exit();
    }

    $sql_findJob = "SELECT * FROM jobs WHERE id='$jobId' ";
    $result_findJob= mysqli_query($conn,$sql_findJob);


    if(mysqli_num_rows($result_findJob)>0){
        // die("You have saved this job!");
        $row= mysqli_fetch_assoc($result_findJob);
        $name=$row['name'];
        $language=$row['language'];
        $experience=$row['experience'];
        $salary=$row['position'];
        $available=$row['availableApply'];
        $area=$row['area'];
        $position=$row['position'];
        $img=$row['img'];
        $sql_create = "INSERT INTO love_jobs (name, position, language, salary, experience, available, area, img, user_id, job_id) 
                VALUES ('$name', '$position' , '$language', '$salary', '$experience', '$available','$area', '$img', '$currentId', '$jobId' )";
        
        if (mysqli_query($conn, $sql_create)){
            die("Saving job successfully!") ;
        }
    }
?>