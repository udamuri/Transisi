<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
     * Get the validation rules that apply to the request.s
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => [
                'required',
                'max:200',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:employees',
            ],
			'company_id' => [
                'required',
                'exists:companies,id',
            ],
        ];

        if ($this->getMethod() == 'PUT') {
            $rules['email'] = [
                'required',
                'email',
				'max:255',
                Rule::unique('employees')->ignore($this->employee),
            ];
        }

        return $rules;
    }

    /**
    * Get custom attributes for validator errors.
    *
    * @return array
    */
    public function attributes()
    {
        $attributes = [
            'name' => 'Name',
            'email' => 'Email',
            'companies_id' => 'Company ID',
        ];

        return $attributes;
    }
}
