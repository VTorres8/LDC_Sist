<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyRequest extends FormRequest
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
            'Nombre_Sala' => 'bail|required|max:20',
            'numero_maquinas' => 'bail|required|numeric|digits_between:1,3'
            //
        ];
    }

    public function messages()
    {
        return[
            'Nombre_Sala.required' => 'El campo Nombre es requerido.',
            'numero_maquinas.required' => 'El campo Cantidad Maquinas es requerido.',
            'numero_maquinas.numeric' => 'El campo Cantidad Maquinas debe ser numerico.',
            'Nombre_Sala.max' => 'El campo Nombre puede tener maximo 20 caracteres',
            'numero_maquinas.digits_between' => 'El campo Cantidad Maquinas debe ser de maximo 3 digitos es requerido.'


        ];
    }    
}
