<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index(){
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $permissionsParents = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParents'));

    }
}
