<?php

namespace App\Http\Controllers;

use App\Models\tCiudadanos;
use App\Models\tSecciones;
use App\Models\tDiputados;
use App\Models\tSolicitud;
use App\Models\tLocalidades;
use App\Models\tMunicipios;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
}
