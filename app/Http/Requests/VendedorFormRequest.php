<?php

namespace proyectoSFA\Http\Requests;

use proyectoSFA\Http\Requests\Request;

class VendedorFormRequest extends Request
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
        'nombre'=>'required|max:250',
        'correo'=>'required|max:100',
        'telefono'=>'required|max:50',
        ];
    }
}
