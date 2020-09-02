<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }
}
