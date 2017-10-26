<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Facturai extends Model
{
    protected $table = 'facturaimport';
    protected $primaryKey = 'idfactura';
    public $timestamps = false;
    protected $filleable = [
                            'nofactura',
                            'estado',
                            'fecha_documento',
                            'fecha_creacion',
                            'proveedor_id',
                            'total'
                        ];
}
