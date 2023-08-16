<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDistritacionRequest;
use App\Http\Requests\UpdateDistritacionRequest;
use App\Models\tDistritacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TDistritacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:distritacion-list|distritacion-create|distritacion-edit|distritacion-delete', ['only' => ['index','store']]);
        $this->middleware('permission:distritacion-create', ['only' => ['create','store']]);
        $this->middleware('permission:distritacion-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:distritacion-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->SearchAcuerdo;
        $tDistritacion = tDistritacion::where('Acuerdo','LIKE','%'.$search.'%')->paginate(10);
        return view('Distritacion.index', compact('tDistritacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Distritacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDistritacionRequest $request)
    {
        //
        $tDistritacion = tDistritacion::create([
            'Acuerdo' => $request->Acuerdo,
            'Fecha' => $request->Fecha,
            'Observaciones' => $request->Observaciones
        ]);

        return redirect('/Distritacion')->with('success', 'Distritación creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tDistritacion $tDistritacion)
    {
        //
        return view('Distritacion.show', compact('tDistritacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tDistritacion $tDistritacion)
    {
        //
        return view('Distritacion.edit', compact('tDistritacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistritacionRequest $request, tDistritacion $tDistritacion)
    {
        //
        $tDistritacion->update([
           'Acuerdo' => $request->Acuerdo,
           'Fecha' => $request->Fecha,
           'Observaciones' => $request->Observaciones
        ]);

        return redirect('Distritacion')->with('success','Distritación actualizado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function eliminar(tDistritacion $tDistritacion)
    {
        //
        return view('Distritacion.eliminar', compact('tDistritacion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tDistritacion $tDistritacion)
    {
        //
        $tDistritacion->delete();
        return redirect('Distritacion')->with('success','Distritación eliminado exitosamente');
    }
}
