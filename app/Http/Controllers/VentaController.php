<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('Venta as pd')
                ->join('categoria as ct', 'pd.CAT_Id', '=', 'ct.CAT_Id')
                ->select('pd.*', 'ct.CAT_Nombre')
                ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->PRO_Id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editVenta" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->PRO_Id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteVenta"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action1', 'action2'])
                ->make(true);
        }

        $categorias = DB::table('categoria')->get();
        return view('Venta.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clase = DB::table('clase')->orderBy('CLA_Nombre', 'asc')->get();
        $categoria = DB::table('categoria')->orderBy('CAT_Nombre', 'asc')->get();
        $clientes = DB::table('cliente')->orderBy('CLI_NumDocumento', 'asc')->get();
        $metodo_pago = DB::table('metodo_pago')->orderBy('MEP_Pago', 'asc')->get();


        $lotesproductos = DB::table('lote as lt')
            ->join('almacen as a', 'a.ALM_Id', '=', 'lt.ALM_Id')
            ->join('producto as p', 'p.PRO_Id', '=', 'lt.PRO_Id')
            ->join('categoria as cat', 'cat.CAT_Id', '=', 'p.CAT_Id')
            ->join('clase as cl', 'cl.CLA_Id', '=', 'cat.CLA_Id')
            ->select('a.ALM_Id', 'p.PRO_Id', 'p.PRO_Nombre', 'p.CAT_Id as CATEGORIA', 'cl.CLA_Nombre as Clase', 'cat.CAT_Nombre as Clase', DB::raw('sum(lt.LOT_CantidadReal) as PRO_Cantidad'), DB::raw('max(lt.LOT_PrecioVenta) as PRO_PrecioBaseVenta'), DB::raw('max(lt.LOT_PrecioCompra)'), 'a.ALM_Id', 'a.ALM_Nombre', DB::raw('SUM(lt.LOT_CantidadReal) as LOT_CantidadReal'))
            ->where('lt.LOT_CantidadReal', '>', 0)
            ->where('p.PRO_Status', '=', 1)
            ->groupBy('a.ALM_Id', 'p.PRO_Id', 'p.PRO_Nombre', 'p.PRO_Marca', 'p.CAT_Id', 'cat.CAT_Nombre', 'cl.CLA_Nombre','a.ALM_Id', 'a.ALM_Nombre')
            ->get();
        // dd($lotesproductos);
        Cache::put('listaProductos', $lotesproductos);
        $lotesuni = Cache::get('listaProductos');

        return view('gestion.venta.create', compact('clase','categoria','clientes','metodo_pago','lotesuni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = Venta::where('PRO_Nombre', '=', $request->get('PRO_Nombre'))->get();
        if ($query->count() != 0) //si lo encuentra, osea si no esta vacia
        {
            return response()->json(['error' => 'Venta ya registrado'], 401);
        } else {
            $Venta = new Venta();
            $Venta->PRO_Nombre = $request->PRO_Nombre;
            $Venta->PRO_Descripcion = $request->PRO_Descripcion;
            $Venta->PRO_PrecioCompra = $request->PRO_PrecioCompra;
            $Venta->PRO_PrecioVenta = $request->PRO_PrecioVenta;
            $Venta->PRO_Marca = $request->PRO_Marca;
            $Venta->PRO_Status = $request->PRO_Status ?? 1;
            $Venta->CAT_Id = $request->CAT_Id;
            $Venta->save();
            return response()->json(['success' => 'Venta Registrado Exitosamente!', compact('Venta')]);
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
        $Venta = Venta::find($id);
        return response()->json(['data' => $Venta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Venta = Venta::find($id);
        $Venta->PRO_Nombre = $request->PRO_Nombre;
        $Venta->PRO_Descripcion = $request->PRO_Descripcion;
        $Venta->PRO_PrecioCompra = $request->PRO_PrecioCompra;
        $Venta->PRO_PrecioVenta = $request->PRO_PrecioVenta;
        $Venta->PRO_Marca = $request->PRO_Marca;
        $Venta->PRO_Status = $request->PRO_Status ?? 1;
        $Venta->CAT_Id = $request->CAT_Id;
		$Venta->update();

        return response()->json(['success' => 'Venta Editado Exitosamente.',compact('Venta')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Venta = Venta::find($id);
        $Venta->delete();
        return response()->json(['success' => 'Venta Eliminado Exitosamente.']);
    }
}
