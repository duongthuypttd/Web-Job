<?php
session_start();
require_once("../navigation_admin.php");
if ($_SESSION['user_name']!='admin') {
  header('Location: ../Home_handle/home.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Thêm công ty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<style>
  .bolder-set {
    border: 1px solid;
  }

  .bg {
    background-image: url('../img/bgCV.png');
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
          <form class="row g-3 " action="../Business_handle/addBusiness.php" method="post" enctype="multipart/form-data">
            <h1 class="text-center">THÔNG TIN CÔNG TY</h1>

            <div class="text-danger"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></div>
            <div class="text-success"><?php if(isset($_GET['state'])){echo $_GET['state'];} ?></div>

            <div class="col-md-12">
              <label for="inputNameCty" class="form-label">Tên công ty</label>
              <input type="text" name="nameCty" class="form-control bolder-set" id="inputNameCty" value="<?php if(isset($_SESSION['nameBs'])){echo $_SESSION['nameBs'];} ?>">
            </div>
            <label class="col-sm-2 control-label col-form-label lbl-required my-3" for="Logo"><b>Logo công ty</b></label>
            <input type="file" id="Logo" name="logo">
            <div class="col-md-6">
              <label for="inputHotline" class="form-label" >Hotline</label>
              <input type="text" name="hotline" class="form-control bolder-set" id="inputHotline" value="<?php if(isset($_SESSION['hotlineBs'])){echo $_SESSION['hotlineBs'];} ?>">
            </div>
            <div class="col-md-6">
              <label for="inputEmail" class="form-label">Email công ty</label>
              <input type="email" name="email" class="form-control bolder-set" id="inputEmail" value="<?php if(isset($_SESSION['emailBs'])){echo $_SESSION['emailBs'];} ?>">
            </div>
            <div class="col-md-6">
              <label for="inputWebsite" class="form-label">Website của công ty</label>
              <input type="text" name="website" class="form-control bolder-set" value="<?php if(isset($_SESSION['websiteBs'])){echo $_SESSION['websiteBs'];} ?>">
            </div>
            <div class="col-md-6">
              <label for="inputFacebook" class="form-label">Facebook</label>
              <input type="text" name="facebook" class="form-control bolder-set" id="inputEmail" value="<?php if(isset($_SESSION['facebookBs'])){echo $_SESSION['facebookBs'];} ?>">
            </div>
            <div class="col-md-12">
              <label for="inputAddress" class="form-label">Địa chỉ</label>
              <textarea id="inputAddress" name="address" rows="5" style="width: 100%;" maxlength="200" placeholder="1234 Main St"><?php if(isset($_SESSION['addressBs'])){echo $_SESSION['addressBs'];} ?></textarea>

            </div>

            <div class="col-12">
              <label for="inputProgress" class="form-label">Quá trình phát triễn</label><br>
              <textarea id="inputProgress" name="progress" rows="5" style="width: 100%;" maxlength="200"><?php if(isset($_SESSION['progressBs'])){echo $_SESSION['progressBs'];} ?></textarea>
            </div>

            <div class="col-12 text-end">
              <button type="submit" class="btn btn-primary" style="background-color:#2C5D63;">Thêm công ty</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



</body>

</html>