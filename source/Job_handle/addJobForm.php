<?php
session_start();
require_once("../navigation_admin.php");
if ($_SESSION['user_name'] != 'admin') {
    header('Location: ../Home_handle/home.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm công việc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<style>
    .bolder-set {
        border: 1px solid;
    }

    .bg {
        background-image: url('../images/bgCV.png');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="container-fluid p-4 bg">
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-7">
                <form action="../Job_handle/addJob.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="detail-intro-tittle mb-3"> Thông Tin Công Việc </h3>
                        </div>

                        <div class="card-body">

                            <div>


                                <div class="form-group">
                                    <div class="text-danger"><?php if (isset($_GET['error'])) {
                                                                    echo $_GET['error'];
                                                                } ?></div>
                                    <div class="text-success"><?php if (isset($_GET['state'])) {
                                                                    echo $_GET['state'];
                                                                } ?></div>
                                    <label class="col-sm-2 control-label col-form-label lbl-required" for="jobname"><b>Tên công ty</b></label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" id="jobname" name="jobname" type="text" value="<?php if (isset($_SESSION['jobname'])) {
                                                                                                                        echo $_SESSION['jobname'];
                                                                                                                    } ?>">
                                        <span class="field-validation-valid" data-valmsg-for="jobname" data-valmsg-replace="true"></span>
                                    </div>
                                </div>

                                <label class="col-sm-2 control-label col-form-label lbl-required my-3" for="Logo"><b>Logo công ty</b></label>
                                <input type="file" id="Logo" name="logo">
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-form-label lbl-required" for="area"><b>Khu vực</b></label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" id="area" name="area" type="text" value="<?php if (isset($_SESSION['area'])) {
                                                                                                                echo $_SESSION['area'];
                                                                                                            } ?>">
                                    <span class="field-validation-valid" data-valmsg-for="area" data-valmsg-replace="true"></span>
                                </div>
                            </div>


                            <label class="col-sm-2 control-label col-form-label 1b1-required" for="language"><b>Chọn ngôn ngữ</b></label>
                            <select class="form-control select2 select2-hidden-accessible" id="language" tabindex="-1" aria-hidden="true" name="language">
                                <option <?php if (empty($_SESSION['language'])) {
                                            echo "selected";
                                        } ?>value='0'>Chọn ngôn ngữ</option>
                                <option <?php if ($_SESSION['language'] == 'Java') {
                                            echo "selected";
                                        } ?> value="Java">Java</option>
                                <option <?php if ($_SESSION['language'] == 'Python') {
                                            echo "selected";
                                        } ?>value="Python">Python</option>
                                <option <?php if ($_SESSION['language'] == 'JavaScript') {
                                            echo "selected";
                                        } ?>value="JavaScript">JavaScript</option>
                                <option <?php if ($_SESSION['language'] == '.NET') {
                                            echo "selected";
                                        } ?>value=".NET">.NET</option>
                                <option <?php if ($_SESSION['language'] == 'Tester') {
                                            echo "selected";
                                        } ?>value="Tester">Tester</option>
                                <option <?php if ($_SESSION['language'] == 'Ruby') {
                                            echo "selected";
                                        } ?>value="Ruby">Ruby</option>
                                <option <?php if ($_SESSION['language'] == 'Business Analyst') {
                                            echo "selected";
                                        } ?>value="Business Analyst">Business Analyst</option>
                                <option <?php if ($_SESSION['language'] == 'PHP') {
                                            echo "selected";
                                        } ?>value="PHP">PHP</option>
                            </select>



                            <label class="col-sm-2 control-label col-form-label 1b1-required" for="experience"><b>Số năm kinh nghiệm</b></label>
                            <select class="form-control select2 select2-hidden-accessible" id="experience" tabindex="-1" aria-hidden="true" name="experience">
                                <option <?php if (empty($_SESSION['experience'])) {
                                            echo "selected";
                                        } ?> value='0'> Chọn năm kinh nghiệm </option>
                                <option <?php if ($_SESSION['experience'] == 'Dưới 6 tháng') {
                                            echo "selected";
                                        } ?> value="Dưới 6 tháng">Dưới 6 tháng</option>
                                <option <?php if ($_SESSION['experience'] == '1 - 2 năm') {
                                            echo "selected";
                                        } ?> value="1 - 2 năm">1 - 2 năm</option>
                                <option <?php if ($_SESSION['experience'] == '2 - 3 năm') {
                                            echo "selected";
                                        } ?> value="2 - 3 năm">2 - 3 năm</option>
                                <option <?php if ($_SESSION['experience'] == 'Trên 3 năm') {
                                            echo "selected";
                                        } ?> value="Trên 3 năm">Trên 3 năm</option>
                            </select>

                            <div class="row justify-content-around m-3">
                                <div class="col-4">
                                    <h5 lass="detail-intro-tittle mb-3" for="salary">Lương</h5>
                                    <input class="form-control" id="salary" name="salary" type="text">
                                    <span class="field-validation-valid" data-valmsg-for="salary " data-valmsg-replace="true"></span>

                                </div>
                                <div class="col-4">
                                    <h5 lass="detail-intro-tittle mb-3" for="position">Vị trí</h5>
                                    <input class="form-control" id="position" name="position" type="text">
                                    <span class="field-validation-valid" data-valmsg-for="position " data-valmsg-replace="true"></span>

                                </div>
                            </div>

                            <div class="pl-1">
                                <label class="col-sm-2 control-label col-form-label lbl-required" for="description"><b>Mô tả</b></label>
                                <textarea class="form-control" id="description" name="description" type="text" rows="3" value></textarea>
                                <span class="field-validation-valid" data-valmsg-for="description " data-valmsg-replace="true"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label col-form-label lbl-required" for="address"><b>Địa chỉ</b></label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Address" aria-label="default input-example" id="address" name="address" type="text" value>
                                    <span class="field-validation-valid" data-valmsg-for="address " data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <label class="col-sm-2 control-label col-form-label 1b1-required" for="worktime"><b>Thời gian làm việc</b></label>
                            <select class="form-control select2 select2-hidden-accessible" id="worktime" tabindex="-1" aria-hidden="true" name="worktime">
                                <option> Thời gian làm </option>
                                <option value="Part-time"> Việc làm part-time</option>
                                <option value="Full-time"> Việc làm full-time</option>
                            </select>


                            <div class="form-group my-1">
                                <label class=" control-label col-form-label lbl-required" for="availableApply"><b>Thời gian nhận hồ sơ</b></label>

                                <input class="form-control" placeholder="Thời gian nhận hồ sơ" aria-label="default input-example" id="availableApply" name="availableApply" type="text">
                                <span class="field-validation-valid" data-valmsg-for="availableApply" data-valmsg-replace="true"></span>

                            </div>


                            <div class="input-group my-3">
                                <span class="input-group-text" data-valmsg-for="benefit " data-valmsg-replace="true">Quyền lợi khi tham gia làm việc</span>
                                <textarea class="form-control" aria-label="default input-example" rows="4" id="benefit" name="benefit" type="text" value></textarea>
                            </div>



                            <div class="text-end m-3">
                                <button type="submit" class="btn btn-primary" style="background-color:#2C5D63;">Thêm công việc</button>
                            </div>




                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>
</body>

</html>