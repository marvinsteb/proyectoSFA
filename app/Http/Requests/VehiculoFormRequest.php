<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class VehiculoFormRequest extends Request
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
            'idmarca'=>'required',
            'idmodelo'=>'required',
            'precio'=>'required',
            'anio'=>'required',
            'llave'=>'required',
            'numpuertas'=>'required',
            'lote'=>'required',
            'idcombustible'=>'required',
            'idcolor'=>'required',
            'tipomotor'=>'required',
            'descripcion'=>'required'

        ];
    }
}
