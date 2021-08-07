<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Promotion_Request extends FormRequest
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
        $rules = [];
        $rules['promo_title'] = 'required|max:120';
        $rules['category'] = 'required';
        $rules['remark'] = 'max:50|nullable';
        return $rules;

    }
}
