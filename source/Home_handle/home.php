<?php
session_start();
require_once("../navigation.php");
require_once('../connection.php');
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
    if ($_SESSION['user_name'] != 'admin') {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>HomePages</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
        </head>
        <style>
            .bg-CV {
                background-image: url(../images/bgCV.jpg);
                height: 420px;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .bg {
                background-image: url('../images/bgCV.jpg');
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>

        <body>
            <div class="container-fluid bg-CV ">
                <div class="text-white d-flex text-center align-items-center justify-content-center p-5">
                    <div class=" my-2 my-lg-0 text-center" style="padding-top: 100px;">
                        <h1>1000 + IT Jobs For Developers</h1>
                        <p style="font-size: 20px;">Java - Python - C# - Frontend - Backend - Javascript - Business Analyst - Designer - Tester</p>
                    </div>
                </div>
                <!-- Bảng tìm kiếm -->
                <div class="container">
                    <form class="text-white row g-3" action="../Job_handle/job.php" method="post">
                        <!-- Tìm kiếm theo công ty -->
                        <div class="col-md-4">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" style="background-color: #495579;" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="nameBusiness" class="form-control" placeholder="Nhập công ty cần tìm" style="height:50px;" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>


                        <!-- Tìm kiếm theo ngôn ngữ -->
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" style="background-color: #495579;" for="inputGroupSelect01"><i class="fa fa-code" aria-hidden="true"></i></label>
                                <select class="form-select" id="inputGroupSelect01" style="height:50px;" name="language">
                                    <option selected>Ngôn ngữ</option>
                                    <option value="Java">Java</option>
                                    <option value="Python">Python</option>
                                    <option value="JavaScript">JavaScript</option>
                                    <option value=".NET">.NET</option>
                                    <option value="Tester">Tester</option>
                                    <option value="Ruby">Ruby</option>
                                    <option value="Business Analyst">Business Analyst</option>
                                    <option value="PHP">PHP</option>
                                </select>
                            </div>
                        </div>


                        <!-- Tìm kiếm theo khu vực -->
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" style="background-color: #495579;" for="inputGroupSelect01"><i class="fa fa-map-marker sfa" aria-hidden="true"></i></label>
                                <select class="form-select" id="inputGroupSelect01" style="height:50px;" name="area">
                                    <option selected>Khu vực làm việc</option>
                                    <option value="Quận 1">Quận 1</option>
                                    <option value="Quận 2">Quận 2</option>
                                    <option value="Quận 3">Quận 3</option>
                                    <option value="Quận 4">Quận 4</option>
                                    <option value="Quận 5">Quận 5</option>
                                    <option value="Quận 6">Quận 6</option>
                                    <option value="Quận 7">Quận 7</option>
                                    <option value="Quận 8">Quận 8</option>
                                    <option value="Quận 9">Quận 9</option>
                                    <option value="Quận 10">Quận 10</option>
                                    <option value="Quận 11">Quận 11</option>
                                    <option value="Quận 12">Quận 12</option>
                                    <option value="Quận Tân Phú">Tân Phú</option>
                                    <option value="Quận Tân Bình">Tân Bình</option>
                                    <option value="Quận Thủ Đức">Thủ Đức</option>
                                    <option value="Quận Bình Tân">Bình Tân</option>
                                    <option value="Quận Gò Vấp">Gò Vấp</option>
                                    <option value="Quận Bình Thạnh">Bình Thạnh</option>
                                    <option value="Quận Phú Nhuận">Phú Nhuận</option>
                                </select>
                            </div>
                        </div>
                     <div class="col-md-2">
                            <div class="col-12 ">
                                <button type="submit" class="btn text-white" style="background-color: #495579; height:50px; width: 100px;">Search</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <div class="bg py-5">

                <!-- Các công ty hàng đầu -->
                <div id="section2">
                    <h3 class="text-center mb-4" style="color: pink;">NHÀ TUYỂN DỤNG HÀNG ĐẦU</h1>
                        <div class="container ">
                            <div class="row">
                                <?php require_once('../Business_handle/listBusiness.php') ?>
                            </div>
                        </div>
                </div>

                <!-- Các công việc hấp dẫn -->
                <div id="section1">
                    <h3 class="text-center m-5 " style="color: pink;">CÁC CÔNG VIỆC HẤP DẪN</h1>
                        <div class="container">
                            <div class="row rounded">
                                <!-- Bên trái -->
                                <form class="col-md-8 col-sm-12 overflow-auto rounded" style="height: 750px;">
                                    <div class="card rounded">
                                        <div class="card-body m-3">
                                            <!-- Thẻ công việc -->
                                            <?php require_once('../Job_handle/interestJob.php') ?>

                                        </div>
                                    </div>
                                </form>
                                <!-- Bên phải -->
                                <div class="col-md-4 col-sm-12">
                                    <img src="../images/laptrinhvien.jpg" width="100%" height="100%" alt="banner-job" class="rounded">
                                </div>

                            </div>

                        </div>
                </div>

                <div class="container" id="section3">
                <!-- Blog IT -->
                    <div class="row ">
                        <div class="col-sm-4  " style="height: 480px;">
                            <div class="card rounded">
                                <a href="#" class="text-decoration-none text-dark">
                                    <img src="../images/blog-1.jpg" alt="Blog-1" width="100%" height="300px" class=" rounded">
                                    <div class="card-body">
                                        <small>QUYỀN LỢI NGƯỜI XIN VIỆC</small>
                                        <h5 class="card-title">Những điều cần chú ý khi đi xin việc làm và việc huẩn bị nó quan trọng như thế nào</h5>
                                        <p class="card-text">Một công ty muốn tuyển nhân sự chắc chắn sẽ phụ thuộc vào nhiều yếu tố. Giữa nhiều người đến ...</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-4" style="height: 480px;">
                            <div class="card rounded">
                                <a href="#" class="text-decoration-none text-dark">
                                    <img src="../images/CV.jpg" alt="Blog-1" width="100%" height="300px" class=" rounded">
                                    <div class="card-body">
                                        <small>TẠO CV</small>
                                        <h5 class="card-title">Làm thế nào để viết một bản CV hoàn chỉnh</h5>
                                        <p class="card-text">Người ta cho rằng bản CV đầu tiên được viết bởi Leonardo Da Vinci cách đây 500 năm. Cho đến nay, mọi thứ đã có một chút thay đổi.
                                            Một...</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-4" style="height: 480px;">
                            <div class="card">
                                <a href="#" class="text-decoration-none text-dark">
                                    <img src="../images/trangphuc.jpg" alt="Blog-1" width="100%" height="300px" class="rounded">
                                    <div class="card-body">
                                        <small>TRANG PHỤC KHI ĐI XIN VIỆC</small>
                                        <h5 class="card-title">Gợi ý các trang phục đi phỏng vấn xin việc chuẩn không cần chỉnh</h5>
                                        <p class="card-text">Bên cạnh việc lo lắng cách trả lời các câu hỏi phỏng vấn xin việc thì lựa chọn trang phục khi đi phỏng vấn cũng là mối quan tâm
                                            hàng đầu của các ứng viên...</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <?php
            require_once("../footer.php");
            ?>
        </body>

        </html>


<?php
    }else if ($_SESSION['user_name'] == 'admin') {
        header("Location: ../Admin_handle/adminHome.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>