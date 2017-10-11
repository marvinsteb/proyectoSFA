<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'idproveedor';
    public $timestamps = false;
    protected $fillabe = 
    [
        'estado',
        'nombre',
        'direccion',
        'ciudad',
        'telefono',
        'nit',
        'correo',
        'fecha_creacion',
        'idtipo',
    ];
    protected $guarded =
    [

    ];
}
