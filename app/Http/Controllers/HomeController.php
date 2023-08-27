<?php

namespace App\Http\Controllers;

use App\Models\tCiudadanos;
use App\Models\tSecciones;
use App\Models\tDiputados;
use App\Models\tSolicitud;
use App\Models\tLocalidades;
use App\Models\tMunicipios;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudRequest;
use App\Models\Gestiones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $secciones = tSecciones::count();
        $diputados = tDiputados::count();
        $solicitud = tSolicitud::count();
        $localidades = tLocalidades::count();
        $municipios = tMunicipios::count();
        $ciudadanos = tCiudadanos::count();
        $tCiudadanos = tCiudadanos::paginate(10);
        return view('home', compact('tCiudadanos','secciones','diputados','solicitud','localidades','municipios','ciudadanos'));
    }

    public function create(){
        $gestiones = Gestiones::where('estado','1')->get();
        return view('solicitud', compact('gestiones'));
    }

    public function store(storeSolicitudRequest $request){
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

        return back()->with('success','Solicitud enviada exitosamente');
    }
}
