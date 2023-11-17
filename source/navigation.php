<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
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
</head>
<style>
  html {
    scroll-behavior: smooth;
  }

  #section1 {}

  #section2 {}

  #section3 {}
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container ">

      <a class="navbar-brand text-black" style="font-size: 40px; color: dodgerblue;" href="../Home_handle/home.php"><img alt="logo" src="../images/computer.jpg" width="80px"><b>  IT JOB</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item mx-3">

            <a class="nav-link active" aria-current="page" href="<?php if ($curPageName == "home.php") {
                                                                    echo "#section1";
                                                                  } else if ($_SESSION['user_name'] != 'admin') {
                                                                    echo "../Home_handle/home.php#section1";
                                                                  } else {
                                                                    echo "#";
                                                                  }
                                                                  ?>"><b>Cơ hội việc làm</b></a>
          </li>

          <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="<?php if ($curPageName == "home.php") {
                                                                    echo "#section2";
                                                                  } else if ($_SESSION['user_name'] != 'admin') {
                                                                    echo "../Home_handle/home.php#section2";
                                                                  } else {
                                                                    echo "#";
                                                                  }
                                                                  ?>"><b>Công ty tuyển dụng</b></a>

          </li>

          <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="<?php if ($curPageName == "home.php") {
                                                                    echo "#section3";
                                                                  } else if ($_SESSION['user_name'] != 'admin') {
                                                                    echo "../Home_handle/home.php#section3";
                                                                  } else {
                                                                    echo "#";
                                                                  }
                                                                  ?>"><b>Blog IT</b></a>
          </li>
        </ul>


      </div>
      <form class="d-flex">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <div class="gravatar-wrapper-32 mx-2">
            <a href="../Profile_handle/profile.php"><img src="../images/avatar.jpg" alt="Avatar" width="50px" class="rounded-circle" style="vertical-align:bottom;"></a>
          </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-black" style="font-size: 20px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (!empty($_SESSION['user_name'])) {
                echo $_SESSION['user_name'];
              } else {
                echo 'Account';
              } ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <?php
              if ($_SESSION['user_name'] != 'admin') {
                echo "<li><a class=\"dropdown-item\" href=\"../Profile_handle/profile.php\">Hồ sơ cá nhân</a></li>";
                echo "<li><a class=\"dropdown-item\" href=\"../CV_handle/statusCV.php\">Việc làm chờ duyệt</a></li>";
                echo "<li><a class=\"dropdown-item\" href=\"../CV_handle/statusCV.php?loveWork\">Việc đã lưu</a></li>";
              }
              ?>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../Login_out/logout.php">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      </form>
    </div>
  </nav>
</body>
</html>