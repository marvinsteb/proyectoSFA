<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'Color';
    protected $primaryKey = 'idcolor';
    public $timestamps = false;
    protected  $fillable =
        [
            'idcolor',
            'color'
        ];
    protected $guarded =
        [

        ];
    
}
