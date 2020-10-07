<?php
    include "php/system-setup.php";
    if(checkSystemState()=="READY"){
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/index.css">
        <script type="text/javascript" src="jscripts/jquery.js"></script>
        
    </head>
    <body>
    <div id="bg-image">
        <img src="images/logo.png">
    </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
            <div id="link-btn-pane">
                <a href = "#" onclick='showTeacherLogin();'>Sign In As Teacher</a>
            </div>
        </div>
        <div class="modal" id = "modal-1">
            <button id="close-modal" onclick= 'closeModal();'>X</button>
            <div id="teacherLoginForm">
                <h3>Teacher</h3>
                <span>Username: <input type="text" id="teacher-username"></span><br>
                <span>Password: <input type="password" id="teacher-password"></span><br>
                <span><input type="button" value="Sign In" id="teacher-signin-btn" onclick='signInTeacher();'></span>
            </div>
        </div>

        <!--div class="modal" id="modal-2">
            
            <div id="system-setup-error">
                <h1>Sorry. System not ready for use. check back later!!!</h1>
            </div>
        </div-->
        <script type='text/javascript' src="jscripts/indexscript.js"></script>
    </body>
</html>
<?php
     }else{
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/index.css">
        <script type="text/javascript" src="jscripts/jquery.js"></script>
        
    </head>
    <body>
    <div id="bg-image">
        <img src="images/logo.png">
    </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
        </div>
        <div class="modal" id="modal-2">
            <!---button id="close-modal" onclick= 'closeModal();'>X</button-->
            <div id="system-setup-error">
                <h1>Sorry. System not ready for use. check back later!!!</h1>
            </div>
        </div>
        <script type='text/javascript' src="jscripts/indexscript.js"></script>
    </body>
</html>
<?php
     }
?>