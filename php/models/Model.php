<?php
require ('common/Util.php');
require ('common/ManageAttributes.php');
require ('Database/DBConcerns/HasAttributes.php');
use Connection as Connection;

use Util as Util;


abstract class Model {
    use HasAttributes;
    use ManageAttributes;

    protected $primaryKey ="id";
    protected $table;

    /**
     * Finds and returns the resource matching the given $id
     * @param $id
     * @return mixed|string
     */
    public function find($id){
        $connect = new Connection();
        $conn = $connect->createConnection();
        if ($conn)
            $user = Util::getUserByID($id,$this->getTable(),$conn);
            return $user;

    }

    /**
     * Creates a new record in the storage from the given @param $dataArray.
     * @param $dataArray
     * @return string|void|null
     */
    public function create($dataArray){
        $processedData = "";
        if(is_array($dataArray)){
            foreach ($dataArray as $key=>$value){
                foreach ($this->fillable as $fillableData){
                    if ($key=== $fillableData){
                        if (!is_numeric($value) && !is_bool($value) && $value !== end($dataArray)){
                            $processedData .="'".$value."', ";
                        }elseif ((is_numeric($value) || is_bool($value)) && $value !== end($dataArray)){
                            $processedData .=$value.", ";
                        }elseif (!is_numeric($value) && !is_bool($value) && $value === end($dataArray)){
                            $processedData .="'".$value."' ";
                        }elseif ((is_numeric($value) || is_bool($value)) && $value === end($dataArray)){
                            $processedData .=$value;
                        }else{
                            return;
                        }
                    }
                }
            }
        }
        $connect = new Connection();
        $conn = $connect->createConnection();
        $resp=null;
        if ($conn)
            $resp = Util::insert($processedData,$this->getTable(),$this->fill($dataArray),$conn);
        $connect->closeConnection($conn);
        return $resp;
    }

    /**
     * This gets the name of the model that extends this class.
     * @return string
     */
    public function getTable(){
        if($this->table === null){
            return strtolower(get_class($this))."s";
        }
        return $this->table;
    }

    /**
     * Set the database query attributes from model properties
     * @param array $attributes
     * @return string
     */
    public function fill(array $attributes){
        $connect = new Connection();
        $conn = $connect->createConnection();
        $this->tableAttributes = $this->getTableAttributes($this->getTable(),$conn);

        foreach ($this->fillable as $key){
            if($this->isfillable($key)){
                foreach ($attributes as $index=>$value){
                    if ($key === $index){
                        if($key !== end($this->fillable)){
                            $this->setAttribute($key.", ");
                        }else{
                            $this->setAttribute($key);
                        }
                    }else{
                        if($this->getDefaultAttributeValue()===NULL){
                            if($key !== end($this->fillable)){
                                $this->setAttribute($key.", ");
                            }else{
                                $this->setAttribute($key);
                            }
                        }
                    }
                }

            }
        }
        $connect->closeConnection($conn);
        return $this->getAttribute();
    }

    /**
     * It gets the default attribute or field value from storage
     * @return mixed
     */
    public function getDefaultAttributeValue(){
        $connect = new Connection();
        $conn = $connect->createConnection();
        return Util::getDefaultValue($this->getTable(),"bus_stop",$conn);
    }
}