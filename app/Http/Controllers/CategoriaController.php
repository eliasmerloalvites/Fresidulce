<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
			$data = DB::table('categoria as ct')
			->join('clase as cl','ct.CLA_Id','=','cl.CLA_Id')
            ->select('ct.*','cl.CLA_Nombre')
            ->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action1', function ($row) {
                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->CAT_Id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCategoria" ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('action2', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->CAT_Id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategoria"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
               
                ->rawColumns(['action1','action2'])
                ->make(true);
        }

        $clases = DB::table('clase')->get();
        return view('administracion.categoria.index', compact('clases'));
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
        $query=Categoria::where('CAT_Nombre','=',$request->get('CAT_Nombre'))->get();
        if($query->count()!=0) //si lo encuentra, osea si no esta vacia
        {
            
            return response()->json(['error' => 'Categoria ya registrado'], 401);                   
        }
        else{
            $categoria=new Categoria();
            $categoria->CAT_Nombre=$request->CAT_Nombre;
            $categoria->CLA_Id=$request->CLA_Id;
            $categoria->save();
            return response()->json(['success' => 'Categoria Registrado Exitosamente!',compact('categoria')]);    
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
        $categoria = Categoria::find($id);
        return response()->json(['data' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->CAT_Nombre = $request->CAT_Nombre;
        $categoria->CLA_Id = $request->CLA_Id;
		$categoria->update();

        return response()->json(['success' => 'Categoria Editado Exitosamente.',compact('categoria')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return response()->json(['success' => 'Categoria Eliminado Exitosamente.']);
    }
}
