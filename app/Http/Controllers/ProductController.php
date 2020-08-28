<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recursive;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use App\Components\MenuRecursive;

class ProductController extends Controller
{
    private $category;
    private $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        $optionHtml = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('optionHtml'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $optionHtml = $recursive->categoryRecursive($parentId);
        return $optionHtml;
    }
}
