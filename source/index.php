<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])!='admin'){
    header("Location: ../Home_handle/home.php");
}else if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])=='admin'){
    header("Location: ../Admin_handle/adminHome.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>LOGIN</title>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-5 col-xl-5">
                    <img src="./images/login.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="./Login_out/login.php" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3"><b>User Name:</b></label>
                            <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter name" name="uname"
                                    value="<?php if(!empty($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?>"/>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4"><b>Password:</b></label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password"
                                    value="<?php if(!empty($_SESSION['user_password'])){echo $_SESSION['user_password'];} ?>" />
                        </div>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="text-danger"> <?php echo $_GET['error'];  ?> </p>
                        <?php } ?>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="../index_register.php" class="link-danger">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>