<?php

trait ManageAttributes {

    /**
     * Attributes on the database table representing the model
     * @var array
     */
    protected $fillable=[];
    protected $tableAttributes=[];

    /**
     * Set the fillable array representing the attributes.
     * @param array $attributes
     * @return $this
     */
    public function setFillable(array $attributes){
        $this->fillable = $attributes;

        return $this;
    }

    /**
     * Get the fillable array for the attributes of the table
     * representing the model
     * @return array
     */
    public function getFillable(){
        return $this->fillable;
    }

    public function isFillable($key){
        if(!in_array($key, $this->tableAttributes)){
            return false;
        }
        return true;
    }
}