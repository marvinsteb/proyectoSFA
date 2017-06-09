<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table='factura';

    protected $primaryKey = 'idfactura';

    public $timestamps = false ;
    protected $fillable = [
         'numero_fac',
         'codigo_serie',
         'estado',
         'fecha_documento',
         'fecha_creacion',
         'cliente_id',
         'vendedor_id',
         'total',

    ];
    protected $guarded = [
        
        
    ]; 
}
