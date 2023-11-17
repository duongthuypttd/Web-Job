<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
require_once('../connection.php');
require_once('../navigation.php');
$result;
$where;

if (!empty($_SESSION['Where']) && (empty($_POST['nameBusiness']) && empty($_POST['language']) && empty($_POST['area'])) && empty(($_GET['business_job']))) {
    $sql = "SELECT  * FROM jobs " . $_SESSION['Where'];
    $result = mysqli_query($conn, $sql);
} else if (isset($_GET['business_job'])) {
    $nameBs = $_GET['business_job'];
    // echo $_GET['business_job'];
    // echo 'ccccc';
   
    $sql = "SELECT  * FROM jobs WHERE name='$nameBs'";
    $result = mysqli_query($conn, $sql);
    // die(mysqli_num_rows($result));
    // exit();
} else {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if ($data == "Ngôn ngữ" || $data == "Khu vực làm việc") {
            return null;
        }
        return $data;
    }
    if (isset($_POST['nameBusiness']) && isset($_POST['language']) && isset($_POST['area'])) {
        $nameBusiness = validate($_POST['nameBusiness']);
        $language = validate($_POST['language']);
        $area = validate($_POST['area']);
    }


    if (empty($nameBusiness) && empty($language) && empty($area)) {
        header('Location: ../Home_handle/home.php');
        exit();
    } else {
        $where = "WHERE";
        $index = array();
        $query = array($nameBusiness, $language, $area);
        for ($x = 0; $x < 3; $x++) {
            if (!empty($query[$x])) {
                array_push($index, $x);
            }
        }
        // echo '<pre>'; print_r($index); echo '</pre>';
        foreach ($index as $inx) {
            if ($inx == 0) {
                $value = $query[$inx];
                $where .= " name='$value'" . " AND ";
            }
            if ($inx == 1) {
                $value = $query[$inx];
                $where .= " language='$value'" . " AND ";
            }
            if ($inx == 2) {
                $value = $query[$inx];
                $where .= " area='$value'" . " AND ";
            }
        }
        $where = rtrim($where, " AND ");
        // echo $where;
        $_SESSION['Where'] = $where;
        $sql = "SELECT  * FROM jobs " . $where . "ORDER BY 'id' DESC LIMIT 16";
        $result = mysqli_query($conn, $sql);
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
    <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
</head>
<style>
    .job:hover {
        cursor: pointer;
    }

    .bg {
        background-image: url('../images/bgCV.jpg');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script>
    $(document).ready(function() {
        let id;
        let saveJobId;
        $(".job").click(function() {
            id = $(this).attr("value");
            $.post("jobDetail.php", {
                currentId: id
            }, function(result, status) {
                if (status == 'success') {
                    document.location.href = 'http://localhost/Job_handle/jobDetail.php';
                } else {
                    alert("Failed to choose job!");
                }

            });

        });
        $(".save_job").click(function(){
            saveJobId = $(this).attr("value");
            // saveJob = json_decode(saveJob);
            console.log(saveJobId);
            $.post("saveLovingJob.php", {
                jobId: saveJobId,
            }, function(result, status) {
                if (status == 'success') {
                    if(result=="You have saved this job!"){
                        alert("You have saved this job!");
                    }else if(result=='Saving job successfully!'){
                        alert("Saving job successfully!");
                    }
                } else {
                    alert(" Can not save this job");
                }

            });
        })

    });
</script>

<body>
    <div class="bg">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 pt-3 pb-3">
                    <h4>Việc làm công ty!<?php  ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <div class="align-items-center">
                                <p class="m-0 btn btn-link pl-0" type="p" data-toggle="collapse" style="text-decoration: none; color: #212529; font-weight: 500; font-size: 20px;" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Danh mục
                                </p>
                                <div class="my-1 mx-3"><a href="../Profile_handle/profile.php   " class="text-decoration-none text-dark "><i class="fa-solid fa-user m-1"></i>Hồ sơ cá nhân</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php" class="text-decoration-none text-dark "><i class="fa-solid fa-briefcase m-1"></i>Việc làm chờ duyệt</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php?interview" class="text-decoration-none text-dark "><i class="fa-solid fa-briefcase m-1"></i>Việc làm chờ Phỏng vấn</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php?loveWork" class="text-decoration-none text-dark "><i class="fa-sharp fa-solid fa-bookmark m-1"></i>Việc làm đã lưu</a></div>
                                    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 " style="height:100vh">
                    <div class="row ">
                        <div class="card rounded">
                            <div class="card-body">
                                <?php
                                if (mysqli_num_rows($result) >= 1) {
                                    while ($row = $result->fetch_array()) {
                                        echo "<div class=\"col-md-12 mb-3 \"  value=\"" . $row['id'] . "\">";
                                        echo "<div class=\"card flex-md-row box-shadow h-md-100 border border-light border-4 \">";
                                        echo    "<img class=\"card-img-right flex-auto d-none d-md-block job\" style=\"width: 110px; height: 110px;\"";
                                        echo        "src=\"" . $row['img'] . "\">";
                                        echo    "<div class=\"card-body align-items-start pt-2 pb-1\">";
                                        echo        "<h5 class=\"mb-0 job\">";
                                        echo            "<a class=\"text-dark\" href=\"#\" style=\"text-decoration: none;\">" . $row['position'] . "</a>";
                                        echo            "<div class=\"btn btn-sm btn-outline pl-0 pr-4 text-muted float-right\"";
                                        echo                "style=\"font-weight: 500;\">";
                                        echo                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"";
                                        echo                    "fill=\"currentColor\" class=\"bi bi-suit-heart\" viewBox=\"0 0 16 16\">";
                                        echo                    "<path";
                                        echo                        "d=\"m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z\" />";
                                        echo                "</svg>";
                                        echo            "</div>";
                                        echo        "</h5>";
                                        echo        "<div class=\"mb-0 mt-2 text-muted d-flex justify-content-between\">";
                                        echo            "<span>" . $row['name'] . "</span>";
                                        echo            "<span class=\"float-right\">" . "Area: " . $row['area'] . "</span>";
                                        echo        "</div>";
                                        echo        "<div class=\"mb-0 mt-2 text-muted d-flex justify-content-between\">";
                                        echo            "<span>" . $row['language'] . "</span>";
                                        echo            "<span class=\"float-right save_job\" value=".$row['id']."> <button class=\"btn btn-secondary \" > Save work </button></span>";
                                        echo        "</div>";
                                        echo        "<div class=\"btn-group\">";
                                        echo            "<a type=\"button\" class=\"btn btn-sm btn-outline pl-0 pr-4\" style=\"color: orangered;\">";
                                        echo                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"";
                                        echo                    "fill=\"currentColor\" class=\"bi bi-credit-card\" viewBox=\"0 0 16 16\">";
                                        echo                    "<path";
                                        echo                        "d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z\" />";
                                        echo                    "<path";
                                        echo                        "d=\"M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z\" />";
                                        echo                "</svg>";
                                        echo                "Salary " . $row['salary'];
                                        echo            "</a>";
                                        echo            "<a type=\"button\" class=\"btn btn-sm btn-outline pl-0 pr-4\">";
                                        echo                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-wallet2\" viewBox=\"0 0 16 16\">";
                                        echo                    "<path";
                                        echo                        "d=\"M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z\" />";
                                        echo                "</svg>";
                                        echo                "Experience: " . $row['experience'];
                                        echo            "</a>";
                                        echo            "<a type=\"button\" class=\"btn btn-sm btn-outline pl-0 pr-4 text-success\">";
                                        echo                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"";
                                        echo                    "fill=\"currentColor\" class=\"bi bi-wallet2\" viewBox=\"0 0 16 16\">";
                                        echo                    "<path";
                                        echo                        "d=\"M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z\" />";
                                        echo                "</svg>";
                                        echo                "Available: " . $row['availableApply'];
                                        echo            "</a>";
                                        echo        "</div>";
                                        echo    "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }

                                ?>
                            </div>

                        </div>
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