<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $model = 'sliders';

    protected $fillable = [
        'id', 'name', 'description',  'image_name', 'image_path',
    ];
}
