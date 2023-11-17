<?php
session_start();
require_once('../connection.php');
if (
    isset($_POST['jobname']) && isset($_FILES["logo"]) && isset($_POST['area']) && isset($_POST['language']) && isset($_POST['experience']) && isset($_POST['salary']) && isset($_POST['position']) && isset($_POST['description'])
    && isset($_POST['address']) && isset($_POST['worktime']) && isset($_POST['availableApply']) && isset($_POST['benefit'])
) {
}
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$jobname = validate($_POST['jobname']);
$logo = $_FILES["logo"]['name'];
$area = validate($_POST['area']);
$language = validate($_POST['language']);
$experience = validate($_POST['experience']);
$salary = validate($_POST['salary']);
$position = validate($_POST['position']);
$description = validate($_POST['description']);
$address = validate($_POST['address']);
$worktime = validate($_POST['worktime']);
$availableApply = validate($_POST['availableApply']);
$benefit = validate($_POST['benefit']);

// echo "ccc=".$logo;
// exit();

$_SESSION['jobname'] = $jobname;
$_SESSION['logo'] = $logo;
$_SESSION['area'] = $area;
$_SESSION['language'] = $language;
$_SESSION['experience'] = $experience;
$_SESSION['salary'] = $salary;
$_SESSION['position'] = $position;
$_SESSION['description'] = $description;
$_SESSION['address'] = $address;
$_SESSION['worktime'] = $worktime;
$_SESSION['availableApply'] = $availableApply;

if (empty($jobname)) {
    header("Location:../Job_handle/addJobForm.php?error=Name is required");
    exit();
} else if (empty($logo)) {
    header("Location:../Job_handle/addJobForm.php?error=Logo Image is required");
    exit();
} else if (empty($area)) {
    header("Location:../Job_handle/addJobForm.php?error=Area is required");
    exit();
} else if ($language=='0' ){
    header("Location:../Job_handle/addJobForm.php?error=Language is required");
    exit();
} else if ($experience=='0') {
    header("Location:../Job_handle/addJobForm.php?error=Experience is required");
    exit();
} else if (empty($position)) {
    header("Location:../Job_handle/addJobForm.php?error=Position is required");
    exit();
} else if (empty($description)) {
    header("Location:../Job_handle/addJobForm.php?error=Description is required");
    exit();
} else if (empty($address)) {
    header("Location:../Job_handle/addJobForm.php?error=Address is required");
    exit();
} else if (empty($worktime)) {
    header("Location:../Job_handle/addJobForm.php?error=Worktime is required");
    exit();
} else if (empty($availableApply)) {
    header("Location:../Job_handle/addJobForm.php?error=Available is required");
    exit();
} else if (
    !empty($jobname) && !empty($logo) && !empty($area) && !empty($language) &&
    !empty($experience) && !empty($position) && !empty($description) && !empty($address) &&
    !empty($worktime) && !empty($availableApply)
) {
    $sql_checkExist = "SELECT * FROM jobs WHERE
    name='$jobname' AND area='$area' AND language='$language' AND experience='$experience' AND salary='$salary' AND position='$position' AND description='$description' AND
    address='$address' AND worktime='$worktime' AND availableApply='$availableApply' AND benefits='$benefit' AND img='$logo' ";
    $result_check= mysqli_query($conn,$sql_checkExist);
    if(mysqli_num_rows($result_check)>=1){
        header('Location: ../Job_handle/addJobForm.php?error=This job is already existed');
        exit();
    }
    $logo="../images/".$logo;
    $sql = "INSERT INTO jobs
    (name, area, language, experience, salary, position, description,
    address, worktime, availableApply, benefits, img	)
    VALUES ('$jobname', '$area', '$language', '$experience',
    '$salary', '$position', '$description', '$address', '$worktime', '$availableApply', '$benefit', '$logo')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        // $_SESSION['cv_id'] = mysqli_insert_id($conn);
        unset($_SESSION['jobname']);
        unset($_SESSION['logo']);
        unset($_SESSION['area']);
        unset($_SESSION['language']);
        unset($_SESSION['experience']);
        unset($_SESSION['salary']);
        unset($_SESSION['position']);
        unset($_SESSION['description']);
        unset($_SESSION['address']);
        unset($_SESSION['worktime']);
        unset($_SESSION['availableApply']);
        header('Location: ../Job_handle/addJobForm.php?state=Add Job Successfully!');
        exit();
    } else {
        header('Location: ../Job_handle/addJobForm.php?error=Something is wrong');
    }
}
