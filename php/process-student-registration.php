<?php
    require_once('db_conn.php');
    $conn = new DB_CONNECTION();
    $connection = $conn->createConnection();
     if($connection){
         $paymentStatus = $_POST['paymentStatus'];

         if($paymentStatus == "Not Paid"){
             $title = $_POST['title'];
                $surname = $_POST["surname"];
                $fname = $_POST["fname"];
                $othername = $_POST["othername"];
                $gender = $_POST["gender"];
                $marital_status = $_POST["marital_status"];
                $address = $_POST["address"];
                $bus_stop = $_POST["bus_stop"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $dob = $_POST["dob"];
                $fs_session = $_POST["session"];
                $regDate =$_POST["regDate"];

                $insertStudent = mysqli_query($connection, "INSERT INTO fs_student(
                        title,
                        surname, 
                        firstname,
                        mobile, 
                        sex,
                        dob, 
                        marital_status, 
                        s_address, 
                        bus_stop)
                        VALUES(
                            '".mysqli_real_escape_string($connection,$title)."',
                            '".mysqli_real_escape_string($connection,$surname)."',
                            '".mysqli_real_escape_string($connection,$fname)."', 
                            '".mysqli_real_escape_string($connection,$phone)."', 
                            '".mysqli_real_escape_string($connection,$gender)."', 
                            '".mysqli_real_escape_string($connection,$dob)."',
                            '".mysqli_real_escape_string($connection,$marital_status)."', 
                            '".mysqli_real_escape_string($connection,$address)."',
                            '".mysqli_real_escape_string($connection,$bus_stop)."'
                        ) ");
                    $studentID = 0;
                    $getStudentID = mysqli_query($connection, "SELECT id FROM fs_student ORDER BY id DESC LIMIT 1");
                    if(mysqli_num_rows($getStudentID)>0){
                        $id =mysqli_fetch_assoc($getStudentID);
                        $studentID = $id['id'];
                        $f_payStatus = "NOT PAID";
                        $insertOthername = mysqli_query($connection, "INSERT INTO fs_student_othername(
                            othername, 
                            student_id
                            )
                            VALUES(
                                '".mysqli_real_escape_string($connection, $othername)."',
                                '".mysqli_real_escape_string($connection,$studentID)."'
                            ) ");

                            $insertEmail = mysqli_query($connection, "INSERT INTO fs_student_email(
                                email, 
                                student_id
                                )
                                VALUES(
                                    '".mysqli_real_escape_string($connection, $email)."',
                                    '".mysqli_real_escape_string($connection,$studentID)."'
                                ) ");

                            $insertRegistration = mysqli_query($connection, "INSERT INTO registration( 
                                student_id,
                                date_reg,
                                payment_status,
                                fs_session
                                )
                                VALUES(
                                    '".mysqli_real_escape_string($connection, $studentID)."',
                                    '".mysqli_real_escape_string($connection,$regDate)."',
                                    '".mysqli_real_escape_string($connection, $f_payStatus)."',
                                    '".mysqli_real_escape_string($connection,$fs_session)."'
                                ) ");
                    }
                
                if($insertStudent && $insertOthername && $insertEmail){
                    echo "Registration Successful";
                }else{
                    echo "Registration Failed";
                }
            }
            if($paymentStatus == "Paid"){
                $title = $_POST['title'];
                $surname = $_POST["surname"];
                $fname = $_POST["fname"];
                $othername = $_POST["othername"];
                $gender = $_POST["gender"];
                $marital_status = $_POST["marital_status"];
                $address = $_POST["address"];
                $bus_stop = $_POST["bus_stop"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $dob = $_POST["dob"];
                $fs_session = $_POST["session"];
                $regDate =$_POST["regDate"];
                $amountPaid = $_POST['amountPaid'];
                $balance = $_POST['balance'];

                $insertStudent = mysqli_query($connection, "INSERT INTO fs_student(
                        title,
                        surname, 
                        firstname,
                        mobile, 
                        sex,
                        dob, 
                        marital_status, 
                        s_address, 
                        bus_stop)
                        VALUES(
                            '".mysqli_real_escape_string($connection,$title)."',
                            '".mysqli_real_escape_string($connection,$surname)."',
                            '".mysqli_real_escape_string($connection,$fname)."', 
                            '".mysqli_real_escape_string($connection,$phone)."', 
                            '".mysqli_real_escape_string($connection,$gender)."', 
                            '".mysqli_real_escape_string($connection,$dob)."',
                            '".mysqli_real_escape_string($connection,$marital_status)."', 
                            '".mysqli_real_escape_string($connection,$address)."',
                            '".mysqli_real_escape_string($connection,$bus_stop)."'
                        ) ");
                    $studentID = 0;
                    $payStatus = "";
                    $getStudentID = mysqli_query($connection, "SELECT id FROM fs_student ORDER BY id DESC LIMIT 1");
                    if(mysqli_num_rows($getStudentID)>0){
                        $id =mysqli_fetch_assoc($getStudentID);
                        $studentID = $id['id'];
                        if($balance==0 || $balance==null || $balance==""){
                            $payStatus ="PAID";
                        }else {
                            $payStatus ="PART";
                        }
                        

                        $insertOthername = mysqli_query($connection, "INSERT INTO fs_student_othername(
                            othername, 
                            student_id
                            )
                            VALUES(
                                '".mysqli_real_escape_string($connection, $othername)."',
                                '".mysqli_real_escape_string($connection,$studentID)."'
                            ) ");

                            $insertEmail = mysqli_query($connection, "INSERT INTO fs_student_email(
                                email, 
                                student_id
                                )
                                VALUES(
                                    '".mysqli_real_escape_string($connection, $email)."',
                                    '".mysqli_real_escape_string($connection,$studentID)."'
                                ) ");
                                $insertRegistration = mysqli_query($connection, "INSERT INTO registration(
                                    student_id,
                                    date_reg,
                                    payment_status,
                                    fs_session
                                    )
                                    VALUES(
                                        '".mysqli_real_escape_string($connection, $studentID)."',
                                        '".mysqli_real_escape_string($connection,$regDate)."',
                                        '".mysqli_real_escape_string($connection, $payStatus)."',
                                        '".mysqli_real_escape_string($connection,$fs_session)."'
                                    )  ") or die(mysqli_error($connection));
                                $insertPayments = mysqli_query($connection, "INSERT INTO fs_payments( 
                                    student_id,
                                    amount_paid,
                                    balance,
                                    payment_date
                                    )
                                    VALUES(
                                        '".mysqli_real_escape_string($connection, $studentID)."',
                                        '".mysqli_real_escape_string($connection,$amountPaid)."',
                                        '".mysqli_real_escape_string($connection, $balance)."',
                                        '".mysqli_real_escape_string($connection,$regDate)."'
                                    ) ");
                    }
                
                if($insertRegistration){
                    echo "Registration Successful";
                }else{
                    echo "Registration Failed";
                }
            }
    }

?>