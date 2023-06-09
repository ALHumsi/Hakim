<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required|image',
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'email' => 'required|email|unique:patients',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric|min:10',
            'address' => 'required'
        ];
    }
}
