<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Classes extends Model
{
    protected $fillable = ['grade_level', 'room_number'];
    //Tạo quan hệ với bảng students
    public function students()
    {
        //Một lớp học có nhiều học sinh
        return $this->hasMany(Student::class);
    }
}