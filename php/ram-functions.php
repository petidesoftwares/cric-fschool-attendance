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
function fetchFullAttendanceList(){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
            
        $dataArray = array();
            $queryAttendee = mysqli_query($connection, "SELECT fs_student.id, fs_student.reg_number, fs_student.firstname, fs_student.surname, fs_student_othername.othername FROM fs_student, fs_student_othername, registration WHERE 
            fs_student.id=fs_student_othername.student_id AND fs_student.id=registration.student_id AND registration.student_id = fs_student.id")or die(mysqli_error($connection));
            if(mysqli_num_rows($queryAttendee)>0){
                while($rows = mysqli_fetch_assoc($queryAttendee)){
                    $recordArray=array();
                    $recordArray[]= $rows['reg_number'];
                    $recordArray[]= $rows['surname'].", ". $rows['firstname']." ".$rows['othername'];
                    $queryCourses = mysqli_query($connection, 'SELECT class_id FROM classes');
                    while($class_id = mysqli_fetch_assoc($queryCourses)){
                        $getStstus = mysqli_query($connection, "SELECT class_day, class_date, teacher_id,att_status FROM attendance WHERE class_id=".$class_id['class_id']." AND student_id=".$rows['id']." ORDER BY class_id");
                        while($classStatus = mysqli_fetch_assoc($getStstus)){
                            $recordArray[]= $classStatus['class_day']; 
                            $recordArray[]= $classStatus['class_date']; 
                            $queryteacher = mysqli_query($connection,"SELECT title, firstname, surname FROM teacher WHERE id=".$classStatus['teacher_id'])or die(mysqli_error($connection));
                            if(mysqli_num_rows($queryteacher)>0){
                                while($tDetail = mysqli_fetch_assoc($queryteacher)){
                                    $recordArray[]= $tDetail['title']." ".$tDetail['surname'].", ".$tDetail['firstname'];
                                }
                            } 
                            $recordArray[]= $classStatus['att_status'];                            
                        }
                    }
                    $dataArray[]= $recordArray;
                }
             return $dataArray;
            }else{
                return "ERROR! No registration for ". $session." found.";
            }
    }
}

function getSuccessfulAttendee(){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
        $attendeeArray =array();
        // $countPresent = mysqli_query($connection, "SELECT COUNT(att_status) FROM attendance")
        $queryStudentId = mysqli_query($connection,"SELECT student_id FROM attendance WHERE (SELECT COUNT(att_status) FROM attendance)=(SELECT COUNT(class) FROM classes)") or die(mysqli_error($connection));
        if(mysqli_num_rows($queryStudentId)>0){
            while($ids = mysqli_fetch_assoc($queryStudentId)){
                $unitArray = array();
                $queryAttendeeDetails = mysqli_query($connection, "SELECT fs_student.reg_number, fs_student.title, fs_student.firstname, fs_student.surname, fs_student_othername.othername, fs_student.mobile FROM fs_student, fs_student_othername, registration WHERE 
                fs_student.id=fs_student_othername.student_id AND fs_student.id=registration.student_id AND registration.student_id = fs_student.id")or die(mysqli_error($connection));
                if(mysqli_num_rows($queryAttendeeDetails)>0){
                    while($data = mysqli_fetch_assoc()){
                        $unitArray[]=$data['reg_number'];
                        $fullName = $data['title']." ". $data['surname'].", ".$data['firstname']." ".$data['othername'];
                        $unitArray[]=$fullName;
                        $unitArray[] = $data['mobile'];
                    }
                }
                $attendeeArray[]= $unitArray;
            }
        }else{
            return 'Error!';
        }
        return $attendeeArray;
    }
}
?>