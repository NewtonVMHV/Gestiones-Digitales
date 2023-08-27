<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/Solicitud', [App\Http\Controllers\HomeController::class, 'create'])->name('solicitud');
Route::post('/Solicitud', [App\Http\Controllers\HomeController::class, 'store'])->name('solicitud.home.store');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

//Usuarios
Route::get('/Usuarios',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/Usuarios/Agregar', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/Usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/Usuarios/{id}/Editar', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/Usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::get('/Usuarios/{id}/Eliminar', [App\Http\Controllers\UserController::class, 'eliminar'])->name('users.eliminar');
Route::delete('/Usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

//Roles
Route::get('/Roles',[App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/Roles/Agregar', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::post('/Roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/Roles/{id}/Editar', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::put('/Roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::get('/Roles/{id}/Eliminar', [App\Http\Controllers\RoleController::class, 'eliminar'])->name('roles.eliminar');
Route::delete('/Roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

//Distritos
Route::get('/Distritos',[App\Http\Controllers\TDistritosController::class, 'index'])->name('distrito.index');
Route::get('/Distritos/Agregar', [App\Http\Controllers\TDistritosController::class, 'create'])->name('distrito.create');
Route::post('/Distritos', [App\Http\Controllers\TDistritosController::class, 'store'])->name('distrito.store');
Route::get('/Distritos/{tDistritos}/Detalles', [App\Http\Controllers\TDistritosController::class, 'show'])->name('distrito.show');
Route::get('/Distritos/{tDistritos}/Editar', [App\Http\Controllers\TDistritosController::class, 'edit'])->name('distrito.edit');
Route::put('/Distritos/{tDistritos}', [App\Http\Controllers\TDistritosController::class, 'update'])->name('distrito.update');
Route::get('/Distritos/{tDistritos}/Eliminar', [App\Http\Controllers\TDistritosController::class, 'eliminar'])->name('distrito.eliminar');
Route::delete('/Distritos/{tDistritos}', [App\Http\Controllers\TDistritosController::class, 'destroy'])->name('distrito.destroy');

//Distritacion
Route::get('/Distritacion',[App\Http\Controllers\TDistritacionController::class, 'index'])->name('distritacion.index');
Route::get('/Distritacion/Agregar', [App\Http\Controllers\TDistritacionController::class, 'create'])->name('distritacion.create');
Route::post('/Distritacion', [App\Http\Controllers\TDistritacionController::class, 'store'])->name('distritacion.store');
Route::get('/Distritacion/{tDistritacion}/Detalles', [App\Http\Controllers\TDistritacionController::class, 'show'])->name('distritacion.show');
Route::get('/Distritacion/{tDistritacion}/Editar', [App\Http\Controllers\TDistritacionController::class, 'edit'])->name('distritacion.edit');
Route::put('/Distritacion/{tDistritacion}', [App\Http\Controllers\TDistritacionController::class, 'update'])->name('distritacion.update');
Route::get('/Distritacion/{tDistritacion}/Eliminar', [App\Http\Controllers\TDistritacionController::class, 'eliminar'])->name('distritacion.eliminar');
Route::delete('/Distritacion/{tDistritacion}', [App\Http\Controllers\TDistritacionController::class, 'destroy'])->name('distritacion.destroy');

//Localidades
Route::get('/Localidades',[App\Http\Controllers\TLocalidadesController::class, 'index'])->name('localidades.index');
Route::get('/Localidades/Agregar', [App\Http\Controllers\TLocalidadesController::class, 'create'])->name('localidades.create');
Route::post('/Localidades', [App\Http\Controllers\TLocalidadesController::class, 'store'])->name('localidades.store');
Route::get('/Localidades/{tLocalidades}/Detalles', [App\Http\Controllers\TLocalidadesController::class, 'show'])->name('localidades.show');
Route::get('/Localidades/{tLocalidades}/Editar', [App\Http\Controllers\TLocalidadesController::class, 'edit'])->name('localidades.edit');
Route::put('/Localidades/{tLocalidades}', [App\Http\Controllers\TLocalidadesController::class, 'update'])->name('localidades.update');
Route::get('/Localidades/{tLocalidades}/Eliminar', [App\Http\Controllers\TLocalidadesController::class, 'eliminar'])->name('localidades.eliminar');
Route::delete('/Localidades/{tLocalidades}', [App\Http\Controllers\TLocalidadesController::class, 'destroy'])->name('localidades.destroy');

//Municipios
Route::get('/Municipios',[App\Http\Controllers\TMunicipiosController::class, 'index'])->name('municipio.index');
Route::get('/Municipuios/Agregar', [App\Http\Controllers\TMunicipiosController::class, 'create'])->name('municipio.create');
Route::post('/Municipios', [App\Http\Controllers\TMunicipiosController::class, 'store'])->name('municipio.store');
Route::get('/Municipios/{tMunicipios}/Detalles', [App\Http\Controllers\TMunicipiosController::class, 'show'])->name('municipio.show');
Route::get('/Municipios/{tMunicipios}/Editar', [App\Http\Controllers\TMunicipiosController::class, 'edit'])->name('municipio.edit');
Route::put('/Municipios/{tMunicipios}', [App\Http\Controllers\TMunicipiosController::class, 'update'])->name('municipio.update');
Route::get('/Municipios/{tMunicipios}/Eliminar', [App\Http\Controllers\TMunicipiosController::class, 'eliminar'])->name('municipio.eliminar');
Route::delete('/Municipios/{tMunicipios}', [App\Http\Controllers\TMunicipiosController::class, 'destroy'])->name('municipio.destroy');

//Secciones
Route::get('/Secciones',[App\Http\Controllers\TSeccionesController::class, 'index'])->name('secciones.index');
Route::get('/Secciones/Agregar', [App\Http\Controllers\TSeccionesController::class, 'create'])->name('secciones.create');
Route::post('/Secciones', [App\Http\Controllers\TSeccionesController::class, 'store'])->name('secciones.store');
Route::get('/Secciones/{tSecciones}/Detalles', [App\Http\Controllers\TSeccionesController::class, 'show'])->name('secciones.show');
Route::get('/Secciones/{tSecciones}/Editar', [App\Http\Controllers\TSeccionesController::class, 'edit'])->name('secciones.edit');
Route::put('/Secciones/{tSecciones}', [App\Http\Controllers\TSeccionesController::class, 'update'])->name('secciones.update');
Route::get('/Secciones/{tSecciones}/Eliminar', [App\Http\Controllers\TSeccionesController::class, 'eliminar'])->name('secciones.eliminar');
Route::delete('/Secciones/{tSecciones}', [App\Http\Controllers\TSeccionesController::class, 'destroy'])->name('secciones.destroy');

//Ciudadanos
Route::get('/Ciudadano',[App\Http\Controllers\TCiudadanosController::class, 'index'])->name('ciudadanos.index');
Route::get('/Ciudadano/Agregar', [App\Http\Controllers\TCiudadanosController::class, 'create'])->name('ciudadanos.create');
Route::post('/Ciudadano', [App\Http\Controllers\TCiudadanosController::class, 'store'])->name('ciudadanos.store');
Route::get('/Ciudadano/{tCiudadnos}/Detalles', [App\Http\Controllers\TCiudadanosController::class, 'show'])->name('ciudadanos.show');
Route::get('/Ciudadano/{tCiudadnos}/Editar',[App\Http\Controllers\TCiudadanosController::class, 'edit'])->name('ciudadanos.edit');
Route::put('/Ciudadano/{tCiudadnos}', [App\Http\Controllers\TCiudadanosController::class, 'update'])->name('ciudadanos.update');
Route::get('/Ciudadano/{tCiudadnos}/Eliminar', [App\Http\Controllers\TCiudadanosController::class, 'eliminar'])->name('ciudadanos.eliminar');
Route::delete('/Ciudadano/{tCiudadnos}', [App\Http\Controllers\TCiudadanosController::class, 'destroy'])->name('ciudadanos.destroy');

//Diputados
Route::get('/Diputados',[App\Http\Controllers\TDiputadosController::class, 'index'])->name('diputados.index');
Route::get('/Diputados/Agregar', [App\Http\Controllers\TDiputadosController::class, 'create'])->name('diputados.create');
Route::post('/Diputados', [App\Http\Controllers\TDiputadosController::class, 'store'])->name('diputados.store');
Route::get('/Diputados/{tDiputados}/Detalles', [App\Http\Controllers\TDiputadosController::class, 'show'])->name('diputados.show');
Route::get('/Diputados/{tDiputados}/Editar',[App\Http\Controllers\TDiputadosController::class, 'edit'])->name('diputados.edit');
Route::put('/Diputados/{tDiputados}', [App\Http\Controllers\TDiputadosController::class, 'update'])->name('diputados.update');
Route::get('/Diputados/{tDiputados}/Eliminar', [App\Http\Controllers\TDiputadosController::class, 'eliminar'])->name('diputados.eliminar');
Route::delete('/Diputados/{tDiputados}', [App\Http\Controllers\TDiputadosController::class, 'destroy'])->name('diputados.destroy');

//Gestiones
Route::get('/Gestiones',[App\Http\Controllers\GestionesController::class, 'index'])->name('gestiones.index');
Route::get('/Gestiones/Agregar', [App\Http\Controllers\GestionesController::class, 'create'])->name('gestiones.create');
Route::post('/Gestiones', [App\Http\Controllers\GestionesController::class, 'store'])->name('gestiones.store');
Route::get('/Gestiones/{gestiones}/Detalles', [App\Http\Controllers\GestionesController::class, 'show'])->name('gestiones.show');
Route::get('/Gestiones/{gestiones}/Editar',[App\Http\Controllers\GestionesController::class, 'edit'])->name('gestiones.edit');
Route::put('/Gestiones/{gestiones}', [App\Http\Controllers\GestionesController::class, 'update'])->name('gestiones.update');
Route::get('/Gestiones/{gestiones}/Eliminar', [App\Http\Controllers\GestionesController::class, 'eliminar'])->name('gestiones.eliminar');
Route::delete('/Gestiones/{gestiones}', [App\Http\Controllers\GestionesController::class, 'destroy'])->name('gestiones.destroy');

//Solicitudes
Route::get('/Solicitudes',[App\Http\Controllers\TSolicitudController::class, 'index'])->name('solicitud.index');
Route::get('/Solicitudes/Agregar', [App\Http\Controllers\TSolicitudController::class, 'create'])->name('solicitud.create');
Route::post('/Solicitudes', [App\Http\Controllers\TSolicitudController::class, 'store'])->name('solicitud.store');
Route::get('/Solicitudes/{tSolicitud}/Detalles', [App\Http\Controllers\TSolicitudController::class, 'show'])->name('solicitud.show');
Route::get('/Solicitudes/Autocomplete',[App\Http\Controllers\TSolicitudController::class, 'autocomplete'])->name('solicitud.autocomplete');
Route::get('/Solicitudes/Filtrado',[App\Http\Controllers\TSolicitudController::class, 'filterSolicitud'])->name('solicitud.filter');
Route::get('/Solicitudes/{tSolicitud}/Editar',[App\Http\Controllers\TSolicitudController::class, 'edit'])->name('solicitud.edit');
Route::put('/Solicitudes/{tSolicitud}', [App\Http\Controllers\TSolicitudController::class, 'update'])->name('solicitud.update');
Route::get('/Solicitudes/{tSolicitud}/Eliminar', [App\Http\Controllers\TSolicitudController::class, 'eliminar'])->name('solicitud.eliminar');
Route::delete('/Solicitudes/{tSolicitud}', [App\Http\Controllers\TSolicitudController::class, 'destroy'])->name('solicitud.destroy');
Route::get('/Solicitudes/{tSolicitud}/Exportar', [App\Http\Controllers\TSolicitudController::class,'exportar'])->name('solicitud.export');

Route::get('/Profile',[App\Http\Controllers\ProfileController::class, 'show'])->name('profile.index');
Route::get('/Profile/{user}/Editar', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/Profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');