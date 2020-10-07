<?php
// include "../php/admin-signup.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../styles/index.css">
    </head>
    <body>
        <div id="bg-image">
            <img src="../images/logo.png">
        </div>
        <div>
            <h1> Welcome To CRIC Foundation School Attendance Portal</h1>
        </div>
        <div id="signup-form">
            <h3>Sign-Up Admin</h3>
            <form action="../php/admin-signup.php" method="post">
                <div class="signup-field-pane">
                    <label>Title:</label>
                    <select name="title" id="title-field" class="form-field">
                        <option value="Apostle">Apostle</option>
                        <option value="Pastor">Pastor</option>
                        <option value="Deacon">Deacon</option>
                        <option value="Deaconess">Deaconess</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Bro.">Bro.</option>
                        <option value="Sis.">Sis.</option>
                    </select>
                </div>
                <div class="signup-field-pane">
                    <label>Surname:</label>
                    <input type="text" name="surname" class="signup-field" id ="surname" required>
                </div>
                <div class="signup-field-pane">
                    <label>First Name:</label>
                    <input type="text" name="fname" class="signup-field" id ="fname"  required>
                </div>
                <div class="signup-field-pane">
                    <label>Other Name:</label>
                    <input type="text" name="othername" class="signup-field" id ="othername">
                </div>
                <div class="signup-field-pane">
                    <label>Gender:</label>
                    <span id = "radios">
                        <input type="radio" name="gender" id ="gender" value="Male" requird>Male
                        <input type="radio" name="gender" id ="gender" value="Female" required>Female
                    </span>
                </div>
                <div class="signup-field-pane">
                    <label>Phone Number:</label>
                    <input type="tel" name="phone" class="signup-field" id ="phone"  required>
                </div>
                <div class="signup-field-pane">
                    <label> Email:</label>
                    <input type="email" name="email" class="signup-field" id ="email"  required>
                </div>
                <div class="signup-field-pane">
                    <label>Password:</label>
                    <input type="password" name="password" class="signup-field" id ="password"  required>
                </div>
                    <div class="signup-field-pane">
                    <input type="submit" name="submit" class="btn" id ="submit" value="Submit">
                </div>
            </form>
        </div>
        
    </body>
</html>