<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255',
            'config_value' => 'required'
        ];
    }

    public  function messages()
    {
        return [
            'config_key.required' => 'config key là bắt buộc',
            'config_key.unique' => 'config key không được trùng lặp',
            'config_key.max' => 'config key không được vượt quá 255 kí tự',
            'config_value.required' => 'config value là bắt buộc',
        ];

    }
}
