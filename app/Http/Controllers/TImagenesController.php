<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImagnesRequest;
use App\Http\Requests\UpdateImagenesRequest;
use App\Models\tImagenes;
use App\Models\tCiudadanos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TImagenesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:imagenes-list|imagenes-create|imagenes-edit|imagnes-delete', ['only' => ['index','store']]);
        $this->middleware('permission:imagenes-create', ['only' => ['create','store']]);
        $this->middleware('permission:imagnes-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:imagenes-delete', ['only' => ['eliminar','destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->SearchCurp;
        $tImagenes = tImagenes::where('Curp','LIKE','%'.$search.'%')->paginate(10);
        return view('Imagenes.index', compact('tImagenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasfile('fotografia')|$request->hasfile('inea')|$request->hasfile('inef')) {
            # code...
            $fotografia = $request->file('fotografia');
            $nombreimagen1 = time().'_'.$fotografia->getClientOriginalName();
            $fotografia->move(public_path('ciudadanos/'),$nombreimagen1);

            $inea = $request->file('inea');
            $nombreimagen2 = time().'_'.$inea->getClientOriginalName();
            $inea->move(public_path('credencial/'),$nombreimagen2);

            $inef = $request->file('inef');
            $nombreimagen3 = time().'_'.$inef->getClientOriginalName();
            $inef->move(public_path('credencial/'),$nombreimagen3);

            $tImagenes = tImagenes::create([
                'Curp' => $request->Curp,
                'Nombres' => $request->Nombres,
                'Apellidos' => $request->Apellidos,
                'fotografia'=>$nombreimagen1,
                'inef' => $nombreimagen3,
                'inea' => $nombreimagen2,
                'domicilio' => $request->domicilio
            ]);
        }

        return redirect('/Imagenes')->with('success','Informacion enviada exitosamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(tImagenes $tImagenes)
    {
        //
        return view('Imagenes.show', compact('tImagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tImagenes $tImagenes)
    {
        //
        return view('Imagenes.edit', compact('tImagenes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tImagenes $tImagenes)
    {
        //
        if ($request->hasfile('fotografia')|$request->hasfile('inea')|$request->hasfile('inef')) {
            if(File::exists('ciudadanos/'.$tImagenes->fotografia)){
                File::delete('ciudadanos/'.$tImagenes->fotografia);
            }

            if (File::exists('credencial/'.$tImagenes->inea)) {
                # code...
                File::delete('credencial/'.$tImagenes->inea);
            }

            if (File::exists('credencial/'.$tImagenes->inef)) {
                # code...
                File::delete('credencial/'.$tImagenes->inef);
            }

            $fotografia = $request->file('fotografia');
            $nombreimagen1 = time().'_'.$fotografia->getClientOriginalName();
            $fotografia->move(public_path('ciudadanos/'),$nombreimagen1);

            $inea = $request->file('inea');
            $nombreimagen2 = time().'_'.$inea->getClientOriginalName();
            $inea->move(public_path('credencial/'),$nombreimagen2);

            $inef = $request->file('inef');
            $nombreimagen3 = time().'_'.$inef->getClientOriginalName();
            $inef->move(public_path('credencial/'),$nombreimagen3);

            $tImagenes->update([
                'fotografia'=>$nombreimagen1,
                'inef' => $nombreimagen3,
                'inea' => $nombreimagen2,
                'domicilio' => $request->domicilio
            ]);

        }

        return redirect('/Imagenes')->with('success','Informacion actualizada exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function eliminar(tImagenes $tImagenes)
    {
        //
        return view('Imagenes.eliminar', compact('tImagenes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tImagenes $tImagenes)
    {
        //
        if(File::exists('ciudadanos/'.$tImagenes->fotografia)){
            File::delete('ciudadanos/'.$tImagenes->fotografia);
        }

        if (File::exists('credencial/'.$tImagenes->inea)) {
            # code...
            File::delete('credencial/'.$tImagenes->inea);
        }

        if (File::exists('credencial/'.$tImagenes->inef)) {
            # code...
            File::delete('credencial/'.$tImagenes->inef);
        }
        $tImagenes->delete();
        return redirect('/Imagenes')->with('success','Información eliminada exitosamente');
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
                $valores['Domicilio'] = $consulta['Direccion'];
            }

            sleep(1);
            return  response()->json($valores); 
        }
    }
}
