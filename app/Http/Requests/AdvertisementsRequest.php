<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementsRequest extends FormRequest
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
            'adv_company' => 'required|min:2',
            'adv_url' => 'required',
            'adv_position' => 'required',
            'url_company' => 'required',
            'expired_day' => 'required',
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
            'adv_company.required' => 'Bạn không được bỏ trống trường này.',
            'adv_company.min'  => 'Tên thể loại phải nhiều hơn 2 kí tự.',
            'adv_url.required' => 'Bạn không được bỏ trống trường này.',
            'adv_position.required' => 'Bạn không được bỏ trống trường này.',
            'url_company.required' => 'Bạn không được bỏ trống trường này.',
            'expired_day.required' => 'Bạn không được bỏ trống trường này.',
        ];
    }
}
