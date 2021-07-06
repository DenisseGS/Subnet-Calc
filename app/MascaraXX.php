<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MascaraXX extends Model
{
    protected $table = 'mascara/XX';
    
    protected $primaryKey = 'IDMascaraXX';
    
    protected $fillable = array('Valor');
    
    public $timestamps = false;
    
}
