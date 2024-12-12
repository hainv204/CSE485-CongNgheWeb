<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'brand', 'dosage', 'form', 'price', 'stock'];
    //Tạo mối quan hệ với bảng sales
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}