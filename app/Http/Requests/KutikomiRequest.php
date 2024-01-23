<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// validation Kutikomi

class KutikomiRequest extends FormRequest
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
            'attend'=>['required'],
            'type'=>['required'],
            'day'=>['required'],
            'text'=>['required'],
            'test'=>['required','max:500'],
            'comment'=>['required','max:500'],
            'task'=>['required','max:50'],
            'evaluate'=>['required'],
            'rate'=>['required'],
            'jugyo_id'=>['required'],

            ];
    }

    public function messages()
    {
        return [

            ];

    }
}
