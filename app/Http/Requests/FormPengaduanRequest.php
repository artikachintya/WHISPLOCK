<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPengaduanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reported_person_name' => [
                'required',
                'min:3',
                'max:100'
            ],
            'incident_time'=> [
                'required',
                'min:2',
                'max:255'
            ],
            'incident_chronology' => [
                'required',
                'min:5'
            ],
            'evidence'=> [
                'required',
                'mimes:jpg,jpeg,png'
            ]

        ];
    }
}
