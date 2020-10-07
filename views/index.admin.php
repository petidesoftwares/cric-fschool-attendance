<?php
    include "../php/system-setup.php";
    if(checkAdmin()==false){
        header("Location:signup-admin.php");
    }else{
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
        <script type="text/javascript" src="../jscripts/jquery.js"></script>
        
    </head>
    <body>
    <div id="bg-image">
        <img src="../images/logo.png">
    </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
        </div>
        <div id="modal">
            <div id="adminLoginForm">
                <h3>Admin</h3>
                <span><label>Username:</label> <input type="text" id="admin-username"></span><br>
                <span><label>Password:</label> <input type="password" id="admin-password"></span><br>
                <span><input type="button" value="Sign In" id="admin-signin-btn" onclick='signInAdmin();'></span>
            </div>
        </div>
        <script type='text/javascript' src="../jscripts/indexscript.js"></script>
    </body>
</html>
<?php
    }
?>
