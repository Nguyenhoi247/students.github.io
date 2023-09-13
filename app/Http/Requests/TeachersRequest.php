<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {

        // $isCreate = ($request->input('action') === 'create2');
        // $rules =  [
        //     'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required',
        // ];

        // $specifiRules = $isCreate
        // ? [
        //     'create_form.first_name' => 'required',
        //     'create_form.last_name' => 'required',
        //     'create_form.email' => 'required',
        // ]
        // :[
        //     'update_form.first_name' => 'required',
        //     'update_form.last_name' => 'required',
        //     'update_form.email' => 'required',
        // ];
        // return array_merge($rules, $specifiRules);
            
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
            ];
        // ];
        // if(!$isCreate) {
        //     $rules += [
        //         'update_form.first_name' => 'required',
        //         'update_form.last_name' => 'required',
        //         'update_form.email' => 'required',
        //     ];
        // }else {
        //     $rules += [
        //     'create_form.first_name' => 'required',
        //     'create_form.last_name' => 'required',
        //     'create_form.email' => 'required',
        //     ];
        // }
        // return $rules;
    }
    public function messages(): array
    {
       return [
            'first_name' => 'First Name is required',
            'last_name' => 'Last Name is required',
            'email' => 'Email is required',

            'update_form.first_name.required' => 'First Name is required',
            'update_form.last_name.required' => 'Last Name is required',
            'update_form.email.required' => 'Email is required',

            'create_form.first_name.required' => 'First Name is required',
            'create_form.last_name.required' => 'Last Name is required',
            'create_form.email.required' => 'Email is required',
        
       ];
    }
   
}

