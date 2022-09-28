<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class EmployeeRegistrationRequest extends FormRequest

{

    public function rules()
    {
        return [

            'emp_id' => 'required|unique:employees|max:255|min:6',
            'first_name' => 'required|max:255|min:2',
            'last_name' => 'required|max:255|min:2',
            'designation_id' => 'required|integer',
            'department_id' => 'required|integer',
            'join_date' => 'required|date',
            'passport_number' => 'required|max:255|min:2',
            'country_id' => 'required|integer'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'User Input Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'emp_id.unique' => 'Employee ID must be unique'
        ];
    }
}