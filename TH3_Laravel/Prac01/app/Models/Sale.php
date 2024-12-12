<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['medicine_id', 'quantity', 'sale_date', 'customer_phone'];
    //Tạo quan hệ với bảng medicine
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}