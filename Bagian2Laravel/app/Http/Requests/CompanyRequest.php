<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
                'unique:companies',
            ],
			'website' => [
                'required',
                'url',
                'max:255',
            ],
			'logo' => [
				'required',
				'image',
				'mimes:png',
				'dimensions:min_width=100,min_height=100',
				'max:2048',
			]
        ];

        if ($this->getMethod() == 'PUT') {
            $rules['email'] = [
                'required',
                'email',
				'max:255',
                Rule::unique('companies')->ignore($this->company),
            ];

			$rules['logo'] = [
                'nullable',
				'image',
				'mimes:png',
				'dimensions:min_width=100,min_height=100',
				'max:2048',
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
            'website' => 'Website',
            'logo' => 'Company Logo',
        ];

        return $attributes;
    }
}
