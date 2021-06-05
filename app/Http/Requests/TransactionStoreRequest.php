<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
            'project_id' => 'required',
            'amount'     => 'required|numeric' ,
            'transaction_mode' => 'required',
            'transaction_note'  =>   'required',
            'payment_date' => 'required|date',
         ];
    }
    public function messages()
    {
        return [
            'project_id.required' => 'project name required',
            'amount.required' => 'amount is required',
            'amount.numeric' => 'amount must be numeric',
            'transaction_mode.required' => 'transaction mode not is required',
            'payment_date.required' => 'payment date is required',
            'transaction_note.required' => 'transaction note is required',
        ];
    }
}
