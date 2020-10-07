<?php
    include "../php/ram-functions.php";
    $courseList = getCourseList();
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>
            <table id = "attendance-table">
                <th>REG. NUMBER</th>
                <th>NAME</th>
                <th>DAY</th>
                <th>DATE</th>
                <th>TEACHER</th>
                <?php
                    $class = 1;
                    foreach($courseList as $course){
                        echo '<th>'.$course["class"].'<br>CLASS '.$class.'</th>';
                        $class++;
                    }
                ?>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>