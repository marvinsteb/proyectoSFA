<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class EmbarqueFormRequest extends Request
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
            'barcoviaje'=>'required',
            'lugarorigen'=>'required',
            'idvehiculo'=>'required',
            'fechaarribo'=>'required',
            'descripcion'=>'required',
            'numcontenedor'=>'required',
            'fletemaritimo'=>'required',
            'transporteinterno'=>'required',
            'valordocumentacion'=>'required',
            'cargoservicio'=>'required',          
        ];
    }
}
