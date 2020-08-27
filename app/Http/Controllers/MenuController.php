<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Components\MenuRecursive;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }


    public function index(){
        $menus = $this->menu->paginate(5);
        return view('menus.index', compact('menus'));
    }

    public function create(){
        $optionHtml = $this->menuRecursive->menuRecursiveAdd();
        return view('menus.add', compact('optionHtml'));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('menus.index');
    }
}
