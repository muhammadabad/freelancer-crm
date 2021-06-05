<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'email' => 'required|email',
            'client_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'contact_number' => 'required|numeric|digits_between:10,12',
            'referenced_by' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
        ];
    }
}
