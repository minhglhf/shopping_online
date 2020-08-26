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

    public function categoryRecursive($id = 0, $text = '')
    {
        $data = $this->data;
        foreach ($data as $value) {
            if ($value->parent_id == $id) {
                $this->showCategory .= '<option value="'. $value->id .'">' . $text . $value->name . '</option>';
                $this->categoryRecursive($value->id, $text . '-');
            }
        }

        return $this->showCategory;
    }
}
