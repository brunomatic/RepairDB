<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
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

        return [
            'notes' => 'string',
            'parts.*.description' => 'string|max:255',
            'parts.*.serial_number' => 'string|max:255|unique:parts',
            'parts.*.manufacturer' => 'string|max:255',
            'parts.*.type.*' => 'string|max:255',
        ];
    }
}
