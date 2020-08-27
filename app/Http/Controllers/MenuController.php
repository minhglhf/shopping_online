<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecursive;

class MenuController extends Controller
{
    private $menuRecursive;

    public function __construct(MenuRecursive $menuRecursive)
    {
        $this->menuRecursive = $menuRecursive;
    }


    public function index(){
        return view('menus.index');
    }

    public function create(){
        $optionHtml = $this->menuRecursive->menuRecursiveAdd();
        return view('menus.add', compact('optionHtml'));
    }

    public function store(){

    }
}
