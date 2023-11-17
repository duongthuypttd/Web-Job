<?php
session_start();
require_once("../navigation_admin.php");
require_once("../connection.php");
$sql;
$result;
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'Waiting' || $action == "Yes") {
        $sql = "SELECT  * FROM apply_job WHERE state = '$action' ";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT  * FROM apply_job WHERE interviewDate != '' ";
        $result = mysqli_query($conn, $sql);
    }
}

else if (isset($_POST['nameCV']) && isset($_POST['positionCV']) && isset($_POST['languageCV']) && isset($_POST['stateCV']) 
&& isset($_POST['interviewDateCV']) && isset($_POST['experienceCV']) ) {
    $nameCV = validate($_POST['nameCV']);
    $positionCV = validate($_POST['positionCV']);
    $languageCV = validate($_POST['languageCV']);
    $stateCV = validate($_POST['stateCV']);
    $experienceCV= validate($_POST['experienceCV']);
    $interviewDateCV = validate($_POST['interviewDateCV']);
    $where = "WHERE";
    $index = array();
    $query = array($nameCV, $positionCV, $languageCV, $stateCV,$experienceCV,$interviewDateCV,);
    for ($x = 0; $x < 6; $x++) {
        if (!empty($query[$x]) && $query[$x] != '--Trạng thái--' && $query[$x] != '--Ngôn ngữ--'  && $query[$x] != '--Kinh nghiệm--') {
            array_push($index, $x);
            echo $query[$x];
        }
    }
    // echo '<pre>'; print_r($index); echo '</pre>';
    foreach ($index as $inx) {
        if ($inx == 0) {
            $value = $query[$inx];
            $where .= " userName='$value'" . " AND ";
        }
        if ($inx == 1) {
            $value = $query[$inx];
            $where .= " position='$value'" . " AND ";
        }
        if ($inx == 2) {
            $value = $query[$inx];
            $where .= " language='$value'" . " AND ";
        }
        if ($inx == 3) {
            $value = $query[$inx];
            $where .= " state='$value'" . " AND ";
        }
        if ($inx == 4) {
            $value = $query[$inx];
            $where .= " experience='$value'" . " AND ";
        }
        if ($inx == 5) {
            $value = $query[$inx];
            $where .= " interviewDate='$value'" . " AND ";
        }
    }
    $where = rtrim($where, " AND ");
    echo $where;
    if ($where != 'WHERE') {
        $sql = "SELECT  * FROM apply_job " . $where;
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT  * FROM apply_job ";
        $result = mysqli_query($conn, $sql);
    }
    echo mysqli_num_rows($result);
    // echo "Đã post từ form";
} else {
    $sql = "SELECT  * FROM apply_job ";
    $result = mysqli_query($conn, $sql);
    // echo "Chưa post từ form";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .bg {
        background-image: url('../images/bgCV.jpg');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="bg">
        <h3 class="text-center p-4" style="color:red"><b>DANH SÁCH CÁC ỨNG VIÊN</b></h1>
            <div class="container-fuild">
                <div class="row">

                    <?php
                    require_once("submenu.php");
                    ?>

                    <!-- Bên phải -->
                    <div class="col-md-10 col-sm-10 " style="height: 750px;">
                        <div class="card">
                            <div class="card-body m-3">
                                <!-- Tìm kiếm -->
                                <form class="card" action="../Admin_handle/adminHome.php" method="post">
                                    <div class="card-header text-white" style="background-color:#2C5D63;"><b>Tìm kiếm</b></div>
                                    <div class="container-fluid border border-4 border-top-0">
                                        <div class="row">
                                            <div class="col-md-6 p-2">
                                                <label for="inputName" class="form-label"><b style="color:#2C5D63;">Tên ứng viên</b></label>
                                                <input type="text" class="form-control bolder-set" id="inputName" placeholder="Họ và tên" name="nameCV">
                                            </div>



                                            <div class="col-md-6 p-2">
                                                <label for="stateCV" class="form-label"><b style="color:#2C5D63;">Trạng thái duyệt hồ sơ</b></label>
                                                <select class="form-control select2 select2-hidden-accessible" id="stateCV" name="stateCV">
                                                    <option selected>--Trạng thái--</option>
                                                    <option value="Yes">Đã duyệt</option>
                                                    <option value="Waiting">Đang chờ duyệt</option>
                                                    <option value="No">Từ chối</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 p-2">
                                                <label for="inputJobs" class="form-label"><b style="color:#2C5D63;">Tên công việc</b></label>
                                                <input type="text" class="form-control bolder-set" id="inputJobs" name="positionCV" placeholder="Developer">
                                            </div>


                                            <div class="col-md-6 p-2">
                                                <label for="language" class="form-label"><b style="color:#2C5D63;">Ngôn ngữ ứng tuyển</b></label>
                                                <select class="form-control select2 select2-hidden-accessible" id="language" name="languageCV">
                                                    <option>--Ngôn ngữ--</option>
                                                    <option value="Java">Java</option>
                                                    <option value="Py">Python</option>
                                                    <option value="JS">JavaScript</option>
                                                    <option value="Net">.NET</option>
                                                    <option value="Test">Tester</option>
                                                    <option value="Ruby">Ruby</option>
                                                    <option value="BA">Business Analyst</option>
                                                    <option value="Php">Php</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 p-2">
                                                <label for="language" class="form-label"><b style="color:#2C5D63;">Kinh nghiệm làm việc</b></label>
                                                <select class="form-control select2 select2-hidden-accessible" id="language" name="experienceCV">
                                                    <option>--Kinh nghiệm--</option>
                                                    <option value="Trên 6 tháng">Dưới 6 tháng</option>
                                                    <option value="1 - 2 năm">1 - 2 năm</option>
                                                    <option value="2 - 3 năm">2 - 3 năm</option>
                                                    <option value="Trên 3 năm">Trên 3 năm</option>
                                                </select>
                                            </div>

                                            


                                            <div class="col-md-6 p-2">
                                                <label for="inverviewDateCV" class="form-label"><b style="color:#2C5D63;">Ngày hẹn phỏng vấn</b> </label>
                                                <input type="text" class="form-control bolder-set" id="inverviewDateCV" name="interviewDateCV" placeholder="dd/mm/yy">
                                            </div>

                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary" style="background-color:#2C5D63;">Tìm kiếm</button>
                                            </div>
                                            <small class="text-end">Nhấn vào đây tìm kiếm ứng viên</small>
                                        </div>
                                    </div>


                                </form>

                                <hr>

                                <!-- Kết quả tìm kiếm -->
                                <div class="border border-5 border-light m-3 rounded bg-white">
                                    <div class="d-flex  m-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <?php
                                                if (empty($_GET['action'])) {
                                                    echo "<th>Mã</th>";
                                                    echo "<th>Name</th>";
                                                    echo "<th>Tên công việc apply</th>";
                                                    echo "<th>Ngôn ngữ</th>";
                                                    echo "<th>Kinh nghiệm</th>";
                                                    echo "<th>Trạng thái duyệt hồ sơ</th>";
                                                    echo "<th>Ngày được hẹn phỏng vấn</th>";
                                                    echo "<th>cv đã tạo trên hệ thống</th>";
                                                } else if ($_GET['action'] == 'Waiting') {
                                                    echo "<th>Mã</th>";
                                                    echo "<th>Name</th>";
                                                    echo "<th>Tên công việc apply</th>";
                                                    echo "<th>Ngôn ngữ</th>";
                                                    echo "<th>Kinh nghiệm</th>";
                                                    echo "<th class=\"text-center\">Cv trên hệ thống</th>";
                                                    echo "<th>Duyệt hồ sơ</th>";
                                                } else if ($_GET['action'] == 'Yes') {
                                                    echo "<th>Mã</th>";
                                                    echo "<th>Name</th>";
                                                    echo "<th>Tên công việc apply</th>";
                                                    echo "<th>Ngôn ngữ</th>";
                                                    echo "<th>Kinh nghiệm</th>";
                                                    echo "<th> Trạng thái hồ sơ</th>";
                                                    echo "<th class=\"text-center\">Cv trên hệ thống</th>";
                                                    echo "<th>Hẹn ngày phỏng vấn</th>";
                                                    echo "<th class=\"text-center\">Ghi chú của công ty</th>";
                                                    echo "<th>Update Interview</th>";
                                                } else if ($_GET['action'] == "Interview") {
                                                    echo "<th>Mã</th>";
                                                    echo "<th>Name</th>";
                                                    echo "<th>Tên công việc apply</th>";
                                                    echo "<th>Ngôn ngữ</th>";
                                                    echo "<th>Kinh nghiệm</th>";
                                                    echo "<th>Trạng thái duyệt hồ sơ</th>";
                                                    echo "<th>Ngày được hẹn phỏng vấn</th>";
                                                    echo "<th class=\"text-center\">cv đã tạo trên hệ thống</th>";
                                                }
                                                ?>
                                            </tr>

                                            <?php
                                            if (mysqli_num_rows($result) >= 1) {
                                                while ($row = $result->fetch_array()) {
                                                    if (empty($_GET['action'])) {
                                                        echo    "<tr>";
                                                        echo    "<th>" . $row['id'] . "</th>";
                                                        echo    "<th>" . $row['userName'] . "</th>";
                                                        echo    "<th>" . $row['position'] . "</th>";
                                                        echo    "<th>" . $row['language'] . "</th>";
                                                        echo    "<th>" . $row['experience'] . "</th>";
                                                        echo    "<th>" . $row['state'] . "</th>";
                                                        echo     "<th>" . $row['interviewDate'] . "</th>";
                                                        echo     "<th><a class=\"text-decoration-none text-white showCV\" value=\"" . $row['userId'] . "\"><button class=\"btn btn-primary text-center\" style=\"background-color:#2C5D63;\">Cv ứng viên</button></a></th>";

                                                        echo "</tr>";
                                                    } else if ($_GET['action'] == 'Waiting') {
                                                        echo    "<tr>";
                                                        echo    "<th>" . $row['id'] . "</th>";
                                                        echo    "<th>" . $row['userName'] . "</th>";
                                                        echo    "<th>" . $row['position'] . "</th>";
                                                        echo    "<th>" . $row['language'] . "</th>";
                                                        echo    "<th>" . $row['experience'] . "</th>";
                                                        echo     "<th class=\"d-flex justify-content-center\"><a class=\"text-decoration-none text-white showCV\" value=\"" . $row['userId'] . "\"><button class=\"btn btn-success text-center\" style=\"\">Cv ứng viên</button></a></th>";
                                                        echo    "<th>";
                                                        echo           "<a class=\"text-decoration-none text-white acceptCV\" value=".$row['id']." ><button class=\"btn btn-primary text-center btn-success\">Duyệt hồ sơ</button></a> ";
                                                        echo           "<a class=\"text-decoration-none text-white denyCV\" value=".$row['id']."><button class=\"btn btn-primary text-center btn-danger\">Từ chối</button></a>";
                                                        echo    "</th>";
                                                        echo    "</tr>";
                                                    } else if ($_GET['action'] == 'Yes') {
                                                        $dateInterview = '';
                                                        $businessNote = '';
                                                        if ($row["interviewDate"] != '') {
                                                            $dateInterview = $row['interviewDate'];
                                                        }
                                                        if ($row["businessNote"] != '') {
                                                            $businessNote = $row['businessNote'];
                                                        }
                                                        echo    "<tr>";
                                                        echo    "<th>" . $row['id'] . "</th>";
                                                        echo    "<th>" . $row['userName'] . "</th>";
                                                        echo    "<th>" . $row['position'] . "</th>";
                                                        echo    "<th>" . $row['language'] . "</th>";
                                                        echo    "<th>" . $row['experience'] . "</th>";
                                                        echo    "<th>" . $row['state'] . "</th>";
                                                        echo     "<th><a class=\"text-decoration-none text-white showCV\" value=\"" . $row['userId'] . "\"><button class=\"btn btn-success text-center\" style=\"\">Cv ứng viên</button></a></th>";
                                                        echo      "<form action=\"../CV_handle/updateCvFromAdmin.php\" method=\"post\">";
                                                        echo       "<th>";
                                                        echo            "<input type=\"text\" name=\"cvInterviewDate\" class=\"form-control bolder-set\" id=\"AvailableApply\"";
                                                        echo            "placeholder=\"dd/mm/yy\" value=" . $dateInterview . ">";
                                                        echo        "</th>";
                                                        echo        "<th>";
                                                        echo            "<textarea id=\"GhiChu\" name=\"cvBusinessNote\" rows=\"4\" cols=\"50\" placeholder=\"Các ghi chú của công ty\">" . $businessNote . "</textarea>";
                                                        echo        "</th>";
                                                        echo        "<th><a class=\"text-decoration-none text-white\"><button class=\"btn btn-primary text-center btn-success\" >Update</button></a></th>";
                                                        echo        "<div hidden=hidden><input name=\"cvId\" value=".$row['id']."></div>";
                                                        echo      "</form>";
                                                    } else if ($_GET['action'] == 'Interview') {
                                                        echo    "<tr>";
                                                        echo    "<th>" . $row['id'] . "</th>";
                                                        echo    "<th>" . $row['userName'] . "</th>";
                                                        echo    "<th>" . $row['position'] . "</th>";
                                                        echo    "<th>" . $row['language'] . "</th>";
                                                        echo    "<th>" . $row['experience'] . "</th>";
                                                        echo    "<th>" . $row['state'] . "</th>";
                                                        echo     "<th>" . $row['interviewDate'] . "</th>";
                                                        echo     "<th class=\"d-flex justify-content-center\"><a class=\"text-decoration-none text-white  showCV\" value=\"" . $row['userId'] . "\"><button class=\"btn btn-primary text-center\" style=\"background-color:#2C5D63;\">Cv ứng viên</button></a></th>";

                                                        echo    "</tr>";
                                                    }
                                                }
                                            }

                                            ?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>
            </div>

</body>
<script>
    $(document).ready(function() {
        let userId;
        let cvId;
        $(".showCV").click(function() {
            userId = $(this).attr("value");
            console.log(userId);
            $.post("../Profile_handle/showProfileToAdmin.php", {
                userId: userId
            }, function(result, status) {
                if (status == 'success') {
                    console.log("success");
                    window.open ('../Profile_handle/showProfileToAdmin.php') ;
                } else {
                    alert("Failed to OpenCV!");
                }

            });

        });
        $("#addJob").click(function() {
            window.open("../Job_handle/addJobForm.php");

        });
        $("#addBusiness").click(function() {
            window.open("../Business_handle/addBusinessForm.php");
        });

        $(".acceptCV").click(function() {
            cvId = $(this).attr("value");
            $.post("../CV_handle/updateCvFromAdmin.php", {
                cvId: cvId,
                cvState: "Yes",
            }, function(result, status) {
                if (result == 'Update successfully') {
                    console.log("Update successfully");
                    window.location.reload();
                } else {
                    alert("Failed to updateCV!");
                }

            });
        });
    });
</script>

</html>