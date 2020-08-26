<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $showCategory;

    public function __construct()
    {
        $this->showCategory = '';
    }

    public function index(){
        return view('category.index');

    }

    public function create(){
        //
        $category = $this->categoryRecursive(0);
        return view('category.add', compact('category'));
    }

    public function categoryRecursive($id){
        $data = Category::all();
        foreach($data as $value){
            if($value->parent_id == $id){
                $this->showCategory .= '<option>' . $value->name . '</option>';
                $this->categoryRecursive($value->id);
            }
        }

        return $this->showCategory;
    }
}
