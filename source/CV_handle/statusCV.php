<?php
session_start();
require_once("../navigation.php");
require_once("../connection.php");
if ($_SESSION['user_name'] != "admin") {

    $row;
    $currenId = $_SESSION['user_id'];
    if (isset($_GET['interview'])) {
        $sql = "SELECT  * FROM apply_job WHERE userId='$currenId' AND interviewDate!='' ORDER BY id DESC";
    } else if (isset($_GET['loveWork'])) {
        $sql = "SELECT  * FROM love_jobs WHERE user_id='$currenId' ORDER BY id DESC";
    } else {
        $sql = "SELECT  * FROM apply_job WHERE userId='$currenId' ORDER BY id DESC";
    }

    $result = mysqli_query($conn, $sql);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>JOB SEARCH - Công việc đã nộp CV</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
    </head>
    <style>
        .bg {
            background-image: url('../asset/bgCV.png');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* #Note {
            
        } */
    </style>

    <body>
        <div class="bg">
            <h3 class="text-center p-4"><b>DANH SÁCH CÁC CÔNG VIỆC ĐÃ NỘP CV</b></h1>

                <div class="container">
                    <div class="row">
                        <!-- Bên trái -->
                        <form class="col-md-9 col-sm-12 overflow-auto" style="height: 750px;">
                            <div class="card ">
                                <div class="card-body m-3">
                                    <!-- Thẻ công việc được lưu-->
                                    <?php if (mysqli_num_rows($result) >= 1 && isset($_GET['loveWork'])) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<div class=\"border border-5 border-light m-3 rounded bg-white\">";
                                            echo "<div class=\"d-flex  m-3\">";
                                            echo "<!-- Hình -->";
                                            echo "<div>";
                                            echo    "<img src=\"" . $row['img'] . "\" class=\"card-img-top m-3\" style=\" width:150px; height: 100px;\" alt=\"Logo FPT\">";
                                            echo "</div>";

                                            echo "<div>";
                                            echo    "<!-- Tittle -->";
                                            echo    "<a href=\"#\" class=\"text-decoration-none text-dark\">";
                                            echo       "<div>";
                                            echo            "<h5>" . $row['position'] . "</h5>";
                                            echo       "</div>";
                                            echo        "<!-- Công ty -->";
                                            echo        "<div>" . $row['name'] . "</div>";
                                            echo        "<!-- Language -->";
                                            echo       "<div>Python</div>";
                                            echo        "<!-- Salary - Experience - AvailabaleApply -->";
                                            echo        "<div class=\"d-flex\">";
                                            echo            "<p class=\"my-1 me-2\" style=\"color: red;\">Salary: 400$</p>";
                                            echo            "<p class=\"m-1\">Experience: " . $row['experience'] . "</p>";
                                            echo            "<p class=\"m-1\" style=\"color: green;\">Available: " . $row['available'] . "</p>";
                                            echo        "</div>";
                                            echo    "</a>";
                                            echo "</div>";
                                            echo "<!-- Button -->";
                                            echo "<div class=\"text-end ms-auto p-2 bd-highlight\">";
                                            echo    "<div>";
                                            echo        "<button style=\"background-color: white; border: red; width: 28px; height: 28px;\" class='deleteLoveJob' value=" . $row['id'] . "><i class=\"fa-solid fa-xmark text-black\"></i></button>";
                                            echo    "</div>";
                                            echo    "<div class=\"my-4\">";
                                            echo        "Area: " . $row['area'] . "";
                                            echo    "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    } ?>



                                    <?php
                                    if (mysqli_num_rows($result) >= 1 && !isset($_GET['loveWork'])) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<!-- Thẻ công việc chờ duyệt-->";
                                            echo "<div class=\"border border-5 border-light m-3 rounded bg-white\">";
                                            echo    "<div class=\"d-flex  m-3\">";
                                            echo        "<div>";
                                            echo           "<img src=\"" . $row['img'] . "\" class=\"card-img-top m-3\" style=\" width:150px; height: 100px;\" alt=\"Logo FPT\">";
                                            echo      "</div>";
                                            echo      "<div>";
                                            echo          "<!-- Tittle -->";
                                            echo        "<a href=\"#\" class=\"text-decoration-none text-dark\">";
                                            echo            "<div>" . $row['position'] . "</div>";
                                            echo            "<!-- Location -->";
                                            echo            "<div>" . $row['name'] . " | <i class=\"fa fa-map-marker me-2\" aria-hidden=\"true\"></i>" . $row['area'] . "</div>";
                                            echo            "<!-- Language -->";
                                            echo            "<div><i class=\"fa fa-code\" aria-hidden=\"true\"></i>" . $row['language'] . "</div>";
                                            echo        "</a>";
                                            echo    "</div>";
                                            echo    "<!-- Button -->";
                                            if (!isset($_GET['interview'])) {
                                                echo    "<div class=\"d-flex align-items-center ms-auto p-2 bd-highlight\">";
                                                if ($row['state'] == 'Waiting') {
                                                    echo  "<div style=\"color: gray;font-size: 20px;\">. . . Đang chờ duyệt</div>";
                                                } else if ($row['state'] == 'Yes') {
                                                    echo "<div style=\"color: green;font-size: 20px;\"><i class=\"m-1 fa-solid fa-square-check\"></i>Đã được duyệt</div>";
                                                } else {
                                                    echo "<div style=\"color: red;font-size: 20px;\"><i class=\"fa-solid fa-square-xmark m-1\"></i>Không được duyệt</div>";
                                                }
                                                echo    "</div>";
                                            } else {
                                                echo "<div class=\"ms-auto p-2 bd-highlight text-end\">";
                                                echo    "<div class=\"d-flex align-items-center \">";
                                                echo        "<div style=\"color: blue;font-size: 20px;\">" . "Interview at " . $row['interviewDate'] . "</div>";
                                                echo    "</div>";

                                                //   <!-- Note button -->
                                                echo      "<div class=\"btn-group  my-3\">";
                                                echo       "<button type=\"button\" class=\"btn btn-primary \" onclick=\"Click_Note(" . $row['id'] . ")\">";
                                                echo                 "<b>Ghi chú của công ty</b>";
                                                echo             "</button>";
                                                echo      "</div>";

                                                echo  "</div>";
                                            }

                                            echo "</div>";
                                            echo    "<div class=\"m-2\">";
                                            echo      "<div id=\"Note" . $row['id'] . "\" style=\"width: 100%;
                                                                                            height: auto;
                                                                                            background-color: #F8EDE3;
                                                                                            margin-top: 20px;
                                                                                            border-radius: 5px;
                                                                                            padding: 10px;
                                                                                            display: none\" >" . $row['businessNote'] . "</div>";
                                            echo    "</div>";
                                            echo "</div>";
                                        }
                                    }
                                    ?>




                                </div>
                            </div>
                        </form>

                        <!-- Bên phải -->
                        <div class="col-md-3 col-sm-12">

                            <!-- Danh mục -->
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>DANH MỤC</h5>
                                </div>
                                <div class="card-body">
                                    <div class="my-1 mx-3"><a href="../Profile_handle/profile.php   " class="text-decoration-none text-dark "><i class="fa-solid fa-user m-1"></i>Hồ sơ cá nhân</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php" class="text-decoration-none text-dark "><i class="fa-solid fa-briefcase m-1"></i>Việc làm chờ duyệt</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php?interview" class="text-decoration-none text-dark "><i class="fa-solid fa-briefcase m-1"></i>Việc làm chờ Phỏng vấn</a></div>
                                    <div class="my-1 mx-3"><a href="../CV_handle/statusCV.php?loveWork" class="text-decoration-none text-dark "><i class="fa-solid fa-briefcase m-1"></i>Việc làm yêu thích</a></div>

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
    <script>
        function Click_Note(id) {
            var note = document.getElementById("Note" + id);
            console.log("Note" + id);
            if (note.style.display === "none") {
                note.style.display = "block";
            } else {
                note.style.display = "none";
            }
        }
        $(document).ready(function() {
            let id;
            $(".deleteLoveJob").click(function() {
                id = $(this).attr("value");
                $.post("../Job_handle/deleteLovingJob.php", {
                    idLovingJob: id,
                }, function(result, status) {
                    if (status == 'success' && result=="Delete loving job successfully!") {
                        window.location.reload();
                    }else{
                        alert(result);
                    }
                });

            });
        });
    </script>

    </html>

<?php
} else {
    header('Location: ../Admin_handle/adminHome.php');
}
?>