<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'serie';
    protected $primaryKey = 'idserie';
    public $timestamps = false;
    protected $fillabe = 
    [
        'estado',
        'nombre',
        'tipo_documento',
        'serie',
        'resolucion',
        'numero_inicial',
        'numero_final',
        'numero_siguiente',
    ];
    protected $guarded =
    [

    ];
}
