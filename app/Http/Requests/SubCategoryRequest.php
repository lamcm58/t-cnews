<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'sub_category_name' => 'required|unique:sub_categories|min:2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return  array
     */
    public function messages()
    {
        return [
            'sub_category_name.required' => 'Bạn không được bỏ trống trường này.',
            'sub_category_name.unique'  => 'Tên loại tin đã tồn tại.',
            'sub_category_name.min'  => 'Tên loại tin phải nhiều hơn 2 kí tự.',
        ];
    }
}
