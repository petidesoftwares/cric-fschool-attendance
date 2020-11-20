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
            <?php
                if(is_null($courseList)){
                    echo '<div>Classes or Courses not uploaded</div>';
                }else{
            ?>
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
                                $tableLength=$class+4;
                                echo "<tr>";
                                for($i=0;$i<$tableLength;$i++){
                                    if($i>=count($attRecord[$k])){
                                        if($k%2!=0){
                                            echo '<td id="bg-grey">X</td>';
                                        }else{
                                            echo "<td>X</td>";
                                        }
                                    }else{
                                        if($k%2!=0){
                                            echo '<td id="bg-grey">'.$attRecord[$k][$i]."</td>";
                                        }else{
                                            echo "<td>".$attRecord[$k][$i]."</td>";
                                        }
                                    }
                                }
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            <?php
                }
            ?>
        </div>
    </body>
</html>