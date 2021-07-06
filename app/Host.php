<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'host';
    
    protected $primaryKey = 'IDHost';
    
    protected $fillable = array('Valor');
    
    public $timestamps = false;
}
