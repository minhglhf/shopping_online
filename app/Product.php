<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'user_id', 'category_id', 'content', 'id', 'feature_image_name', 'feature_image_path',
    ];

    public function images(){
        return $this->hasMany('App\ProductImage', 'product_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag', 'product_tags', 'product_id',
            'tag_id')->withTimestamps();
    }

}
