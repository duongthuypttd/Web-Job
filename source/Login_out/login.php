<?php
session_start();
require_once "../connection.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data) {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$password = validate($_POST['password']);
$_SESSION['user_name'] = $uname;
$_SESSION['user_password'] = $password;

if(empty($uname) && empty($password)){
    header("Location: ../index.php?error=User Name and Password is required");
    exit();
} 

else if(empty($uname)){
    header("Location: ../index.php?error=User Name is required");
    exit();
}
else if(empty($password)){
    header("Location: ../index.php?error=User Password is required");
    exit();
}


$sql = "SELECT  * FROM users WHERE user_name='$uname' AND user_password='$password'";
$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result)===1){
    $row= mysqli_fetch_assoc($result);
    if($row['user_name']===$uname && $row['user_password']===$password){
        echo "Logged In";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_password'] = $row['user_password'];
        $_SESSION['user_id'] = $row['user_id'];
        if($_SESSION['user_name']=='admin'){
            header('Location: ../Admin_handle/adminHome.php');
            exit();
        }
        header('Location: ../Home_handle/home.php');
        exit();
        
    }
    else{
        header("Location: ../index.php?error=Incorrect User Name or Password ");
    }
}
else{
    header("Location: ../index.php?error=Incorrect User Name or Password ");
    exit();
}


?>