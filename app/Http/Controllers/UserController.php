<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;

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
}
