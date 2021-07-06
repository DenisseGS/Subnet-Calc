<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MascaraIP extends Model
{
    protected $table = 'mascaraIP';
    
    protected $primaryKey = 'IDMascaraIP';
    
    protected $fillable = array('Valor');
    
    public $timestamps = false;
}
