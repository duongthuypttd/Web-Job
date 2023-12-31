<?php 
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: *');
  header('Access-Control-Allow-Headers: *');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">SIGN UP</p>

                <form class="mx-1 mx-md-4" action="./Register/register.php" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Name:</label>
                      <input type="text" id="form3Example1c" class="form-control" name="rg_name"
                          value="<?php if(!empty($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c" >Password:</label>
                      <input type="password" id="form3Example4c" class="form-control"  name="rg_password"
                          value="<?php if(!empty($_SESSION['user_password'])){echo $_SESSION['user_password'];} ?>"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password:</label>
                      <input type="password" id="form3Example4cd" class="form-control" name="rg_password_cf"
                          value="<?php if(!empty($_SESSION['user_password_cf'])){echo $_SESSION['user_password_cf'];} ?>"/>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" id="form2Example3c" name="checkAgree" value="agree"/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!"><i>Terms of service</i></a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-end me-5 mb-4">
                    <a href="./index.php">Log in</a>
                  </div>
                  <?php if(isset($_GET['error'])) { ?>
                    <p class="text-danger text-center"> <?php echo $_GET['error'];  ?> </p>
                  <?php } ?>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="./images/register.jpg"
                  class="img-fluid rounded" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
