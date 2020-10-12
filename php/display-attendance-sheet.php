<?php
    require_once("ram-functions.php");
    $courseList = getCourseList();

?>
    
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/attendancesheet.css">
    </head>
    <body>
        <form action="../php/process-attendance.php" method="post" id="myform">
            <div>
            
                    <select name="course_id" id="course_id" class="form-field">
                        <option>Choose Course</option>
                        <?php
                        foreach($courseList as $course){
                            echo '<option value="'.$course['class_id'].'" >'.$course['class'].'</option>';
                        }
                        ?>
                    </select>
                    <select name="session" id="session-field" class="form-field">
                        <option>Choose Session</option>
                        <option value="Week-Days">Week-Days</option>
                        <option value="Saturdays">Saturdays</option>
                        <option value="Sundays">Sundays</option>
                    </select>
                    <span id="att-btn" onclick='getAttendeeList();'>Ok</span>
                
            </div>
            <div id="display-att">
                
            </div>
        </form>
    </body>
</html>