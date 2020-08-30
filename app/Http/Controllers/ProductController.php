<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Category;
use App\Components\Recursive;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use App\Components\MenuRecursive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{
    use StorageImageTrait;
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

    public function store(Request $request){
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        echo '<pre>';
        var_dump($dataUpload);
        die;
    }
}
