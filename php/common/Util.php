<?php

class Util{
    public static function getUserByID($id, $table, $connect){
        $queryUser = "SELECT * FROM ".$table." WHERE id = ".$id." ";
        $user = $connect->query($queryUser);
        if($user->num_rows > 0){
            return $user->fetch_assoc();
        }
        return "User not found";
    }

    public static function insert($dataArray, $table, $attributes, $connect){
        $insertQuery = "INSERT INTO ". $table."(".$attributes.") VALUES(".$dataArray.")";
        if ($connect->query($insertQuery)===true){
            return "record created";
        }else{
            return "Error: ".$insertQuery."<br>".$connect->error;
        }
    }

    public static function getDefaultValue($table, $attribute,$connect)
    {
        $queryDefault = 'SELECT COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME="' . $table . '" AND COLUMN_NAME ="' . $attribute . '"';
        $result = $connect->query($queryDefault);
        while ($row = $result->fetch_assoc()) {
            return $row['COLUMN_DEFAULT'];
        }
    }
}