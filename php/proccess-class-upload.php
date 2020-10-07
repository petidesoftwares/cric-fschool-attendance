<?php
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
     if($connection){
         $clas = $_POST['clas'];
         $uploadQuery = mysqli_query($connection, "INSERT INTO classes(class) VALUES('".mysqli_real_escape_string($connection,$clas)."')") or die(mysqli_error($connection));
         if($uploadQuery){
             echo "successful";
         }else{
             echo 'Error:'. mysqli_error($conn);
         }
     }
?>