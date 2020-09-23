<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicidadRequest extends FormRequest
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
            'empresa' => 'required|between:5,90',
            'inicio' => 'required|max:50',
            'fin' => 'required|max:50',
            'imagen' => 'required',
        ];
    }
}
