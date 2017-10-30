<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class ReparacionDetalle extends Model
{
    protected $table='reparacion_detalle';
    protected $primaryKey = 'idreparacion_detalle';
    public $timestamps = false ;
    protected $fillable = [
         'idreparacion',
         'cantidad',
         'costo',
         'descripcion',
    ];
    protected $guarded = [
        
    ]; 
}
