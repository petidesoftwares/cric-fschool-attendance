<?php
if(isset($_POST['submit']) && $_POST['submit']=="Submit"){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
        $title = $_POST['title'];
        $surname = $_POST['surname'];
        $fname = $_POST['fname'];
        $othername = $_POST['othername'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email= $_POST['email'];
        $password = $_POST['password'];
        $algorithm ="sha512";

        $insertQuery =mysqli_query($connection, "INSERT INTO cric_fschool_admin (title, surname, firstname, othername, gender, phone_number, email, admin_password) 
        VALUES(
        '".mysqli_real_escape_string($connection,$title)."',
        '".mysqli_real_escape_string($connection,$surname)."',
        '".mysqli_real_escape_string($connection,$fname)."',
        '".mysqli_real_escape_string($connection,$othername)."',
        '".mysqli_real_escape_string($connection,$gender)."',
        '".mysqli_real_escape_string($connection, $phone)."',
        '".mysqli_real_escape_string($connection,$email)."',
        '".hash($algorithm,$password)."')") or die(mysqli_error($connection));

        if($insertQuery){
            header("Location: ../views/index.admin.php");
        }
        
    }

}
?>