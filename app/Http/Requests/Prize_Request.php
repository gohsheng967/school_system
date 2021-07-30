<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Prize_Request extends FormRequest
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
        $rules ['title'] = 'required|string|max:120';
        $rules ['date'] = 'required';
        $rules ['organizer'] = 'required|string|max:120';
        $rules ['group'] = 'required|string|max:80';
        $rules ['level'] = 'required|string|max:80';
        $rules ['id'] = 'required';
        return $rules;

    }
}
