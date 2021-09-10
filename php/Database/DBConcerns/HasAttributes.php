<?php

trait HasAttributes{

    protected $attributes ="";

    public function getTableAttributes($table,$connection){
        $result = $connection->query('SHOW COLUMNS FROM'.$table);
        if($result->num_rows>0){
            $fields =[];
            $index=0;
            while($rows = $result->fetch_assoc()){
                $fields[$index] = $rows['Field'];
                $index++;
            }
            return $fields;
        }
    }

    public function setAttribute($value){
        $this->attributes .= $value;
    }

    public function getAttribute(){
        return $this->attributes;
    }
}