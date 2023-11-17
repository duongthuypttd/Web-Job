<?php
session_start();
require_once('../connection.php');
if (
    isset($_POST['nameCty']) && isset($_FILES['logo']) && isset($_POST["hotline"]) && isset($_POST['email'])
    && isset($_POST['website']) && isset($_POST['facebook']) && isset($_POST['address']) && isset($_POST['progress'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$nameCty = validate($_POST['nameCty']);
$logo = $_FILES["logo"]['name'];
$hotline = validate($_POST['hotline']);
$email = validate($_POST['email']);
$website = validate($_POST['website']);
$facebook = validate($_POST['facebook']);
$address = validate($_POST['address']);
$progress = validate($_POST['progress']);

// echo "ccc=".$logo;
// exit();

$_SESSION['nameBs'] = $nameCty;
$_SESSION['logoBs'] = $logo;
$_SESSION['hotlineBs'] = $hotline;
$_SESSION['emailBs'] = $email;
$_SESSION['websiteBs'] = $website;
$_SESSION['facebookBs'] = $facebook;
$_SESSION['addressBs'] = $address;
$_SESSION['progressBs'] = $progress;

if (empty($nameCty)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Name is required");
    exit();
} else if (empty($logo)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Logo Image is required");
    exit();
} else if (empty($hotline)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Hotline is required");
    exit();
} else if (empty($email)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Email is required");
    exit();
} else if (empty($website)) {
    header("Location:../Business_handle/addBusinessForm.php?error=WebsiteLink is required");
    exit();
} else if (empty($facebook)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Facebook link is required");
    exit();
} else if (empty($address)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Address is required");
    exit();
} else if (empty($progress)) {
    header("Location:../Business_handle/addBusinessForm.php?error=Progress is required");
    exit();
} else if (
    !empty($nameCty) && !empty($logo) && !empty($hotline) && !empty($email) &&
    !empty($website) && !empty($facebook) && !empty($address) && !empty($progress)
) {
    $sql_checkExist = "SELECT * FROM business WHERE
    name='$nameCty' ";
    $result_check = mysqli_query($conn, $sql_checkExist);
    if (mysqli_num_rows($result_check) >= 1) {
        header('Location: ../Business_handle/addBusinessForm.php?error=This Business is already existed');
        exit();
    }
   
    $logo="../images/".$logo;
    $sql = "INSERT INTO business
    (name, hotline, customer_mail, official_website, official_facebook, head_offices, progress, img)
    VALUES ('$nameCty', '$hotline', '$email', '$website','$facebook', '$address', '$progress', '$logo')";
    if($_SESSION['user_name']=='admin'){
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            // $_SESSION['cv_id'] = mysqli_insert_id($conn);
            unset($_SESSION['nameBs']);
            unset($_SESSION['logoBs']);
            unset($_SESSION['hotlineBs']);
            unset($_SESSION['emailBs']);
            unset($_SESSION['websiteBs']);
            unset($_SESSION['facebookBs']);
            unset($_SESSION['addressBs']);
            unset($_SESSION['progressBs']);
            header('Location: ../Business_handle/addBusinessForm.php?state=Add Job Successfully!');
            exit();
        } else {
            header('Location: ../Job_handle/addJobForm.php?error=Add job failed');
        }
    } else{
        header("Location: ../Home_handle/home.php");
    }
    
}
