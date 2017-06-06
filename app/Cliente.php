<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idcliente';
    public $timestamps = false;
    protected $fillabe = 
    [
        'estado',
        'nombre',
        'direccion',
        'telefono',
        'nit',
        'correo',
        'fecha_creacion',
        'saldo',
    ];
    protected $guarded =
    [

    ];
}
