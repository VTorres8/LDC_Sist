<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinaRequest extends FormRequest
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
            'ip'=>'bail|required|ip|max:256',
            'sistema_operativo'=>'required|max:20',
            'ram'=>'required|numeric|digits_between:1,3',
            'disco_duro' => 'required|numeric|digits_between:1,5',
            'programas' => 'required|max:500' 
            //
        ];
    }

    public function messages()
    {
        return[
            'ip.required' => 'El campo Ip es requerido.',
            'ip.ip' => 'Ip invalida.',
            'sistema_operativo.required' => 'El campo Sistema Operativo es requerido.',
            'sistema_operativo.max' => 'El campo Sistema Operativo debe tener maximo 20 caracteres.',
            'ram.required' => 'El campo Ram es requerido',
            'ram.digits_between' => 'El campo Ram debe ser de maximo 3 digitos.',
            'ram.numeric' => 'El campo Ram debe ser numerico.',
            'disco_duro.required' => 'El campo Disco Duro es requerido',
            'disco_duro.numeric' => 'El campo Disco Duro debe ser numerico',
            'disco_duro.digits_between' => 'El campo Disco Duro debe ser de maximo 3 digitos.',
            'programas.max' => 'El campo Programas debe ser de maximo 500 caracteres.',
            'programas.required' => 'El campo Programas es requerido.'


        ];
    }    
}
