<?php
require "ram-functions.php";
$studentList = getStudentList();

?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div>
            <table id="student-list">
                <tr id="bg-grey">
                    <th>S/No</th>
                    <th>REGISTRATION NUMBER</th>
                    <th>FIRST NAME</th>
                    <th>SURNAME</th>
                    <th>OTHER NAMES</th>
                </tr>
                <tbody>
                    <?php 
                        $s_n = 1;
                        foreach($studentList as $list){
                            if($s_n%2 ==0){
                                echo '<tr id="bg-grey"><td>'.$s_n.'</td><td>'.$list['reg_number'].'</td><td>'.$list['firstname'].'</td><td>'.$list['surname'].'</td><td>'.$list['othername'].'</td></tr>';
                            }else{
                                echo "<tr><td>".$s_n."</td><td>".$list['reg_number']."</td><td>".$list['firstname']."</td><td>".$list['surname']."</td><td>".$list['othername']."</td></tr>";
                            }
                            
                            $s_n++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
    </body>

</html>