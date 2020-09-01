<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' => 'required'
        ];
    }

    public  function messages()
    {
        return [
            'name.required' => 'Name là bắt buộc',
            'name.unique' => 'Name không được trùng',
            'name.max' => 'Name không được quá 255 kí tự',
            'description.required' => 'description là bắt buộc',
            'image_path.required' => 'image_path là bắt buộc',
        ];

    }
}
