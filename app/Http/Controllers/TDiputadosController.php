<?php

namespace App\Http\Controllers;

use App\Models\tDistritos;
use App\Models\tDiputados;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiputadosRequest;
use App\Http\Requests\UpdateDiputadosRequest;

class TDiputadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:diputados-list|diputados-create|diputados-edit|diputados-delete', ['only' => ['index','store']]);
        $this->middleware('permission:diputados-create', ['only' => ['create','store']]);
        $this->middleware('permission:diputados-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:diputados-delete', ['only' => ['eliminar','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchDiputado;
        $tDiputados = tDiputados::where('NombreDl','LIKE','%'.$search.'%')->Orwhere('ApellidoDl','LIKE','%'.$search.'%')->paginate(10);
        return view('Diputados.index', compact('tDiputados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $distritos = tDistritos::all();
        return view('Diputados.create', compact('distritos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiputadosRequest $request)
    {
        //
        $tDiputados = tDiputados::create([
            'Legislatura' => $request->Legislatura,
            'NombreDl' => $request->NombreDl,
            'ApellidoDl' => $request->ApellidoDl,
            'Distrito' => $request->Distrito,
            'Estatus' => $request->Estatus
        ]);
        
        return redirect('/Diputados')->with('success','Diputado creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tDiputados $tDiputados)
    {
        //
        return view('Diputados.show', compact('tDiputados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tDiputados $tDiputados)
    {
        //
        $distritos = tDistritos::all();
        return view('Diputados.edit', compact('tDiputados','distritos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDiputadosRequest $request, tDiputados $tDiputados)
    {
        //
        $tDiputados->update([
            'Legislatura' => $request->Legislatura,
            'NombreDl' => $request->NombreDl,
            'ApellidoDl'=> $request->ApellidoDl,
            'Distrito' => $request->Distrito,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Diputados')->with('success','Diputado actualizado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function eliminar(tDiputados $tDiputados)
    {
        //
        return view('Diputados.eliminar', compact('tDiputados'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tDiputados $tDiputados)
    {
        //
        $tDiputados->delete();
        return redirect('/Diputados')->with('success','Diputado eliminado exitosamente');
    }
}
