<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BodegaRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'numero_documento' => 'required|digits_between:8,11',
            'razon_social' =>'required|max:50',
            'telefono' => 'required|digits_between:7,9',
            'web' => 'required|max:255',
            'email' => 'required|string|email|max:255',
            'direccion' => 'required|max:60',
        ];
    }
}
