<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// validation comment

class CommentRequest extends FormRequest
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
            'name'=>['max:50'],
            'comment'=>['required', 'max:150'],
            ];
    }

    public function messages()
    {
        return [

            ];

    }
}
