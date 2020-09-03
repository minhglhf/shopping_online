<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request){
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passwood),
        ]);

        $roleIds = $request->role_id;
        $user->roles()->attach($roleIds);

        return redirect()->route('users.index');

//        foreach($roleIds as $roleId){
//            DB::table('role_user')->insert([
//                'role_id' => $roleId,
//                'user_id' => $user->id,
//            ]);
//
//        }

    }
}
