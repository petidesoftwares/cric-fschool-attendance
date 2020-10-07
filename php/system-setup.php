<?php
    function checkAdmin(){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
        if($connection){
           $checkAdminQery = mysqli_query($connection, "SELECT id FROM cric_fschool_admin");
           if(mysqli_num_rows($checkAdminQery)>0){
               return true;
           }else{
               return false;
           }
        }
        
    }

    function checkSystemState(){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
        if($connection){
           $checkSystemQuery = mysqli_query($connection, "SELECT system_status FROM fschool_system_status");
           if(mysqli_num_rows($checkSystemQuery)>0){
               $status = mysqli_fetch_assoc($checkSystemQuery);
               if($status['system_status']==1){
                    return "READY";
               }else {
                   return "NOT_READY";
               }
           }else{
               return "NOT_READY";
           }
        }
        
    }
?> 