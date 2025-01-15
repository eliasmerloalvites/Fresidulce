<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table='detalle_compra';
    protected $primaryKey='DCOM_Id';
    public $timestamps=false;
    protected $fillable=[
        'COM_Id',
        'ALM_Id',
        'PRO_Id',
        'DCOM_Cantidad',
        'DCOM_PrecioCompra',
        'DCOM_PrecioVenta'
    ];
    protected $guarded=[];

}
