<?php

namespace App\Components;

use App\Menu;

class MenuRecursive
{
    //private $data;
    private $html = '';

    public function __construct()
    {
        // $this->data = $data;
        $this->html = '';
        $this->list = [];
    }

    public function menuRecursiveAdd($parentId = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $value) {
            $this->html .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
            $this->menuRecursiveAdd($value->id, $text . '-');
        }

        return $this->html;
    }

    private $list = [];
    public function getChild($parentId = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();

        foreach ($data as $value) {
            $this->list[] = $value;
            $this->getChild($value->id, $text . '-');
        }

        return $this->list;
    }

    public function menuRecursiveEdit($parentIdMenuEdit, $parentId = 0, $text = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $value) {
            if ($parentIdMenuEdit == $value->id) {
                $this->html .= '<option selected value="' . $value->id . '">' . $text . $value->name . '</option>';
            } else {
                $this->html .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
            }
            $this->menuRecursiveEdit($parentIdMenuEdit, $value->id, $text . '-');
        }

        return $this->html;
    }
}
