<?php
function generateRegNumber(){
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
    if($connection){
        $regCode="AI/CFS1/S2/";
        $newNumber =0;
        $regNumber = "";
        $getDigits = mysqli_query($connection,"SELECT id FROM fs_student ORDER BY id  DESC LIMIT 1");
        if(mysqli_num_rows($getDigits)>0){
            while($num=mysqli_fetch_assoc($getDigits)){
                $newNumber = $num['id']+1;
                $regNumber = $regCode."00".$newNumber;
            }
        }
        return $regNumber;
    }
}

?>