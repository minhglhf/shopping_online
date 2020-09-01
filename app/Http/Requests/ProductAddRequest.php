<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'contents' => 'required',
        ];
    }

    public  function messages()
    {
        return [
            'name.required' => 'Name là bắt buộc',
            'name.unique' => 'Name không được trùng',
            'name.max' => 'Name không được quá 255 kí tự',
            'name.min' => 'Name phải tối thiểu 10 kí tự',
            'price.required' => 'price là bắt buộc',
            'category_id.required' => 'category_id là bắt buộc',
            'user_id.required' => 'user_id là bắt buộc',
            'contents.required' => 'contents là bắt buộc',
        ];

    }
}
