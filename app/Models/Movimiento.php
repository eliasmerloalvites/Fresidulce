<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimiento';
    protected $primaryKey='idmovimiento';
    public $timestamps=false;
    protected $fillable=[
    	'tipo',
    	'idcv'
    ];
    
    protected $guarded =[

    ];
}
