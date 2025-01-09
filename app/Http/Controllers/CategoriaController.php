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
    public function index()
    {
        $categoria= DB::table('categoria as ct')
            ->join('clase as cl','ct.CLA_Id','=','cl.CLA_Id')
            ->select('ct.*','cl.CLA_Nombre')
            ->get();
        $clase=Clase::all();
        return view('categoria.index',['Categoria'=>$categoria,'Clase'=>$clase]);
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
       
        $categoria=new Categoria();
        $categoria->CAT_Nombre=$request->CAT_Nombre;
        $categoria->CLA_Id=$request->CLA_Id;
        $categoria->save();
        return redirect()->route('categoria.index')
        ;
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
