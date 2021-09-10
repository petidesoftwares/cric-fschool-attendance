<?php
require ('Model.php');
class Teacher extends Model {
    protected $table = 'teacher';
    protected $fillable =[
        'title',
        'surname',
        'firstname',
        'mobile',
        'sex',
        'fs_session'
    ];
}