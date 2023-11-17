<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JOB SEARCH - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
</head>
<style>
    .bg {
        background-image: url('../images/bgCV.png');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .hi{
        background-color: springgreen;
    }
    .hi:hover{
        background-color:blue;
    }
    .dx{
        background-color: blue;
    }
    .dx:hover{
        background-color:red;
    }
</style>

<body>
    <!-- Bên trái -->
    <div class="col-md-2 col-sm-2">

    <!-- Danh mục -->
    <div class="card bg">
        <div class="card-header"><a href="../Admin_handle/adminHome.php" class="text-decoration-none text-dark d-flex justify-content-center ">
            <i class="fa-solid fa-house m-1"></i>
            <h5>Trang chủ</h5></a>
        </div>

        <div class="card-body">
            <div class="hi my-1 mx-3 card ps-2 pt-2" style="height: 40px;"><a href="#" class="text-decoration-none text-dark " id="addJob">
                <i class="fa-solid fa-suitcase m-1"></i>
                Thêm job</a>
            </div>
            <div class="hi my-1 mx-3 card ps-2 pt-2" style="height: 40px;"><a href="#" class="text-decoration-none text-dark " id="addBusiness">
                <i class="fa-solid fa-building m-1"></i>
                Thêm công ty</a>
            </div>
            <div class="hi my-1 mx-3 card ps-2 pt-2" style="height: auto;"><a href="../Admin_handle/adminHome.php?action=Waiting" class="text-decoration-none text-dark "><i class="fa-solid fa-clock m-1"></i>Danh sách chờ duyệt</a></div>
            <div class="hi my-1 mx-3 card ps-2 pt-2" style="height: auto;"><a href="../Admin_handle/adminHome.php?action=Yes" class="text-decoration-none text-dark"><i class="fa-solid fa-check-to-slot "></i></i> Danh sách đã duyệt</a></div>
            <div class="hi my-1 mx-3 card ps-2 pt-2" style="height: auto;"><a href="../Admin_handle/adminHome.php?action=Interview" class="text-decoration-none text-dark"><i class="fa-solid fa-clipboard-question m-1"></i></i>Chờ phỏng vấn</a></div>
            <hr>
            <div class="dx my-1 mx-3 card ps-2 pt-2" style="height: auto; color:white;"><a href="../Login_out/logout.php" class="text-decoration-none text-white "><i class="fa-solid fa-right-from-bracket m-1"></i><b>Đăng xuất</b></a></div>
        </div>
    </div>    


    </div>
    </body>

</html>