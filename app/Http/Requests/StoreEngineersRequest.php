<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEngineersRequest extends FormRequest
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
            'short'     => 'required|unique:engineers,short',
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required',
            'invoice'   => 'required',
            'shipping'  => 'required',
        ];
    }
}
