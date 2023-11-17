<?php
session_start();
require_once '../connection.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$user_id = $_SESSION['user_id'];
$name = validate($_POST['name']);
$birthday = validate($_POST['birthday']);
$sex = validate($_POST['gender']);
$phone = validate($_POST['phone']);
$email = validate($_POST['email']);
$address = validate($_POST['address']);
$cccd = validate($_POST['cccd']);
$study = validate($_POST['study']);
$experience = validate($_POST['experience']);
$certificate = validate($_POST['certification']);
$award = validate($_POST['award']);


$_SESSION['name'] = $name;
$_SESSION['birthday'] = $birthday;
$_SESSION['gender'] = $sex;
$_SESSION['phone'] = $phone;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['cccd'] = $cccd;
$_SESSION['study'] = $study;
$_SESSION['experience'] = $experience;
$_SESSION['certificate'] = $certificate;
$_SESSION['award'] = $award;
if (empty($_POST['name'])) {
    header("Location: ./formCV.php?error=Name is required");
    exit();
} else if (empty($_POST['birthday'])) {
    header("Location: ./formCV.php?error=Birthday is required");
    exit();
} else if (empty($_POST['gender'])) {
    header("Location: ./formCV.php?error=Gender is required");
    exit();
} else if (empty($_POST['phone'])) {
    header("Location: ./formCV.php?error=Phone is required");
    exit();
} else if (empty($_POST['cccd'])) {
    header("Location: ./formCV.php?error=Cccd is required");
    exit();
} else if (empty($_POST['email'])) {
    header("Location: ./formCV.php?error=Email is required");
    exit();
} else if (empty($_POST['address'])) {
    header("Location: ./formCV.php?error=Address is required");
    exit();
} else if (empty($_POST['study'])) {
    header("Location: ./formCV.php?error=Study is required");
    exit();
} else if (empty($_POST['experience'])) {
    header("Location: ./formCV.php?error=Experience is required");
    exit();
} else if (empty($_POST['certification'])) {
    header("Location: ./formCV.php?error=Certification is required");
    exit();
} else if (empty($_POST['award'])) {
    header("Location: ./formCV.php?error=Award is required");
    exit();
} else if (
    !empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['gender']) && !empty($_POST['phone']) &&
    !empty($_POST['cccd']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['study']) &&
    !empty($_POST['experience']) && !empty($_POST['certification']) && !empty($_POST['award'])
) {

    if (!isset($_SESSION['cv_id'])) { //// when user haven't had the CV
        $sql = "INSERT INTO user_cv
        (user_id, name, birthday, sex, phone, email, address,
        cccd, study, experience, certificate, award	)
        VALUES ('$user_id', '$name', '$birthday', '$sex',
        '$phone', '$email', '$address', '$cccd', '$study', '$experience', '$certificate', '$award')";
        // back to profile and show information cv
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $_SESSION['cv_id'] = mysqli_insert_id($conn);
            header('Location: ../Profile_handle/profile.php');
            exit();
        } else {
            echo "Error: " . $sql_create . "<br>" . $conn->error;
        }
    } else { // when user want to update CV
        echo "t dang update CV";
        $id = $_SESSION['cv_id'];
        $sql = "UPDATE user_cv SET name='$name',birthday='$birthday',sex='$sex',phone='$phone',email='$email',
        address='$address',cccd='$cccd',study='$study',experience='$experience',certificate='$certificate',award='$award' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: ../Profile_handle/profile.php');
            exit();
        } else {
            echo "Error: " . $sql_create . "<br>" . $conn->error;
        }
    }
}
