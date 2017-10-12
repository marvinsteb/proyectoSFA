<?php

namespace proyectoSeminario;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    protected $primaryKey = 'idmodelo';
    public $timestamps = false;
    protected $fillable = 
    [
        'modelo'

    ];
    protected $guarded = [
       
    ];  
}
