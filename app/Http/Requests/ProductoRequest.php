<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'codigo' => 'required|max:13',
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:200',
            'precio' => 'required|numeric|between:0,1000',
            'stock_minimo' => 'nullable|numeric',
        ];
    }
}
