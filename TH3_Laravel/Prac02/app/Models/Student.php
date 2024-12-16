<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'parent_phone', 'class_id'];
    public function class(){
        //Một học sinh chỉ thuộc một lớp học=>để tham chiếu truy cập thuộc tính của lớp classes
        return $this->belongsTo(Classes::class);
    }
}