<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compra';
    protected $primaryKey='COM_Id';
    public $timestamps=false;
    protected $fillable=[
        'COM_TipoDocumento',
        'COM_NumDocumento',
        'COM_TipoPago',
        'MEP_Id',
        'PROV_Id',
        'COM_Status'
    ];
    protected $guarded=[];
}
