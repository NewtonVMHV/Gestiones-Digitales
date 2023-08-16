<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeccionesRequest;
use App\Http\Requests\UpdateSeccionesRequest;
use App\Models\tDistritacion;
use App\Models\tDistritos;
use App\Models\tMunicipios;
use App\Models\tSecciones;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TSeccionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:secciones-list|secciones-create|secciones-edit|secciones-delete', ['only' => ['index','store']]);
        $this->middleware('permission:secciones-create', ['only' => ['create','store']]);
        $this->middleware('permission:secciones-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:secciones-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchSeccion;
        $tSecciones = tSecciones::where('Seccion','LIKE','%'.$search.'%')->paginate(10);
        return view('Secciones.index', compact('tSecciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $distritos = tDistritos::all();
        $distritacion = tDistritacion::all();
        $municipios = tMunicipios::all();
        return view('secciones.create', compact('distritos','distritacion','municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeccionesRequest $request)
    {
        //
        $tSecciones = tSecciones::create([
           'Seccion' => $request->Secciones,
           'Distrito' => $request->Distrito,
           'Municipio' => $request->Municipio,
           'Distritacion' => $request->Distritacion,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Secciones')->with('success','Sección creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tSecciones $tSecciones)
    {
        //
        return view('Secciones.show', compact('tSecciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tSecciones $tSecciones)
    {
        //
        $distritos = tDistritos::all();
        $distritacion = tDistritacion::all();
        $municipios = tMunicipios::all();
        return view('Secciones.edit', compact('tSecciones','distritos','distritacion','municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeccionesRequest $request, tSecciones $tSecciones)
    {
        //
        $tSecciones->update([
            'Seccion' => $request->Secciones,
            'Distrito' => $request->Distrito,
            'Municipio' => $request->Municipio,
            'Distritacion' => $request->Distritacion,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Secciones')->with('success','Sección actualizado exirtosamente');
    }

    /**
     * Display the specified resource.
     */
    public function eliminar(tSecciones $tSecciones)
    {
        //
        return view('Secciones.eliminar', compact('tSecciones'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tSecciones $tSecciones)
    {
        //
        $tSecciones->delete();
        return redirect('/Secciones')->with('success','Sección eliminado exitosamente');
    }
}
