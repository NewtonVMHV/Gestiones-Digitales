<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\tSolicitud;
use App\Models\tCiudadanos;
use App\Models\Gestiones;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class TSolicitudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:solicitud-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:solicitud-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchSolicitud;
        $tSolicitud = tSolicitud::paginate(10);
        return view('Solicitudes.index', compact('tSolicitud'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contador = 0;
        $tSolicitud = tSolicitud::all();
        $gestiones = Gestiones::where('estado','1')->get();
        foreach($tSolicitud as $id){
            $contador = $contador + 1;
        }
        $contador = 'BAHZ-'.'000'.$contador+1;
        
        return view('Solicitudes.create', compact('contador','gestiones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolicitudRequest $request)
    {
        //
        $tSolicitud = tSolicitud::create([
            'tipo_gestion' => $request->tipo_gestion,
            'Nombres' => $request->Nombres,
            'Apellidos' => $request->Apellidos,
            'FechaSol' => $request->FechaSol,
            'Solicitud' => $request->Solicitud,
            'Observaciones' => $request->Observaciones,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Solicitudes')->with('success','Solicitud creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(tSolicitud $tSolicitud)
    {
        //
        return view('Solicitudes.show', compact('tSolicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tSolicitud $tSolicitud)
    {
        //
        $gestiones = Gestiones::where('estado','1')->get();
        return view('Solicitudes.edit', compact('tSolicitud','gestiones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolicitudRequest $request, tSolicitud $tSolicitud)
    {
        //
        $tSolicitud->update([
            'tipo_gestion' => $request->tipo_gestion,
            'Nombres' => $request->Nombres,
            'Apellidos' => $request->Apellidos,
            'FechaSol' => $request->FechaSol,
            'Solicitud' => $request->Solicitud,
            'Observaciones' => $request->Observaciones,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'Estatus' => $request->Estatus
        ]);

        return redirect('/Solicitudes')->with('success','Solicitud actualizado exitosamente');
    }

     /**
     * Display the specified resource.
     */
    public function eliminar(tSolicitud $tSolicitud)
    {
        //
        return view('Solicitudes.eliminar', compact('tSolicitud'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tSolicitud $tSolicitud)
    {
        //
        $tSolicitud->delete();
        return redirect('Solicitudes')->with('success','Solicitud eliminado exitosamente');
    }

    public function autocomplete(Request $request){
        $searchCurp = $_GET['curp'];
        $valores = array();
        $valores['existe'] = 0;

        $resultados = tCiudadanos::where('Curp',$searchCurp)->get();
        if (isset($_GET['buscar'])) {
            foreach ($resultados as $consulta) {
                $valores['existe'] = "1";
                $valores['Nombres'] = $consulta['Nombres'];
                $valores['Apellidos'] = $consulta['Apellidos'];
            }

            sleep(1);
            return  response()->json($valores); 
        }
    }

    public function exportar(tSolicitud $tSolicitud){
        $pdf = PDF::loadView('Solicitudes.exportar', compact('tSolicitud'));
        return $pdf->download('Solicitud.pdf');
    }
}
