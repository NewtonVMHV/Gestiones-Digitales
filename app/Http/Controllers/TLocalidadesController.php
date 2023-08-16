<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalidadesRequest;
use App\Models\tLocalidades;
use App\Http\Controllers\Controller;
use App\Models\tMunicipios;
use Illuminate\Http\Request;

class TLocalidadesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:localidades-list|localidades-create|localidades-edit|localidades-delete', ['only' => ['index','store']]);
        $this->middleware('permission:localidades-create', ['only' => ['create','store']]);
        $this->middleware('permission:localidades-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:localidades-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchLocalidades;
        $tLocalidades = tLocalidades::where('NombreLoc','LIKE','%'.$search.'%')->paginate(10);
        return view('Localidades.index', compact('tLocalidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $municipios = tMunicipios::all();
        return view('Localidades.create', compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocalidadesRequest $request)
    {
        //
        $tLocalidades = tLocalidades::create([
            'NombreLoc' => $request->NombreLoc,
            'Municipio' => $request->Municipio,
            'Obseraciones' => $request->Observaciones
        ]);

        return redirect('/Localidades')->with('success','Localidad creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tLocalidades $tLocalidades)
    {
        //
        return view('Localidades.show', compact('tLocalidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tLocalidades $tLocalidades)
    {
        //
        $municipios = tMunicipios::all();
        return view('Localidades.edit', compact('tLocalidades','municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tLocalidades $tLocalidades)
    {
        //
        $tLocalidades->update([
            'NombreLoc' => $request->NombreLoc,
            'Municipio' => $request->Municipio,
            'Observaciones' => $request->Observaciones
        ]);

        return redirect('/Localidades')->with('success','Localidad actualizado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function eliminar(tLocalidades $tLocalidades)
    {
        //
        return view('Localidades.eliminar', compact('tLocalidades'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tLocalidades $tLocalidades)
    {
        //
        $tLocalidades->delete();
        return redirect('/Localidades')->with('success','Localidad eliminado exitosamente');
    }
}
