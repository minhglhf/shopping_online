<?php

namespace App\Components;

use App\Category;

class Recursive
{
    private $data;
    private $showCategory = '';

    public function __construct($data)
    {
        $this->data = $data;
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
}
