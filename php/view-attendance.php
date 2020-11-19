<?php
    include "../php/ram-functions.php";
    $courseList = getCourseList();
    $attRecord = fetchFullAttendanceList();
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>
            <table id = "attendance-table">
                <th>REG. NUMBER</th>
                <th id="name">NAME</th>
                <th>DAY</th>
                <th id="date">DATE</th>
                <th id="teacher">TEACHER</th>
                <?php
                    $class = 1;
                    foreach($courseList as $course){
                        echo '<th>'.$course["class"].'<br>CLASS '.$class.'</th>';
                        $class++;
                    }
                ?>
                <tbody>
                    <?php
                        for($k=0;$k<count($attRecord);$k++){
                            echo "<tr>";
                            for($i=0;$i<count($attRecord[$k]);$i++){
                                if($k%2!=0){
                                    echo '<td id="bg-grey">'.$attRecord[$k][$i]."</td>";
                                }else{
                                    echo "<td>".$attRecord[$k][$i]."</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>