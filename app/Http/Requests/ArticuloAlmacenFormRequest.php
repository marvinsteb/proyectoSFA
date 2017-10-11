<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class ArticuloAlmacenFormRequest extends Request
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
            'id_inve'=>'required',
            'id_almacen'=>'required',
            'existencia'=>'required',
        ];
    }
}
