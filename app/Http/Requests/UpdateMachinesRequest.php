<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMachinesRequest extends FormRequest
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
            'stock'     => [
                'required',
                Rule::unique('machines')->ignore($this->machine->stock, 'stock'),
            ],
            'asset'     => [
                'nullable',
            ],
            'serial'    => [
                'required',
                Rule::unique('machines')->ignore($this->machine->serial, 'serial'),
            ],
            'make'      => [
                'required'
            ],
            'model'     => [
                'required'
            ],
            'yom'       => [
                'required'
            ],
        ];
    }
}

