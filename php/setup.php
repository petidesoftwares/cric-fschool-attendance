<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('db_conn.php');
        $conn = new DB_CONNECTION();
        $connection = $conn->createConnection();
    
        if($connection){
            $setup = mysqli_query($connection, "UPDATE fschool_system_status SET system_status = 1 WHERE system_status = 0");
            if($setup==true){
                echo "Setup Successful";
            }
            else {
                echo 'Error';
            }
        }
    }
    
?>