<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;//Fachada para utilizar Query Builder
use App\Municipio;
use App\Departamento;
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio as c')
                    ->join('tb_departamento','c.depa_codi','=','tb_departamento.depa_codi')
                    ->select('c.muni_codi','c.muni_nomb','c.muni_codi','tb_departamento.depa_nomb')
                    ->get();
        return view('municipio.index', compact('municipios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $municipios = Municipio::orderBy('muni_nomb')->get();
        return view('municipio.create',compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $municipio = new Municipio;
        //$flight->name = $request->name
        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->muni_codi = $request->muni_codi;
        $municipio->save();
        return redirect()->route('municipio.index')->with('status','guardado');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipios = Municipio::all();
        return view('municipio.edit', compact('municipio','municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->fill($request->all());
        $municipio->save();
        return redirect()->route('municipio.index')->with('status','actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return redirect()->route('municipio.index')->with('status','eliminado');
    }
}

