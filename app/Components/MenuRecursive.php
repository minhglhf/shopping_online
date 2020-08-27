<?php

namespace App\Components;

use App\Menu;

class MenuRecursive{
    //private $data;
    private $html = '';

    public function __construct()
    {
       // $this->data = $data;
        $this->html = '';
    }

    public function menuRecursiveAdd($parentId = 0, $text = ''){
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $value){
            $this->html .=  '<option value="'.$value->id .'">' . $text . $value->name . '</option>';
            $this->menuRecursiveAdd($value->id, $text . '-');
        }

        return $this->html;
    }
}
