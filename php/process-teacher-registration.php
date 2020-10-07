<?php
require_once('db_conn.php');
$conn = new DB_CONNECTION();
$connection = $conn->createConnection();
 if($connection){
     $title = $_POST["title"];
    $surname = $_POST["surname"];
    $fname = $_POST["fname"];
    $othername = $_POST["othername"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $fs_session = $_POST["session"];
    $defaultPassword =$_POST['defaultPassword'];
    $algorithm = "sha512";

    $insertTeacher = mysqli_query($connection, "INSERT INTO teacher(
        title,
        surname, 
        firstname,
        mobile, 
        sex,
        fs_session)
        VALUES(
            '".mysqli_real_escape_string($connection,$title)."',
            '".mysqli_real_escape_string($connection,$surname)."',
            '".mysqli_real_escape_string($connection,$fname)."', 
            '".mysqli_real_escape_string($connection,$phone)."', 
            '".mysqli_real_escape_string($connection,$gender)."', 
            '".mysqli_real_escape_string($connection,$fs_session)."'
        ) ") or die(Mysqli_error($connection));
    
    if($insertTeacher){
        $teacherID = 0;
        $getTeacherID = mysqli_query($connection, "SELECT id FROM teacher ORDER BY id DESC LIMIT 1");
        if(mysqli_num_rows($getTeacherID)>0){
            $id =mysqli_fetch_assoc($getTeacherID);
            $teacherID = $id['id'];
            if($othername!=null && $othername!=""){
                $insertTeacher = mysqli_query($connection, "INSERT INTO teacher_othername(
                    teacher_id, 
                    othername
                    )
                    VALUES(
                        '".mysqli_real_escape_string($connection,$teacherID)."',
                        '".mysqli_real_escape_string($connection,$othername)."'
                    ) ") or die(Mysqli_error($connection));
            }
            $insertTeacher = mysqli_query($connection, "INSERT INTO fs_teacher_email(
                teacher_id, 
                teacher_email
                )
                VALUES(
                    '".mysqli_real_escape_string($connection,$teacherID)."',
                    '".mysqli_real_escape_string($connection,$email)."'
                ) ") or die(Mysqli_error($connection));

            $insertTeacherLogin = mysqli_query($connection, "INSERT INTO teacherlogin(
                teacher_id, 
                teacher_email,
                teacher_password
                )
                VALUES(
                    '".mysqli_real_escape_string($connection,$teacherID)."',
                    '".mysqli_real_escape_string($connection,$email)."', 
                    '".hash($algorithm,$defaultPassword)."'
                ) ") or die(Mysqli_error($connection));
        }
        if($insertTeacher && $insertTeacher){
            echo "Registration Seccessful";
        }else{
            echo "Registration Failed due to ". Mysqli_error($connection)."";
        }
    }else{
        Mysqli_error($connection);
    }
 }else {
     echo "Connection failed ".Mysqli_error($connection);
 }

?>