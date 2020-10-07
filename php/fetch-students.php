<?php
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
        $session=$_POST["session"];
        $formString="<table><thead><th>Reg. Number</th><th>Full Name</th><th>Check_Status</th></thead><tbody>";
        $queryAttendee = mysqli_query($connection, "SELECT fs_student.reg_number, fs_student.firstname, fs_student.surname, fs_student_othername.othername FROM fs_student, fs_student_othername, registration WHERE fs_student.id=fs_student_othername.student_id AND fs_student.id=registration.student_id AND registration.fs_session = '".$session."'")or die(mysqli_error($connection));
        if(mysqli_num_rows($queryAttendee)>0){
            $s_n=0;
            while($rows = mysqli_fetch_assoc($queryAttendee)){
                $s_n++;
                $formString.='<tr><td>'.$rows['reg_number'].'</td><td>'.$rows['firstname'].' '.$rows['othername'].' '.$rows['surname'].'</td><td><input type="checkbox" id="att_status'.$s_n.'" value="'.$rows['reg_number'].'" onclick="getRegAttendeeNumbers()"/></td></tr>';
            }
            echo $formString.'</tbody></table><br><input type="hidden" name="list_length" id = "list_length" value="'.$s_n.'"/></br><div><button id =""submit_attendees" onclick = "submitAttendance()">Submit</button></div>';
        }else{
            echo "ERROR! No registration for ". $session." found.";
        }
    }
?>