<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedor';
    protected $primaryKey = 'idvendedor';
    public $timestamps = false;
    protected $fillabe = 
    [
        'estado',
        'nombre',
        'correo',
        'telefono',
        'fecha_creacion',
    ];
    protected $guarded =
    [

    ];

}
