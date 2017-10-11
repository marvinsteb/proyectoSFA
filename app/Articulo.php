<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
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
