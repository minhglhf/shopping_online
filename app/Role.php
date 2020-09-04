<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'display_name', 'id'
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id',
            'permission_id')->withTimestamps();
    }
}
