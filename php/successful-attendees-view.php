<?php
include "../php/ram-functions.php";
$attendees = getSuccessfulAttendee();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Attendees</title>
</head>
<body>
    <div>
        <?php
        if($attendees=='Error!'){
            echo '<div id="attendee_error">Error! No student has completed all the classes</div>';
        }else{
        ?>
        <table>
            <th>S/N</th>
            <th>Reg. Number</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Signature</th>
            <tbody>
                <?php
                    $sn = 0;
                    for($i = 0; $i<count($attendees); $i++){
                        $sn++;
                        $output = '<tr><td>'.$sn.'</td>';
                        for($j =0; $j < count($attendees[$i]); $j++){
                            $output .='<td>'.$attendees[$i][$j].'</td>';
                        }
                        $output .='<td></td></tr>';
                        echo $output;
                    }
                ?>
            </tbody>
        </table>
        <?php
         }
        ?>
    </div>
</body>
</html>