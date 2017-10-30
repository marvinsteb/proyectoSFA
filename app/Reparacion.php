<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
        protected $table='reparacion';
        protected $primaryKey = 'idreparacion';
        public $timestamps = false ;
        protected $fillable = [
             'idreparacion',
             'idtiporeparacion',
             'fecha_inicio',
             'fecha_fin',
             'costoestimado',
             'desviacion',
             'costoreal',
             'idvehiculo',
        ];
        protected $guarded = [
            
        ]; 
}
