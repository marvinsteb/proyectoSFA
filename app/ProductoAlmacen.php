<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
    protected $table = 'producto_almacen';
    protected $primaryKey = 'idprodalmacen';
    public $timestamps = false;
    protected $fillabe = 
    [
     'id_inve',
     'id_almacen',
     'existencia',
    ];
    protected $guarded =
    [

    ];
}
