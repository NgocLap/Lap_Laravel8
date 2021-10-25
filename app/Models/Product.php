<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use SoftDeletes;
    protected $fillable = ['name', 'price','slug','feature_image_path',
    'content','user_id','category_id'] ;
}
