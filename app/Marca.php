<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $primaryKey = 'idmarca';
    public $timestamps = false;
    protected $fillable = 
    [
        'nombreMarca',
        'descripcion',
        'status'

    ];
    protected $guarded = [
       
    ];  
}
