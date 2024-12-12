<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = ['computer_name','model','operating_system','processor','memory','available'];
    //Tạo mối quan hệ với bảng Issues
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}