<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Aduanero extends Model
{
    protected $table = 'aduaneroe';
    protected $primaryKey = 'idaduanero';
    public $timestamps = false;
    protected $fillabe = 
    [
     'descripcion',
     'unidad',
     'estado',
     'idcategoria'
    ];
    protected $guarded =
    [

    ];
}
