<?php
class Connection
{
    private $HOST='localhost';
    private $USER_NAME='root';
    private $PASSWORD = '';
    private $DB='cric_fschool_db';


    public function __construct(){

    }
    public function createConnection(){
        $con = new MySQLi($this->HOST,$this->USER_NAME,$this->PASSWORD, $this->DB);
        if($con->connect_errno){
            die('Connection failed'. $con->connect_error);
        }
        return 'Connection Successful';
    }
    public function closeConnection($con){
        return $con->close();
    }

}