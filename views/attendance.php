<?php
session_start();
if(!isset($_SESSION["teacher_id"])){
    header('Location:index.php');
}else {
    include "../php/system-functions.php";
    $profile = getTeacherProfile($_SESSION["teacher_id"]);
    $fname = $profile['firstname'];
    $surname = $profile['surname'];
    $othername = $profile['othername'];
    $phone = $profile['mobile'];
    $email = $profile['teacher_email'];
    $gender = $profile['sex'];

// $hash =  hash("sha512","petide");
//     if(hash("sha512","petide") == $hash ){
//         echo "good";
//     }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
        <link rel="stylesheet" href="../styles/teacher.view.css">
        <script type="text/javascript" src="../jscripts/jquery.js"></script>
        <script type="text/javascript" src="../jscripts/teacher.manager.js"></script>
    </head>
    <body>
    <div id="bg-image">
            <img src="../images/logo.png">
            <span id = "logout" onclick = 'signOut();'>Logout</span>
        </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
        </div>
        <div id="profile-pane">
            <img src="../images/avater.png" class ="avatar"/>
            <div id="profile-data">
                <span>First Name: <?php echo $fname?></span>
                <span>Surname: <?php echo $surname?></span>
                <span>Other Names: <?php echo $othername?></span>
                <span>Phone: <?php echo $phone?></span>
                <span>Email: <?php echo $email?></span>
                <span>Gender: <?php echo $gender?></span>
            </div>
            <div id="teacher-activities">
                <hr>
                <span id="take-attendance" onclick = 'takeAttendance();'>Take Attendance</span>
            </div>
        </div>
        <div id="display-pane"></div>
    </body>
</html>
<?php
}
?>