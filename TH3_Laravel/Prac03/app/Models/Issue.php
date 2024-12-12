<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['computer_id','reported_by','reported_date','description','urgency','status'];
    //Tạo mối quan hệ với bảng computers
    public function computers()
    {
        return $this->belongsTo(Computer::class);
    }
}