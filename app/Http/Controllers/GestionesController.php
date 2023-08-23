<?php

namespace App\Http\Controllers;

use App\Models\Gestiones;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGestionesRequest;
use App\Http\Requests\UpdateGestionesRequest;

class GestionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gestiones = Gestiones::paginate(10);
        return view('Gestiones.index', compact('gestiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Gestiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGestionesRequest $request)
    {
        //
        Gestiones::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado
        ]);

        return redirect('/Gestiones')->with('success','Tipo de gestión creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gestiones $gestiones)
    {
        return view('Gestiones.show', compact('gestiones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gestiones $gestiones)
    {
        //
        return view('Gestiones.edit', compact('gestiones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGestionesRequest $request, Gestiones $gestiones)
    {
        //
        $gestiones->update([
            'nombre' => $request->nombre,
            'estado' => $request->estado
        ]);

        return redirect('/Gestiones')->with('success','Tipo de Gestion actualizado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function eliminar(Gestiones $gestiones)
    {
        //
        return view('Gestiones.eliminar', compact('gestiones'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gestiones $gestiones)
    {
        //
        $gestiones->delete();
        return redirect('/Gestiones')->with('success','Tipo de Gestión eliminado exitosamente');
    }
}
