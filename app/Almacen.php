<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacen';
    protected $primaryKey = 'idalmacen';
    public $timestamps = false;
    protected $fillable = 
    [
    	'nombre',
    	'ubicacion'
    ];
    protected $guarded = [
       
    ];    
}
