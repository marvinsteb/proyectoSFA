<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class FacturaFormRequest extends Request
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
         'codigoserie'=>'required',
         'fecha_documento'=>'required',
         'clienteid'=>'required',
         'vendedorid'=>'required',
         'idinv'=>'required',
         'idalmacen'=>'required',
         'cantidad'=>'required',
         'precio'=>'required',
         'impuesto'=>'required',
        ];
    }
}
