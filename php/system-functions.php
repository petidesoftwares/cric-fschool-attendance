<?php
    function getAdminProfile($id){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
        if($connection){
            $adminProfileQuery = mysqli_query($connection,"SELECT surname, firstname, othername, gender, phone_number, email From cric_fschool_admin WHERE id =".$id."");
            if(mysqli_num_rows( $adminProfileQuery)>0){
                $profileArray = mysqli_fetch_assoc($adminProfileQuery);
                return $profileArray;
            }
        }else{
            return 'Connection Error!';
        }
    }
    
    function getSetupState(){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
        if($connection){ 
            $checkSystemStateQuery = mysqli_query($connection, "SELECT system_status FROM fschool_system_status");
            if(mysqli_num_rows($checkSystemStateQuery)>0){
                $state = mysqli_fetch_assoc($checkSystemStateQuery);
                return $state['system_status'];
            }else{
                return 0;
            }
        }
    }

    function getTeacherProfile($id){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
        if($connection){
            $teacherProfileQuery = mysqli_query($connection,"SELECT firstname, surname, othername, sex, mobile, teacher_email From teacher,teacher_othername, fs_teacher_email WHERE teacher.id = teacher_othername.teacher_id AND teacher.id = fs_teacher_email.teacher_id AND teacher.id =".$id."")or die(mysqli_error($connection));
            if(mysqli_num_rows( $teacherProfileQuery)>0){
                $profileArray = mysqli_fetch_assoc($teacherProfileQuery);
                return $profileArray;
            }
        }
    }

?>