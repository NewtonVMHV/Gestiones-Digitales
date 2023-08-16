<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCiudadanosRequest;
use App\Http\Requests\UpdateCiudadanosRequest;
use App\Models\tCiudadanos;
use App\Http\Controllers\Controller;
use App\Models\tDistritos;
use App\Models\tLocalidades;
use App\Models\tMunicipios;
use App\Models\tSecciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TCiudadanosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:ciudadanos-list|ciudadanos-create|ciudadanos-edit|ciudadanos-delete', ['only' => ['index','store']]);
        $this->middleware('permission:ciudadanos-create', ['only' => ['create','store']]);
        $this->middleware('permission:ciudadanos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ciudadanos-delete', ['only' => ['eliminar','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchCiudadano;
        $tCiudadanos = tCiudadanos::where('Curp','LIKE','%'.$search.'%')->Orwhere('Nombres','LIKE','%'.$search.'%')->paginate(10);
        return view('Ciudadanos.index', compact('tCiudadanos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $municipio = tMunicipios::all();
        $distrito = tDistritos::all();
        $localidad = tLocalidades::all();
        $secciones = tSecciones::all();
        return view('Ciudadanos.create', compact('municipio','distrito','localidad','secciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiudadanosRequest $request)
    {
        //
        $tCiudadanos = tCiudadanos::create([
           'Curp' => $request->Curp,
            'Nombres'=> $request->Nombres,
            'Apellidos'=> $request->Apellidos,
            'Direccion' => $request->Direccion,
            'Colonia' => $request->Colonia,
            'Codigop' => $request->Codigop,
            'Seccion' => $request->Seccion,
            'Localidad' => $request->Localidad,
            'Municipio' => $request->Municipio,
            'Distrito' => $request->Distrito,
            'Celular' => $request->Celular
        ]);

        return redirect('/Ciudadano')->with('success','Ciudadano creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tCiudadanos $tCiudadnos)
    {
        //
        return view('Ciudadanos.show', compact('tCiudadnos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tCiudadanos $tCiudadnos)
    {
        //
        $municipio = tMunicipios::all();
        $distrito = tDistritos::all();
        $localidad = tLocalidades::all();
        $secciones = tSecciones::all();
        return view('Ciudadanos.edit', compact('tCiudadnos','municipio','distrito','localidad','secciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiudadanosRequest $request, tCiudadanos $tCiudadnos)
    {
        //
        $tCiudadnos->update([
            'Curp' => $request->Curp,
            'Nombres'=> $request->Nombres,
            'Apellidos'=> $request->Apellidos,
            'Direccion' => $request->Direccion,
            'Colonia' => $request->Colonia,
            'Codigop' => $request->Codigop,
            'Seccion' => $request->Seccion,
            'Localidad' => $request->Localidad,
            'Municipio' => $request->Municipio,
            'Distrito' => $request->Distrito,
            'Celular' => $request->Celular
        ]);

        return redirect('/Ciudadano')->with('success','Ciudadano actualizado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function eliminar(tCiudadanos $tCiudadnos)
    {
        //
        return view('Ciudadanos.eliminar', compact('tCiudadnos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tCiudadanos $tCiudadnos)
    {
        //
        $tCiudadnos->delete();
        return redirect('/Ciudadano')->with('success','Ciudadano eliminado exitosamente');
    }
}
