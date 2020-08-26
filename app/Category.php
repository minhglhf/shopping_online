<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
//    use Notifiable;
//
//    protected $table = 'categories';
//    protected $primaryKey = 'id';
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
    protected $fillable = [
        'name', 'parent_id', 'slug'
    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
//
//    /**
//     * The attributes that should be cast to native types.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
