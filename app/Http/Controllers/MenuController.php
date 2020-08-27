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


    public function index()
    {
        $menus = $this->menu->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $optionHtml = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.add', compact('optionHtml'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),

        ]);

        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $menus = $this->menu->find($id);
        $optionHtml = $this->menuRecursive->menuRecursiveEdit($menus->parent_id);
        return view('admin.menus.edit', compact('menus', 'optionHtml'));
    }

    public function update($id, Request $request)
    {
        $menus = $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $data = $this->menuRecursive->getChild($id);

        foreach ($data as $value) {
            $this->menu->find($value->id)->delete();
        }
        $this->menu->find($id)->delete();

        return redirect()->route('menus.index');
    }


//    public function deleteChildIfDeleteParent($parentId = 0, $text = ''){
////        $data = Menu::where('parent_id', $parentId)->get();
////        foreach ($data as $value){
////            $this->list .= $value->id . '--';
////            $this->deleteChildIfDeleteParent($value->id);
////        }
//
//        $data = Menu::where('parent_id', $parentId)->get();
//        foreach ($data as $value) {
//            $this->list .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
//            $this->deleteChildIfDeleteParent($value->id, $text . '-');
//        }
//
//       echo "<pre>";
//        var_dump($this->list);
//        die;
//    }

    public function restore(){
        Menu::withTrashed()
            ->restore();
    }

    public function setPass(){
        echo bcrypt('superasus');
    }

}
