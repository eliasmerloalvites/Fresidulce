<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
			$data = DB::table('producto as pd')
			->join('categoria as ct','pd.CAT_Id','=','ct.CAT_Id')
            ->select('pd.*','ct.CAT_Nombre')
            ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->PRO_Id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPermiso" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->PRO_Id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePermiso"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
               
                ->rawColumns(['action1','action2'])
                ->make(true);
        }

        $categorias = DB::table('categoria')->get();
        return view('producto.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto=new Producto();
        $producto->PRO_Nombre=$request->PRO_Nombre;
        $producto->PRO_Descripcion=$request->PRO_Descripcion;
        $producto->PRO_PrecioCompra=$request->PRO_PrecioCompra;
        $producto->PRO_PrecioVenta=$request->PRO_PrecioVenta;
        $producto->PRO_Marca=$request->PRO_Marca;
        $producto->PRO_Status=$request->PRO_Status;
        $producto->CAT_Id=$request->CAT_Id;
        $producto->save();
        return redirect()->route('producto.index');
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
