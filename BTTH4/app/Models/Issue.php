<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['computer_id','reported_by','reported_date','description','urgency','status'];
    public $timestamps = false;
    //Tạo mối quan hệ với bảng computer=>đặt tên phương thức theo chuẩn quan hệ 1-n
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}