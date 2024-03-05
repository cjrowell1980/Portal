<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobsRequest extends FormRequest
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
            'number'        => 'required',
            'machine'       => 'required',
            'number'        => 'required',
            'fault'         => 'required',
            'contactName'   => 'required',
            'contactNo'     => 'required',
            'status_1'      => 'required',
            'status_2'      => 'required',
            'status_3'      => 'required',
            'status_4'      => 'required',
            'status'        => 'required',
        ];
    }
}
