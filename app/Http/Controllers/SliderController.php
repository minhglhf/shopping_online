<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;

    public  function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }


    public function index(){
        return view('admin.slider.index');
    }

    public function create(){
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request){
        $dataInsert = [
          'name' => $request->name,
          'description' => $request->description,
        ];

        $dataImageSlider = $this->storageTraitUpload($request,'image_path', 'slider');

        if(!empty($dataImageSlider)){
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
        }

        $this->slider->create($dataInsert);
        return redirect()->route('slider.index');
    }
}
