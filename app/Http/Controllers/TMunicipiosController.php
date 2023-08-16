<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMunicipiosRequest;
use App\Http\Requests\UpdateMunicipiosRequest;
use App\Models\tMunicipios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TMunicipiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:municipios-list|municipios-create|municipios-edit|municipios-delete', ['only' => ['index','store']]);
        $this->middleware('permission:municipios-create', ['only' => ['create','store']]);
        $this->middleware('permission:municipios-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:municipios-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchMunicipio;
        $tMunicipios = tMunicipios::where('Municipio','LIKE','%'.$search.'%')->paginate(10);
        return view('Municipios.index', compact('tMunicipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Municipios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMunicipiosRequest $request)
    {
        //
        $tMunicipio = tMunicipios::create([
           'Municipio' => $request->Municipio,
           'Observaciones' => $request->Observaciones
        ]);

        return redirect('/Municipios')->with('success','Municipio creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tMunicipios $tMunicipios)
    {
        //
        return view('Municipios.show', compact('tMunicipios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tMunicipios $tMunicipios)
    {
        //
        return view('Municipios.edit', compact('tMunicipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMunicipiosRequest $request, tMunicipios $tMunicipios)
    {
        //
        $tMunicipios->update([
           'Municipio' => $request->Municipio,
           'Observaciones'=> $request->Observaciones
        ]);

        return redirect('/Municipios')->with('success','Municipio actualizado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function eliminar(tMunicipios $tMunicipios)
    {
        //
        return view('Municipios.eliminar', compact('tMunicipios'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tMunicipios $tMunicipios)
    {
        //
        $tMunicipios->delete();
        return redirect('/Municipios')->with('success','Municipio eliminado exitosamente');
    }
}
