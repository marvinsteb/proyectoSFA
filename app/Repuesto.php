<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'repuesto';
    protected $primaryKey = 'idrepuesto';
    public $timestamps = false;
    protected $fillable = 
    [
    	'idtiporeparacion',
        'descripcion',
        'estado',
        'existencias',
        'idvehiculo'
    ];
    protected $guarded = [
       
    ];    
}
