<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceCreateRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {

       //TODO: fix unique constraint on validation - works but it is dodgy as fuck
        return [
            'manufacturer' => 'string|required|max:255',
            'client_name' => 'exists:clients,name|string|max:255',
            'type' => 'string|required|max:255',
            'serial_number' => 'string|required|max:255|unique:devices,serial_number,'.$this->route()->parameters()['device']->id,
            'model' => 'string|required|max:255',
            'notes' => 'string',
        ];
    }
}
