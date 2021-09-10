<?php
require ('Model.php');
class Student extends Model{
    protected $table = "fs_student";
    protected $fillable =[
        'title',
        'reg_number',
        'surname',
        'firstname',
        'mobile',
        'sex',
        'dob',
        'marital_status',
        's_address',
        'bus_stop'
    ];

}
