<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rangos extends Model
{
    protected $table = 'rangos';
    
    protected $primaryKey = 'IDRango';
    
    protected $fillable = array('DireccionRed', 'HostInicial', 'HostFinal', 'Broadcast');
    
    public $timestamps = false;
}
