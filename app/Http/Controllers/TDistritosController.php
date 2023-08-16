<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDistritosRequest;
use App\Http\Requests\UpdateDistritosRequest;
use App\Models\tDistritos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TDistritosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:distritos-list|distritos-create|distritos-edit|distritos-delete', ['only' => ['index','store']]);
        $this->middleware('permission:distritos-create', ['only' => ['create','store']]);
        $this->middleware('permission:distritos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:distritos-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        //
        $search = $request->SearchDistrito;
        $tDistritos = tDistritos::where('Nombre','LIKE','%'.$search.'%')->paginate(10);
        return view('Distritos.index', compact('tDistritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Distritos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistritosRequest $request)
    {
        //
        $tDistritos = tDistritos::create([
            'Nombre' => $request->NombreDl,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Distritos')->with('success','Distrito creadoexitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tDistritos $tDistritos)
    {
        //
        return view('Distritos.show', compact('tDistritos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tDistritos $tDistritos)
    {
        //
        return view('Distritos.edit', compact('tDistritos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistritosRequest $request, tDistritos $tDistritos)
    {
        //
        $tDistritos->update([
            'Nombre' => $request->NombreDl,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Distritos')->with('success','Distrito actualizado exitosamente');
    }

    public function eliminar(tDistritos $tDistritos)
    {
        //
        return view('Distritos.eliminar', compact('tDistritos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tDistritos $tDistritos)
    {
        //
        $tDistritos->delete();
        return redirect('/Distritos')->with('success','Distrito eliminado exitosamente');
    }
}
