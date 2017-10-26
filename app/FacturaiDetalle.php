<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class FacturaiDetalle extends Model
{
    protected $table = 'facturaimportdetalle';
    protected $primaryKey = 'idfacturaimportdetalle';
    public $timestams = false;
    protected $filleable = [
        'idfacturaimport',
        'id_vehiculo',
        'precio',
        'subtotal'
    ];
    
}
