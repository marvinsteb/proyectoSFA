<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Embarque extends Model
{
    protected $table = 'embarque';
    protected $primaryKey = 'idembarque';
    public $timestamps =  false;
    protected $fillable = [
        'barcoviaje',
        'lugarorigen',
        'fechaarribo',
        'descripcion',
        'numerocontenedor',
        'fletemariitimo',
        'trasporteinterno',
        'valordocumentacion',
        'total',
        'cargoservicio',
        'idvehiculo'
    ];
    protected $guarded = [];
}
