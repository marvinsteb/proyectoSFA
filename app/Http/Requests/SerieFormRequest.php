<?php

namespace proyectoSeminario\Http\Requests;

use proyectoSeminario\Http\Requests\Request;

class SerieFormRequest extends Request
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
            'tipodocumento' => 'required|max:20',
            'serie' => 'required|max:15',
            'resolucion' => 'required|max:30',           
            'inicial' => 'Integer',
            'final' => 'Integer',
        ];
    }
}
