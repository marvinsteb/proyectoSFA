<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
            'descripcion'=>'required|max:250',
            'unidad'=>'required|max:20',
            'idcategoria'=>'required',
        ];
    }
}
