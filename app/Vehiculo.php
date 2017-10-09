<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';
    protected $primaryKey = 'idvehiculo';
    public $timestamps = false;
    protected $fillable = 
    [
    	'idmarca',
        'modelo',
        'costo',
        'precio',
        'numpuertas',
        'idcombustible',
        'descripcion',
        'idcolor'
    ];
    protected $guarded = [
       
    ];  
}
