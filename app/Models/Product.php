<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use SoftDeletes;
    protected $fillable = ['name', 'price','slug','feature_image_path','feature_image_name',
    'content','user_id','category_id'] ;

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id','tag_id')->withTimestamps();
    }
}
