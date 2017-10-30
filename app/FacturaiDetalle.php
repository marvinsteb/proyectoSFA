<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class FacturaiDetalle extends Model
{
    protected $table = 'facturaimportdetalle';
    protected $primaryKey = 'idfacturaimportdetalle';
    public $timestamps = false ;
    protected $filleable = [
        'idfacturaimport',
        'id_vehiculo',
        'precio',
        'subtotal'
    ];
    
}
