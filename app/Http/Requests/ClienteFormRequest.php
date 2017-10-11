<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class ClienteFormRequest extends Request
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
        'direccion'=>'required|max:250',
        'telefono'=>'required|max:50',
        'nit'=>'required|max:50',
        'correo'=>'required|max:100',
        ];
    }
}
