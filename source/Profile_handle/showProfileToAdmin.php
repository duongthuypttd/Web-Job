<?php
session_start();
require_once("../connection.php");
require_once("../navigation_admin.php");
$row;
if(isset($_POST['userId'])){
    $_SESSION['currrentIdCV']= $_POST['userId'];
}
if(!empty($_SESSION['currrentIdCV'])){
    $userID=$_SESSION['currrentIdCV'];
    $sql = "SELECT  * FROM user_cv WHERE user_id='$userID'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)===1){
        $row= mysqli_fetch_assoc($result);
    }
}
// if()

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JOB SEARCH - Profile việc làm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</head>
<style>
    .bg {
        background-image: url('../images/bgCV.png');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="bg py-5">
        <div class="container">
                <div class="card border border border-dark rounded">
                    <div class="card-body m-3">
                        <form class="row g-3">
                            <h1 class="text-center mb-5">HỒ SƠ CÁ NHÂN</h1>
                            <div class="row d-flex;">
                                <div class="col-12 col-md-4 " style="height: auto;">
                                    <img src="../images/ava-profile.PNG" height="40%" width="100%" alt="ava-profile" class="img-fluid rounded">
                                    <div class="p-3 py-4" style="height: 60%; background-color:#2C5D63;align-items: stretch;">
                                        <div class="d-flex">
                                            <p class="text-light m-0 ">Họ và tên</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['name'];
                                                                            } ?></p> <!-- Load tên từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Năm sinh</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['birthday'];
                                                                            } ?></p> <!-- Load năm sinh từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Giới tính</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['sex'];
                                                                            } ?></p> <!-- Load giới tính từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Số CMND</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['cccd'];
                                                                            } ?></p> <!-- Load CMND từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Số điện thoại</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['phone'];
                                                                            } ?></p> <!-- Load SĐT từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Email</p>
                                            <p class="text-white" mw-100><?php if (!empty($row)) {
                                                                                echo ": " . $row['email'];
                                                                            } ?></p> <!-- Load Email từ cv -->
                                        </div>
                                        <div class="d-flex">
                                            <p class="text-light m-0">Địa chỉ</p>
                                            <p class="text-white mw-100 "><?php if (!empty($row)) {
                                                                                echo ": " . $row['address'];
                                                                            } ?></p> <!-- Load địa chỉ từ cv -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-8" style="height: auto;">
                                    <div>
                                        <h2 class="p-0 m-0 " style="color: #2C5D63;">HỌC VẤN</h2>
                                        <hr style="color: #033036; height: 4px;">
                                        </hr>
                                        <p><?php if (!empty($row)) {
                                                echo $row['study'];
                                            } ?></p><!-- Load Học vấn từ cv -->
                                    </div>
                                    <div>
                                        <h2 class="p-0 m-0" style="color: #2C5D63;">KINH NGHIỆM LÀM VIỆC</h2>
                                        <hr style="color: #033036; height: 4px;">
                                        </hr>
                                        <p><?php if (!empty($row)) {
                                                echo $row['experience'];
                                            } ?></p><!-- Load kinh nghiệm từ cv -->
                                    </div>
                                    <div>
                                        <h2 class="p-0 m-0" style="color: #2C5D63;">CHỨNG CHỈ</h2>
                                        <hr style="color: #033036; height: 4px;">
                                        </hr>
                                        <p><?php if (!empty($row)) {
                                                echo $row['certificate'];
                                            } ?></p><!-- Load chứng chỉ từ cv -->
                                    </div>
                                    <div>
                                        <h2 class="p-0 m-0" style="color: #2C5D63;">GIẢI THƯỞNG</h2>
                                        <hr style="color: #033036; height: 4px;">
                                        </hr>
                                        <p><?php if (!empty($row)) {
                                                echo $row['award'];
                                            } ?></p><!-- Load Giải thưởng từ cv -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button disabled type="submit" class="btn btn-primary" style="background-color:#2C5D63;"><a class="text-decoration-none text-light" href="../CV_handle/formCV.php"><?php if($_SESSION['user_name']=='admin') {echo'Hồ sơ của người nộp';} else{echo 'Hoàn thiện hồ sơ cá nhân';} ?></a> </button>
                            </div>
                            <small class="text-end"><?php if($_SESSION['user_name']!='admin') {echo 'Nhấn vào đây để thêm hồ sơ cá nhân';}  ?></php></small>
                        </form>
                    </div>
                </div>
        </div>

    </div>
</body>

</html>