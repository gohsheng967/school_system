<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreate_Request extends FormRequest
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
            $rules ['student_id'] = 'required|integer|max:99999';
            $rules ['entry_date'] =  'required';
            $rules ['entry_level'] =  'required';
            $rules ['student_type'] =  'required';
            $rules ['name_chi'] =  'required|max:50|string';
            $rules ['name_eng'] =  'required|max:100|string';
            $rules ['sex'] =  'required';
            $rules ['hair_color'] =  'required';
            $rules ['sex'] =  'required';
            $rules ['birth_no'] =  'required|max:15';
            $rules ['identity_no'] =  'required';
            $rules ['student_birth_date'] =  'required';
            $rules ['race'] =  'required|max:10|string';
            $rules ['religion'] =  'required|max:10|string';
            $rules ['country'] =  'required|max:50|string';
            $rules ['home_address'] =  'required|max:150';
            $rules ['primary_school'] =  'required|max:100';
            $rules ['graduate_year'] =  'required';
            $rules ['primary_grade'] =  'required|max:3|string';
            $rules ['main_contact'] =  'required';
            $rules ['primary_malay_comprehensive'] =  'max:3|nullable';
            $rules ['primary_malay_essay'] =  'max:3|nullable';
            $rules ['primary_english_comprehensive'] =  'max:3|nullable';
            $rules ['primary_english_essay'] =  'max:3|nullable';
            $rules ['primary_math'] =  'max:3|nullable';
            $rules ['primary_chinese_comprehensive'] =  'max:3|nullable';
            $rules ['primary_chinese_essay'] =  'max:3|nullable';
            $rules ['primary_sains'] =  'max:3|nullable';
            $rules ['primary_mark'] =  'max:100|integer|nullable';
            $rules ['personal_phone'] =  'nullable|integer';
            $rules ['personal_email'] =  'nullable|email';
            $rules ['secondary_school'] =  'nullable|string';
            $rules ['change_year'] =  'nullable';
            $rules ['secondary_grade'] =  'nullable|string';

            


            if($this->main_contact == "父亲"){
                $rules['father_chiname'] = 'required|string|max:20';
                $rules['father_engname'] = 'required|string|max:100';
                $rules['father_identity'] = 'required';
                $rules['father_contact'] = 'required|integer';
                $rules['father_edulevel'] = 'required';
                $rules['father_email'] = 'nullable|email';
                $rules['father_occupation'] = 'required|string|max:60';
            }else if($this->attributes->get('father_chiname') != null || $this->attributes->get('father_engname') != null || $this->attributes->get('father_identity') != null){
                $rules['father_chiname'] = 'required|string|max:20';
                $rules['father_engname'] = 'required|string|max:100';
                $rules['father_identity'] = 'required';
                $rules['father_contact'] = 'required|integer';
                $rules['father_email'] = 'nullable|email';
                $rules['father_edulevel'] = 'required';
                $rules['father_occupation'] = 'required|string|max:60';
            }else if($this->attributes->get('father_contact') != null || $this->attributes->get('father_edulevel') != null || $this->attributes->get('father_occupation') != null){
                $rules['father_chiname'] = 'required|string|max:20';
                $rules['father_engname'] = 'required|string|max:100';
                $rules['father_identity'] = 'required';
                $rules['father_contact'] = 'required|integer';
                $rules['father_email'] = 'nullable|email';
                $rules['father_edulevel'] = 'required';
                $rules['father_occupation'] = 'required|string|max:60';
            }else{
                $rules['father_chiname'] = 'nullable|string|max:20';
                $rules['father_engname'] = 'nullable|string|max:100';
                $rules['father_identity'] = 'nullable|integer';
                $rules['father_contact'] = 'nullable|integer';
                $rules['father_edulevel'] = 'nullable';
                $rules['father_email'] = 'nullable|email';
                $rules['father_occupation'] = 'nullable|string|max:60';
            }

            if($this->main_contact =='母亲'){
                $rules['mother_chiname'] = 'required|string|max:20';
                $rules['mother_engname'] = 'required|string|max:100';
                $rules['mother_identity'] = 'required';
                $rules['mother_contact'] = 'required|integer';
                $rules['mother_email'] = 'nullable|email';
                $rules['mother_edulevel'] = 'required';
                $rules['mother_occupation'] = 'required|string|max:60';
            }else if($this->attributes->get('mother_chiname') != null || $this->attributes->get('mother_engname') != null || $this->attributes->get('mother_identity') != null){
                $rules['mother_chiname'] = 'required|string|max:20';
                $rules['mother_engname'] = 'required|string|max:100';
                $rules['mother_identity'] = 'required';
                $rules['mother_contact'] = 'required|integer';
                $rules['mother_edulevel'] = 'required';
                $rules['mother_occupation'] = 'required|string|max:60';
                $rules['mother_email'] = 'nullable|email';

            }else if($this->attributes->get('mother_contact') != null || $this->attributes->get('mother_edulevel') != null || $this->attributes->get('mother_occupation') != null){
                $rules['mother_chiname'] = 'required|string|max:20';
                $rules['mother_engname'] = 'required|string|max:100';
                $rules['mother_identity'] = 'required';
                $rules['mother_contact'] = 'required|integer';
                $rules['mother_edulevel'] = 'required';
                $rules['mother_occupation'] = 'required|string|max:60';
                $rules['mother_email'] = 'nullable|email';

            }else{
                $rules['mother_chiname'] = 'nullable|string|max:20';
                $rules['mother_engname'] = 'nullable|string|max:100';
                $rules['mother_identity'] = 'nullable';
                $rules['mother_contact'] = 'nullable|integer';
                $rules['mother_edulevel'] = 'nullable';
                $rules['mother_occupation'] = 'nullable|string|max:60';
                $rules['mother_email'] = 'nullable|email';

            }


            if($this->main_contact =='监护人'){
                $rules['guardian_chiname'] = 'required|string|max:20';
                $rules['guardian_engname'] = 'required|string|max:100';
                $rules['guardian_identity'] = 'required';
                $rules['guardian_contact'] = 'required|integer';
                $rules['guardian_edulevel'] = 'required';
                $rules['guardian_occupation'] = 'required|string|max:60';
                $rules['guardian_email'] = 'nullable|email';

            }else if($this->attributes->get('guardian_chiname') != null || $this->attributes->get('guardian_engname') != null || $this->attributes->get('guardian_identity') != null){
                $rules['guardian_chiname'] = 'required|string|max:20';
                $rules['guardian_engname'] = 'required|string|max:100';
                $rules['guardian_identity'] = 'required';
                $rules['guardian_contact'] = 'required|integer';
                $rules['guardian_edulevel'] = 'required';
                $rules['guardian_occupation'] = 'required|string|max:60';
                $rules['guardian_email'] = 'nullable|email';

            }else if($this->attributes->get('mother_contact') != null || $this->attributes->get('guardian_edulevel') != null || $this->attributes->get('guardian_occupation') != null){
                $rules['guardian_chiname'] = 'required|string|max:20';
                $rules['guardian_engname'] = 'required|string|max:100';
                $rules['guardian_identity'] = 'required';
                $rules['guardian_contact'] = 'required|integer';
                $rules['guardian_edulevel'] = 'required';
                $rules['guardian_occupation'] = 'required|string|max:60';
                $rules['guardian_email'] = 'nullable|email';

            }else{
                $rules['guardian_chiname'] = 'nullable|string|max:20';
                $rules['guardian_engname'] = 'nullable|string|max:100';
                $rules['guardian_identity'] = 'nullable';
                $rules['guardian_contact'] = 'nullable|integer';
                $rules['guardian_edulevel'] = 'nullable';
                $rules['guardian_occupation'] = 'nullable|string|max:60';
                $rules['guardian_email'] = 'nullable|email';

            }





        return $rules;
    }
    public function messages()
    {
        return [


        ];
    }
}
