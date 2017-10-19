<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';
    protected $primaryKey = 'idvehiculo';
    public $timestamps = false;
    protected $fillable = 
    [
        'idmarca',
        'idmodelo',
        'costo',
        'precio',
        'anio',
        'llave',
        'numpuertas',
        'lote',
        'idcombustible',
        'descripcion',
        'idcolor',
        'estado',
        'tipomotor',
    ];
    protected $guarded = [
       
    ];  
}
