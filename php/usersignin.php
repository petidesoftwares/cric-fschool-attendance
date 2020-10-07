<?php
session_start();
require_once('db_conn.php');
$conn = new DB_CONNECTION();
$connection = $conn->createConnection();
 if($connection){
        $userType = $_POST['userType'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $algorithm = "sha512";
        if($userType='teacher'){
            $signInQuery = mysqli_query($connection, "SELECT teacher_id FROM teacherlogin WHERE teacher_email ='".$username."' AND teacher_password = '".hash($algorithm,$password)."'");
            if(mysqli_num_rows($signInQuery) >0){
                $userId=mysqli_fetch_assoc($signInQuery);
                $_SESSION["teacher_id"] = $userId['teacher_id'];
                echo ("Successfully Logged In");
            }
            else{
                echo ("Not Found Error");
            }
        }
        if($userType='admin'){
            $adminSignInQuery = mysqli_query($connection, "SELECT id FROM cric_fschool_admin WHERE email ='".$username."' AND admin_password = '".hash($algorithm,$password)."'");
            if(mysqli_num_rows($adminSignInQuery) >0){
                $userId=mysqli_fetch_assoc($adminSignInQuery);
                $_SESSION["admin_id"] = $userId['id'];
                echo ("Successfully Logged In");
            }
            else{
                echo ("Not Found Error");
            }
        }
        
    }
    else{
     echo 'connection_error';
    }
    

?>