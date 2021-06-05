<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'client_id'      =>  'required|numeric|',
            'project_name'   =>   'required',
            'started_date'    =>    'required|date',
            'delivery_date'   =>    'required|date|after_or_equal:started_date',
            'budget'           =>  'required|regex:/^\d+(\.\d{1,2})?$/', 
            'no_of_developers'  => 'required|numeric',
            
            'status'     => 'required'
        ];
    }
}
