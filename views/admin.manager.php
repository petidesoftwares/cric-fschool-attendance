<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header('Location:index.admin.php');
}else {
    include "../php/system-functions.php";
    $profile = getAdminProfile($_SESSION["admin_id"]);
    $state = getSetupState();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
        <link rel="stylesheet" href="../styles/admin.manager.css">
        <script type="text/javascript" src="../jscripts/jquery.js"></script>
        <script type="text/javascript" src="../jscripts/admin.manager.js"></script>
        
    </head>
    <body>
        <div id="bg-image">
            <img src="../images/logo.png">
        </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
        </div>
        <div id="left-side-bar">
            <div id="profile">
                <img src="../images/avater.png" class ="avatar"/>
                <div id="profile-data">
                    <span><?php echo $profile['surname'].", ".$profile['firstname']?></span>
                    <span><?php echo $profile['email']?></span>
                    <span><?php echo $profile['phone_number']?></span>
                    <span><?php echo $profile['gender']?></span>
                </div>
                
            </div>
            <div id="dashboard"> 
                <h3>DASHBOARD</h3>
                <span onclick = 'regStudent();'>Register Student</span>
                <span onclick = 'regTeacher();'>Register Teacher</span>
                <span onclick = 'viewStudent();'>View Student</span>
                <span onclick = 'viewAttendance();'>View Attendance</span>
                <span onclick = 'getSuccessfulAttendee();'>View Successful Attendee</span>
                <span>Assign Project</span>
                <span onclick ='uploadClasses();'>Upload Classes(Topics)</span>
                <?php if($state !=1){
                            echo "<button id = 'setup-btn' onclick = 'setupSystem();'>SetUp System</button>";
                        }
                ?>
            </div>
            
        </div>
        <div id = "display-pane">
        </div>
        <div id ="footer">footer</div>
    </body>
</html>
<?php
}
?>