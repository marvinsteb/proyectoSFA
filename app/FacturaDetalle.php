<?php

namespace proyectoSFA;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $table='fac_detalle';

    protected $primaryKey = 'idfac_detalle';

    public $timestamps = false ;
    protected $fillable = [
         'idfactura',
         'id_inv',
         'id_almacen',
         'cantidad',
         'precio',
         'impuesto',
        
    ];
    protected $guarded = [
        'subtotal',
    ]; 
}
