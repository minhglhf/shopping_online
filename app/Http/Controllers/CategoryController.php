<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $optionHtml = $this->getCategory($parentId = '');
        return view('category.add', compact('optionHtml'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $optionHtml = $recursive->categoryRecursive($parentId);
        return $optionHtml;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $optionHtml = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'optionHtml'));
    }

    public function update($id, Request $request)
    {
        $category = $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
//        $data = $this->recursive->getChild($id);
//
//        foreach ($data as $value) {
//            $this->category->find($value->id)->delete();
//        }
//        $this->category->find($id)->delete();
//
//        return redirect()->route('categories.index');
    }

}
