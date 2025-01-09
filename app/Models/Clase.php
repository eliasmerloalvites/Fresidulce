<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clase';
    protected $primaryKey='CLA_Id';
    public $timestamps=false;
    protected $fillable=[
        'CLA_Nombre',
    ];
    
    protected $guarded =[

    ];
}
