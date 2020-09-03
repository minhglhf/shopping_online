<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'id', 'display_name', 'parent_id', 'content', 'key_code'
    ];

    public function permissionsChildren()
    {
        return $this->hasMany('App\Permission', 'parent_id');
    }
}
