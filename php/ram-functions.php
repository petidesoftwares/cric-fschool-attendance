<?php
function getStudentList(){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
     if($connection){
         $getStudentsQuery = mysqli_query($connection,"SELECT firstname, surname, othername FROM fs_student, fs_student_othername WHERE fs_student.id=fs_student_othername.student_id")or die(mysqli_error($connection));
         if(mysqli_num_rows($getStudentsQuery)>0){
             return $getStudentsQuery;
                 
         }
     }
}

function getCourseList(){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
     if($connection){
         $getCourseQuery = mysqli_query($connection,"SELECT class_id, class FROM classes")or die(mysqli_error($connection));
         if(mysqli_num_rows($getCourseQuery)>0){
             return $getCourseQuery;
                 
         }
     }
}

function fetchAttendanceList($session){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
            
        $dataArray = array();
            $queryAttendee = mysqli_query($connection, "SELECT fs_student.reg_number, fs_student.firstname, fs_student.surname, fs_student_othername.othername FROM fs_student, fs_student_othername, registration WHERE fs_student.id=fs_student_othername.student_id AND fs_student.id=registration.student_id AND registration.fs_session = '".$session."'")or die(mysqli_error($connection));
            if(mysqli_num_rows($queryAttendee)>0){
                while($rows = mysqli_fetch_assoc($queryAttendee)){
                    $newData=json_encode($rows);
                    $dataArray[]=$newData;
                }
             return json_encode($dataArray);
            }else{
                return "ERROR! No registration for ". $session." found.";
            }
    }
}

// $algorithm = "sha512";
// echo hash($algorithm,"desmond.cric.1");

?>