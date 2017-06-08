<?php

namespace proyectoSFA\Http\Requests;

use proyectoSFA\Http\Requests\Request;

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
         'cliente_id'=>'required',
         'vendedor_id'=>'required',
         'id_inv'=>'required',
         'id_almacen'=>'required',
         'cantidad'=>'required',
         'precio'=>'required',
         'impuesto'=>'required',
        ];
    }
}
