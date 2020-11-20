<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance.Successful</title>
</head>
<body>
<?php
    require_once('db_conn.php');
    $connection = new DB_CONNECTION();
    $conn = $connection->createConnection();
    if($conn){
        if(isset($_POST['submit'])){
            $list_length=$_POST['list_length'];
            $class_id = $_POST['course_id'];
            $teacher_id = $_POST['teacher_id'];
            
            $outputFlag ="";
            for($i=1;$i<=$list_length;$i++){
                $exp = explode('_',$_POST['att_status'.$i]);
                if($exp[0]=="Absent" || $exp[0]=="Present"){
                    $markAttendance = mysqli_query($conn,"INSERT INTO attendance(
                        student_id, 
                        class_day, 
                        att_status, 
                        class_date, 
                        class_id, 
                        teacher_id
                    ) VALUES(
                        '".mysqli_real_escape_string($conn, $exp[1])."',
                        '".mysqli_real_escape_string($conn, date('l'))."',
                        '".mysqli_real_escape_string($conn, $exp[0])."',
                        '".mysqli_real_escape_string($conn, date('Y-m-d'))."',
                        '".mysqli_real_escape_string($conn, $class_id)."',
                        '".mysqli_real_escape_string($conn, $teacher_id)."'
                    )") or die(mysqli_error($conn));
                    if($markAttendance){
                        $outputFlag = '<div style="width:100%; text-align:center; font-size:24px; font-weight:bold">Attendance Successfully Updated</div>';
                    }
                }else{
                    //DO NOTHIG
                }
            }
            echo $outputFlag;
            header("refresh:5, url=../views/attendance.php");
            
        }   
    }
?>
</body>
</html>
