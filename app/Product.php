<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'user_id', 'category_id', 'content', 'id', 'feature_image_name', 'feature_image_path',
    ];
}
