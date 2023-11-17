<?php
session_start();
require_once '../connection.php';
if(isset($_POST['rg_name']) && isset($_POST['rg_password']) && isset($_POST['rg_password_cf']) ) {
    function validate($data) {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}
$name = validate($_POST['rg_name']);
$password = validate($_POST['rg_password']);
$password_cf = validate($_POST['rg_password_cf']);
$_SESSION['user_name'] = $name ;
$_SESSION['user_password'] = $password;
$_SESSION['user_password_cf'] = $password_cf;

if(empty($name) && empty($password)){
    header("Location: ../index_register.php?error=User Name and Password is required");
    exit();
} 

else if(empty($name)){
    header("Location: ../index_register.php?error=User Name is required");
    exit();
}
else if(empty($password)){
    header("Location: ../index_register.php?error=User Password is required");
    exit();
}
else if(empty($password_cf)){
    header("Location: ../index_register.php?error=Confirm Password is required");
    exit();
}
else if($password!=$password_cf){
    header("Location: ../index_register.php?error=Confirm Password is wrong");
    exit();
}else if( !(isset($_POST['checkAgree']) && $_POST['checkAgree']=='agree') ){
    header("Location: ../index_register.php?error=Please agree all statements");
    exit();
}

$sql = "SELECT user_name FROM users WHERE user_name='$name' ";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)===1){
    header("Location: ../index_register.php?error=User name is already exist!");
    exit();
}
$sql_create = "INSERT INTO users (user_name, user_password) 
                VALUES ('$name', '$password')";
if (mysqli_query($conn, $sql_create)) {
    echo "New record created successfully";
    $_SESSION['user_id'] = mysqli_insert_id($conn);
    header('Location: ../Home_handle/home.php');
    exit();
}else {
    echo "Error: " . $sql_create . "<br>" . $conn->error;
  }

?>