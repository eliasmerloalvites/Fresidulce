<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('detalle_compra as dcom')
                ->join('producto as pro', 'pro.PRO_Id', '=', 'dcom.PRO_Id')
                ->join('almacen as alm', 'alm.ALM_Id', '=', 'dcom.ALM_Id')
                ->join('compra as com', 'com.COM_Id', '=', 'dcom.COM_Id')
                ->join('proveedor as prov', 'prov.PROV_Id', '=', 'com.PROV_Id')
                ->join('metodo_pago as mep', 'mep.MEP_Id', '=', 'com.MEP_Id')
                ->select('dcom.*','pro.PRO_Nombre','alm.ALM_Nombre','com.COM_Nombre','prov.PROV_Nombre','mep.MEP_Nombre')
                ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->DCOM_Id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editDcompra" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->DCOM_Id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteDcompra"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->addColumn('action3', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->DCOM_Id . '" data-original-title="Ver" class="btn btn-warning btn-sm eyeDcompra"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action1', 'action2', 'action3'])
                ->make(true);
        }
        $producto= DB::table('producto')->get();
        $almacen= DB::table('almacen')->get();
        $compra= DB::table('compra')->get();
        $proveedor= DB::table('proveedor')->get();
        $metodo_pago= DB::table('metodo_pago')->get();
        return view('gestion.compra.index',compact('producto','almacen','compra','proveedor','metodo_pago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $metodo_pago = DB::table('metodo_pago')->get();
        $producto = DB::table('producto')->get();
        $almacen = DB::table('almacen')->get();
        $proveedor = DB::table('proveedor')->get();
    
        // Pasar las variables a la vista
        return view('gestion.compra.create', compact('metodo_pago', 'producto', 'almacen', 'proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); // Inicia una transacción para asegurar que ambos registros se completen

        try {
            // Registrar la compra
            $compra = new Compra();
            $compra->COM_TipoDocumento = $request->COM_TipoDocumento;
            $compra->COM_NumDocumento = $request->COM_NumDocumento;
            $compra->COM_TipoPago = $request->COM_TipoPago;
            $compra->MEP_Id = $request->MEP_Id;
            $compra->PROV_Id = $request->PROV_Id;
            $compra->COM_Status = $request->COM_Status;
            $compra->save();

            // Registrar los detalles de la compra
            if ($request->has('detalles')) {
                foreach ($request->detalles as $detalle) {
                    $detalleCompra = new DetalleCompra();
                    $detalleCompra->COM_Id = $compra->COM_Id; // Relacionar con la compra recién creada
                    $detalleCompra->PRO_Id = $detalle['PRO_Id'];
                    $detalleCompra->ALM_Id = $detalle['ALM_Id'];
                    $detalleCompra->DCOM_Cantidad = $detalle['DCOM_Cantidad'];
                    $detalleCompra->DCOM_PrecioCompra = $detalle['DCOM_PrecioCompra'];
                    $detalleCompra->DCOM_PrecioVenta = $detalle['DCOM_PrecioVenta'];
                    $detalleCompra->save();
                }
            }

            DB::commit(); // Confirmar la transacción

            return response()->json(['success' => 'Compra y detalles registrados exitosamente!']);
        } catch (\Exception $e) {
            DB::rollBack(); // Revertir la transacción si hay un error
            return response()->json(['error' => 'Error al registrar la compra: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
