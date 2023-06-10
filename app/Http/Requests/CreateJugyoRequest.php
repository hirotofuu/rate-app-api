<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJugyoRequest extends FormRequest
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
        return [
            'class_name'=>['required', 'max:30'],
            'teacher_name'=>['required', 'max:30'],
            'field'=>['max:30'],
            'url'=>['max:100'],
            'content'=>['max:500'],
            ];
    }

    public function messages()
    {
        return [

            ];

    }
}
