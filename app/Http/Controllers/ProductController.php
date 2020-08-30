<?php

namespace App\Http\Controllers;

use App\ProductImage;
use App\ProductTag;
use App\Tag;
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
    private $productImage;
    private $productTag;
    private $tag;

    public function __construct(Category $category, Product $product, ProductImage $productImage,
                                ProductTag $productTag, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $product->tag = $tag;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
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

    public function store(Request $request)
    {

        $productCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,

        ];
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');

        if (!empty($dataUpload)) {
            $productCreate['feature_image_name'] = $dataUpload['file_name'];
            $productCreate['feature_image_path'] = $dataUpload['file_path'];
        }
        $product = $this->product->create($productCreate);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                $product->images()->create([
                    'image_name' => $dataProductImageDetail['file_name'],
                    'image_path' => $dataProductImageDetail['file_path'],
                ]);

            }
        }
    }
}
