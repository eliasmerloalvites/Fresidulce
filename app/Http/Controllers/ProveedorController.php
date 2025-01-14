<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('proveedor as prov')
                ->select('prov.*')
                ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-identificador="' . $row->PROV_Id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProveedor" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->PROV_Id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProveedor"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->addColumn('action3', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->PROV_Id . '" data-original-title="Ver" class="btn btn-warning btn-sm eyeProveedor"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action1', 'action2','action3'])
                ->make(true);
        }
        return view('administracion.proveedor.index');
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
        $query = Proveedor::where('PROV_NumDocumento', '=', $request->get('PROV_NumDocumento'))->get();
        if ($query->count() != 0) //si lo encuentra, osea si no esta vacia
        {

            return response()->json(['error' => 'Proveedor ya se encuentra registrado'], 401);
        } else {
            $Proveedor = new Proveedor();
            $Proveedor->PROV_TipoDocumento = $request->PROV_TipoDocumento;
            $Proveedor->PROV_NumDocumento = $request->PROV_NumDocumento;
            $Proveedor->PROV_RazonSocial = $request->PROV_RazonSocial;
            $Proveedor->PROV_Direccion = $request->PROV_Direccion;
            $Proveedor->PROV_Descripcion = $request->PROV_Descripcion;
            $Proveedor->PROV_Celular = $request->PROV_Celular;
            $Proveedor->PROV_Correo = $request->PROV_Correo;
            $Proveedor->PROV_Status = $request->PROV_Status ?? 1;
            $Proveedor->save();
            return response()->json(['success' => 'Proveedor Registrado Exitosamente!', compact('Proveedor')]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Proveedor = Proveedor::find($id);

        return response()->json(['data' => $Proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Proveedor = Proveedor::find($id);
        return response()->json(['data' => $Proveedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Proveedor = Proveedor::find($id);
        $Proveedor->PROV_TipoDocumento = $request->PROV_TipoDocumento;
        $Proveedor->PROV_NumDocumento = $request->PROV_NumDocumento;
        $Proveedor->PROV_RazonSocial = $request->PROV_RazonSocial;
        $Proveedor->PROV_Direccion = $request->PROV_Direccion;
        $Proveedor->PROV_Descripcion = $request->PROV_Descripcion;
        $Proveedor->PROV_Celular = $request->PROV_Celular;
        $Proveedor->PROV_Correo = $request->PROV_Correo;
        $Proveedor->update();

        return response()->json(['success' => 'Proveedor Editado Exitosamente.', compact('Proveedor')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Proveedor = Proveedor::find($id);
        $Proveedor->delete();
        return response()->json(['success' => 'Proveedor Eliminado Exitosamente.']);
    }
}
