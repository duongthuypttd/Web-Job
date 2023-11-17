<?php
session_start();
$result;
require_once('../navigation.php');
require_once("../connection.php");
if (isset($_GET['businessDetail'])) {
    $bussinesDetail = $_GET['businessDetail'];
    $sql = "SELECT * FROM business WHERE name = '$bussinesDetail' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin công ty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<style>
    .bg {
        background-image: url('../asset/bgCV.png');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="bg">
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="col-lg-8 col-md-7 ">
                    <div class="detail-job border rounded p-4 bg-white m-4">
                        <div class="intro-company">
                            <div class="intro-company overflow-hidden d-flex bd-highlight ">
                                <div class="flex-fill bd-highlight text-center">
                                    <img src="<?php echo $row['img']; ?>" width="200px" alt="logo-fpt">
                                </div>
                                <div class="mx-3 flex-fill bd-highlight text-center">
                                    <h1 class="detail-intro-tittle mb-3" style="color:rgb(19, 70, 52)"> <?php if (mysqli_num_rows($result) === 1) {
                                                                                                            echo $row['name'];
                                                                                                        }else{echo "No information group";} ?> Group</h1>
                                    <p class="lead" style="color:rgb(19, 70, 52)">
                                    <h1>THÔNG TIN CHUNG</h1>
                                    </p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul style=" list-style-type: none">
                                <?php
                                $count = 0;
                                if (mysqli_num_rows($result) === 1) {
                                    echo "<li class = \"active\">Tên Công Ty : " . $row['name'] . "</li>";
                                    echo "<li class = \"active\">Hot Line: " . $row['hotline'] . "</li>";
                                    echo "<li class = \"active\">Customer Gmail : " . $row['customer_mail'] . "</li>";
                                    echo "<li class = \"active\">Official Website : " . $row['official_website'] . "</li>";
                                    echo "<li class = \"active\">Official Facebook : " . $row['official_facebook'] . "</li>";
                                }
                                ?>

                            </ul>

                            <hr>
                            <div class="row justify-content-around">
                                <div class="col-4 " style="width: 45%;">
                                    <h5 class="text-center detail-intro-tittle m-0" style="color:rgb(19, 70, 52)">Quá trình hình thành và phát triển</h5>
                                    <p class="text-muted mb-0" style="white-space: pre-line;">
                                        <?php
                                        if (!empty($row['progress'])) {
                                            $array1 = explode("-", $row['progress']);
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
                                </div>

                                <div class="col-4" style="width: 45%;">
                                    <h5 class="text-center detail-intro-tittle m-0" style="color:rgb(19, 70, 52)">Phạm vi hoạt động</h5>
                                    <p class="text-muted mb-0" style="white-space: pre-line;">
                                        <?php
                                        if (!empty($row['head_offices'])) {
                                            $array1 = explode("-", $row['head_offices']);
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