<?php
session_start();
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
        $session=$_POST["session"];
        $formString='<table><thead id ="evenRow"><th>Reg. Number</th><th>Full Name</th><th>Absent</th><th>Present</th><th>Permitted</th></thead><tbody>';
        $queryAttendee = mysqli_query($connection, "SELECT fs_student.reg_number, fs_student.firstname, fs_student.surname, fs_student_othername.othername FROM fs_student, fs_student_othername, registration WHERE fs_student.id=fs_student_othername.student_id AND fs_student.id=registration.student_id AND registration.fs_session = '".$session."'")or die(mysqli_error($connection));
        if(mysqli_num_rows($queryAttendee)>0){
            $s_n=0;
            while($rows = mysqli_fetch_assoc($queryAttendee)){
                $s_n++;
                if($s_n%2==0){
                    $formString.='<tr id="evenRow"><td>'.$rows['reg_number'].'</td><td>'.$rows['firstname'].' '.$rows['othername'].' '.$rows['surname'].'</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Absent_'.$s_n.'" />Absent</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Present_'.$s_n.'" />Present</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Permitted"/>Permitted</td></tr>';
                }else{
                    $formString.='<tr><td>'.$rows['reg_number'].'</td><td>'.$rows['firstname'].' '.$rows['othername'].' '.$rows['surname'].'</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Absent_'.$s_n.'" />Absent</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Present_'.$s_n.'" />Present</td><td><input type="radio" name = "att_status'.$s_n.'" id="att_status'.$s_n.'" value="Permitted"/>Permitted</td></tr>';
                }
            }
            echo $formString.'</tbody></table><br>
                                <input type="hidden" name="teacher_id" id = "teacher_id" value="'.$_SESSION['teacher_id'].'"/>
                                <input type="hidden" name="list_length" id = "list_length" value="'.$s_n.'"/></br>
                                <div><input type="submit" name="submit" id ="submit_attendees" value="Submit"></div>';
        }else{
            echo "ERROR! No registration for ". $session." found.";
        }
    }
?>