<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subred extends Model
{
    protected $table = 'subred';
    
    protected $primaryKey = 'IDSubred';
    
    protected $fillable = array('Valor');
    
    public $timestamps = false;
}
