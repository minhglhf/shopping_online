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

    public function store(Request $request){
        $role = $this->role->create([
           'name' => $request->name,
           'display_name' => $request->display_name,
        ]);

        $role->permissions()->attach($request->permission_Id);

        return redirect()->route('roles.index');
    }

    public function edit($id){
        $permissionsParents = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('permissionsParents', 'role', 'permissionsChecked'));
    }

    public function update($id, Request $request){
        $role = $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role = $this->role->find($id);

        $role->permissions()->sync($request->permission_Id);

        return redirect()->route('roles.index');
    }
}
