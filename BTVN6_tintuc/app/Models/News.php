<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image','created_at', 'category_id'];
    public $timestamps = false;//vô hiệu hoá tự động cập nhật 2 cột created_at và updated_at
    public function category(){
        return $this->belongsTo(Category::class);//Một bản tin thuộc về một danh mục
    }
}