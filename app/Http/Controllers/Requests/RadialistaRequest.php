<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadialistaRequest extends FormRequest
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
            'nome' => 'required|min:5',
            'sobrenome' => 'required',
            'data_nascimeto' => 'required',
            'sexo' => 'required',
            'email' => 'required',
            'telefone' => 'required|numeric',
        ];
    }
}
