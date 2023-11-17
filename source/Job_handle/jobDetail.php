<?php
session_start();
require_once('../connection.php');
require_once('../navigation.php');
$id_job = "";
$row;
if (isset($_POST['currentId'])) {
    $_SESSION['currentId'] = $_POST['currentId'];
}
if (isset($_SESSION['currentId'])) {
    $id_job = $_SESSION['currentId'];
    if (isset($_GET['job_id'])) {
        $id_job = $_GET['job_id'];
    }
    // echo $_GET['job_id'];

    $sql = "SELECT  * FROM jobs WHERE id='$id_job' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_array();
    }
} else if (isset($_GET['job_id'])) {
    $id_job = $_GET['job_id'];
    $sql = "SELECT  * FROM jobs WHERE id='$id_job' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_array();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</head>
<style>
    .applyBtn {
        background: rgb(221, 214, 243);
        background: linear-gradient(90deg, rgba(221, 214, 243, 1) 13%, rgba(250, 172, 168, 1) 99%);
    }
    .bg {
        background-image: url('../asset/bgCV.png');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
       
        background-origin:padding-box
    }
</style>

<body>

    <div class="container mt-5 mb-5 ">
        <div class="row ">
            <div class="col-lg-8 col-md-7 ">
                <div class="detail-job border rounded p-4 bg ">
                    <div class="detail-job-content">
                        <div class="detail-job-com-desc overflow-hidden d-block">
                            <h1 class="detail-job-tittle mb-3"><?php if (!empty($row['position'])) {
                                                                    echo $row['position'];
                                                                } else {
                                                                    echo "No information";
                                                                } ?></h1>
                        </div>

                        <div class="row">
                            <div class="col-8 col-lg-12 pr-0 applyBtn rounded text-center">
                                <a class="btn  w-100 btn-apply-cv" id="applyCV" userId="<?php echo $_SESSION['user_id']; ?>" 
                                userName="<?php echo $_SESSION['user_name']; ?>" nameBs="<?php echo $row['name']; ?>" 
                                position="<?php echo $row['position'];?>" img="<?php echo $row['img'];?>" 
                                language="<?php echo $row['language'];?>" area="<?php echo $row['area'];?>"
                                experience="<?php echo $row['experience'];?>" >Apply Your CV Now!</a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="detail-job-desc mt-4">
                        <h4 class="header-job-description"> Thông tin ứng tuyển</h4>
                        <div class="row">
                            <div class="col-lg-12 detail-job-general cus-detail">
                                <div class="detail-job-location py-3 border-top cus-job-detail-location">

                                    <div class="detail-job-desc-item">
                                        <div class="row">
                                            <div class="col-6 col-lg-6 text-left align-self-start">
                                                <div class="group-icon"><i class="fal fa-money-bill"></i></div>
                                                <div class="group-text fw-bold text-success">Mức Lương</div>

                                            </div>

                                            <div class="col-6 col-lg-6 text-end pe-3 align-self-start">
                                                <div class="general-value text-pink"><?php if (!empty($row['salary'])) {
                                                                                            echo $row['salary'];
                                                                                        } else {
                                                                                            echo "No information";
                                                                                        } ?></div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-left align-self-end">
                                                <div class="group-icon"><i class="fal fa-users"></i></div>
                                                <div class="group-text fw-bold text-success">Ngôn ngữ</div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-end">
                                                <div class="general-value text-green"><?php if (!empty($row['language'])) {
                                                                                            echo $row['language'];
                                                                                        } else {
                                                                                            echo "No information";
                                                                                        } ?></div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-left align-self-end">
                                                <div class="group-icon"><i class="fal fa-users"></i></div>
                                                <div class="group-text fw-bold text-success">Thời hạn tuyển dụng</div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-end pe-3">
                                                <div class="general-value text-green"><?php if (!empty($row['availableApply'])) {
                                                                                            echo $row['availableApply'];
                                                                                        } else {
                                                                                            echo "No information";
                                                                                        } ?></div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr>
                                    <div class="detail-job-desc-item">
                                        <div class="row">
                                            <div class="col-6 col-lg-5 text-left align-self-start">
                                                <div class="group-icon"><i class="fal fa-money-bill"></i></div>
                                                <div class="group-text fw-bold text-success">Thời gian</div>

                                            </div>

                                            <div class="col-6 col-lg-7 text-end pe-3 align-self-start">
                                                <div class="general-value text-pink"><?php if (!empty($row['worktime'])) {
                                                                                            echo $row['worktime'];
                                                                                        } else {
                                                                                            echo "No information";
                                                                                        } ?></div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-left align-self-end">
                                                <div class="group-icon"><i class="fal fa-users"></i></div>
                                                <div class="group-text fw-bold text-success">Kinh nghiệm</div>
                                            </div>

                                            <div class="col-6 col-lg-6 text-end pe-3">
                                                <div class="general-value text-green"><?php if (!empty($row['experience'])) {
                                                                                            echo $row['experience'];
                                                                                        } else {
                                                                                            echo "No information";
                                                                                        } ?></div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="header-job-description mt-4">Quyền Lợi</h4>
                                    <p class="text-muted mb-0" style="white-space: pre-line;"></p>
                                    <p>
                                        <?php
                                        if (!empty($row['benefits'])) {
                                            $array1 = explode("-", $row['benefits']);
                                            foreach ($array1 as $value) {
                                                if (!empty($value)) {
                                                    echo "- " . $value . "<br>";
                                                }
                                            }
                                        } else {
                                            echo "No information";
                                        }
                                        ?>

                                    </p>
                                    <p></p>
                                    <h4 class="header-job-description mt-4">Mô tả công việc</h4>
                                    <p>
                                        <?php
                                        if (!empty($row['description'])) {
                                            $array1 = explode("-", $row['description']);
                                            foreach ($array1 as $value) {
                                                if (!empty($value)) {
                                                    echo "- " . $value . "<br>";
                                                }
                                            }
                                        } else {
                                            echo "No information";
                                        }
                                        ?>
                                    </p>
                                    <p></p>


                                    <div class="detail-job-desc-item"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0">
                <div class="detail-job border rounded p-4 company-in4 mb-3">
                    <div class="group-image text-center">
                        <img class="image-company img-fluid" src="<?php echo $row['img']; ?>">
                    </div>
                    <h5 class="text-center pb-2 tittle-company-job-detail">
                        <?php if (!empty($row['name'])) {
                            echo $row['name'];
                        } else {
                            echo "No information";
                        } ?>
                        <!-- <p class="text-muted mb-2 des-tittle-company-job-detail"> F H</p> -->
                    </h5>

                    <div class="detail-job-location pt-3" style="display: grid; grid-template-columns: 1fr;">
                        <!-- <div class = "detail-job-desc-item mb-3">
                                <div class = "float-left mr-2">Địa chỉ</div>
                                <p class = "mb-2">117 Nguyễn Đình Chiểu, Phường Võ Thị Sáu, Quận 3, TP.Hồ Chí Minh</p>

                            </div> -->
                        <div class="detail-job-desc-item">
                            <div class="float-left mr-2 ">
                                <p class="fw-bold h3">Địa chỉ</p>
                                <p class="mb-2"><?php if (!empty($row['address'])) {
                                                    echo $row['address'];
                                                } else {
                                                    echo "No information";
                                                } ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-job rounded mt-2">
                        <a tittle="greate" href="../Business_handle/businessDetail.php?businessDetail=<?php echo $row['name']; ?>" class="btn btn-outline-primary w-100 btn-about-company btn-out-line btn-clock">Về Chúng tôi</a>
                    </div>



                </div>
                <!-- <div class = "detail-job border rounded p-4 company-in4">
                            <div class = "row">
                                <div class = "col-lg-12"><h4 class = "header-job-description mt-0 mb-3">Việc làm tương tự</h4></div>
                            </div>
                            <div class = "detail-job rounded mt-2">
                                <a tittle = "Danh sach việc làm" href = "#" class = "btn btn-outline-primary w-100 btn-about-company btn-out-line btn-clock">Xem Tất Cả</a>
                            </div>
                    </div> -->
            </div>
        </div>
    </div>

    <?php require_once('../footer.php'); ?>

</body>

<script>
    $(document).ready(function() {
        let user_id;
        let name_Bs;
        let position;
        let user_Name;
        let img;
        let language;
        let area;
        let experience;
        $("#applyCV").click(function() {
            user_id = $(this).attr("userId");
            name_Bs = $(this).attr("nameBs");
            position = $(this).attr("position");
            user_Name = $(this).attr("userName");
            img= $(this).attr("img");
            language=$(this).attr("language");
            area=$(this).attr("area");
            experience=$(this).attr("experience");
            console.log(user_id + "/" + name_Bs + "/" + position + "/" + user_Name);
            $.post("../Apply_handle/apply.php", {
                user_id: user_id,
                name_Bs: name_Bs,
                position: position,
                user_Name: user_Name,
                image: img ,
                language: language , 
                area: area ,
                experience: experience
            }, function(result, status) {
                if (status == 'success') {
                    console.log(result);
                    if (result == "You don't have CV please create!") {
                        if (window.confirm('Do you want to create CV ?')) {
                            window.open('../CV_handle/formCV.php', '_blank');
                        };
                    }else{
                        alert(result);
                    }

                }

            });

        });

    });
</script>

</html>