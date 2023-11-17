<?php
session_start();
require_once "../navigation.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JOB SEARCH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
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

    <div class="bg py-5">
        <div class="container">
            <div class="card border border border-dark rounded  ">
                <div class="card-body m-3">
                    <form class="row g-3 " method="post" action="createCV.php">
                        <h1 class="text-center">CURRICULUM VITAE</h1>
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control bolder-set" id="inputName" placeholder="Nguyễn Văn A" value="<?php if (isset($_SESSION['name'])) {
                                                                                                                                                echo $_SESSION['name'];
                                                                                                                                            } ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputBirthday" class="form-label">Năm sinh</label>
                            <input type="text" name="birthday" class="form-control bolder-set" id="inputBirthday" placeholder="dd/mm/yy" value="<?php if (isset($_SESSION['birthday'])) {
                                                                                                                                                    echo $_SESSION['birthday'];
                                                                                                                                                } ?>">
                        </div>
                        <div class="col-md-2">
                            <label for="inputGender" class="form-label">Giới tính</label>
                            <input type="text" name="gender" class="form-control bolder-set" id="inputGender" placeholder="Nam/Nữ" value="<?php if (isset($_SESSION['gender'])) {
                                                                                                                                                echo $_SESSION['gender'];
                                                                                                                                            } ?>">
                        </div>
                        <div class="col-md-5">
                            <label for="inputPhoneNumber" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control bolder-set" id="inputPhoneNumber" value="<?php if (isset($_SESSION['phone'])) {
                                                                                                                                echo $_SESSION['phone'];
                                                                                                                            } ?>">
                        </div>
                        <div class="col-md-5">
                            <label for="inputID" class="form-label">Số căn cức công dân</label>
                            <input type="text" name="cccd" class="form-control bolder-set" id="inputID" value="<?php if (isset($_SESSION['cccd'])) {
                                                                                                                    echo $_SESSION['cccd'];
                                                                                                                } ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control bolder-set" id="inputEmail" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                    } ?>">
                        </div>

                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control bolder-set" id="inputAddress" placeholder="1234 Main St" value="<?php if (isset($_SESSION['address'])) {
                                                                                                                                                        echo $_SESSION['address'];
                                                                                                                                                    } ?>">
                        </div>

                        <div class="col-12">
                            <label for="inputStudy" class="form-label">Học vấn</label><br>
                            <textarea id="inputStudy" name="study" rows="5" style="width: 100%;" maxlength="200"><?php if (isset($_SESSION['study'])) {
                                                                                                                        echo $_SESSION['address'];
                                                                                                                    } ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="experience" class="form-label">Kinh nghiệm làm việc</label><br>
                            <textarea id="experience" name="experience" rows="5" style="width: 100%;" maxlength="200"><?php if (isset($_SESSION['experience'])) {
                                                                                                                            echo $_SESSION['experience'];
                                                                                                                        } ?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="certification" class="form-label">Chứng chỉ</label><br>
                            <textarea id="certification" name="certification" rows="5" style="width: 100%;" maxlength="200"><?php if (isset($_SESSION['certificate'])) {
                                                                                                                                echo $_SESSION['certificate'];
                                                                                                                            } ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="award" class="form-label">Giải thưởng</label><br>
                            <textarea id="award" name="award" rows="5" style="width: 100%;" maxlength="200"><?php if (isset($_SESSION['award'])) {
                                                                                                                echo $_SESSION['award'];
                                                                                                            } ?></textarea>
                        </div>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="text-danger"> <?php echo $_GET['error']; ?> </p>
                        <?php } ?>
                        <div class="col-12 text-end ">
                            <button type="submit" class="btn btn-success text-white">Submit your CV</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    require_once "../footer.php";
    ?>

</body>

</html>