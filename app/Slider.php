<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'id', 'name', 'description',  'image_name', 'image_path',
    ];
}
