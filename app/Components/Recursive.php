<?php

namespace App\Components;

use App\Category;

class Recursive
{
    private $data;
    private $showCategory = '';
    private $list = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->list = [];
    }

    public function categoryRecursive($parentId, $id = 0, $text = '')
    {
        $data = $this->data;
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                if (!empty($parentId) && $parentId == $value->id) {
                    $this->showCategory .= '<option selected value="' . $value->id . '">' . $text . $value->name . '</option>';
                } else {
                    $this->showCategory .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
                }
                $this->categoryRecursive($parentId, $value->id, $text . '-');
            }
        }

        return $this->showCategory;
    }

    public function getChild($parentId = 0, $text = '')
    {
        $data = Category::where('parent_id', $parentId)->get();

        foreach ($data as $value) {
            $this->list[] = $value;
            $this->getChild($value->id, $text . '-');
        }

        return $this->list;
    }


}
