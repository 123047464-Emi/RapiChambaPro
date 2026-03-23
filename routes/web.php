<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\CalleController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\MostrarTareasController;
use App\Http\Controllers\PostulacionController;
use App\Http\Controllers\EmpleadorDashboardController;
use App\Http\Controllers\EmpleadoController;

#Route::get('/perfilempleado', [EmpleadoController::class, 'perfil'])
    #->middleware('auth')   // Protege el guardado del empleado
    #->name('empleado.perfilEmpleado');
Route::get('/perfilempleado', function () {
    return view('Empleado.perfilempleado');
})->name('empleado.perfil');

Route::get('/dashboardEmpleado', [EmpleadoController::class, 'dashboardEmpleado'])
    ->middleware('auth')
    ->name('empleado.dashboardEmpleado');

// --- PÁGINAS PÚBLICAS ---

Route::get('/', function () {
    return view('home');    
})->name('home');


Route::get('/home', function () {
    return view('home');
});

Route::get('/SinTerminarEmpleado', function () {
    return view('Empleado.SinTerminarEmpleado');
})->name('Empleado.SinTerminarEmpleado');

Route::get('/SiTerminarEmpleador', function () {
    return view('Empleador.SiTerminarEmpleador');
})->name('Empleador.SiTerminarEmpleador');


// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // Es importante llamar 'login' a esta ruta para los redireccionamientos de Laravel

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Registro
Route::get('/registro', function () {
    return view('auth.registro'); 
})->name('registro');

Route::get('/SinVista', function () {
    return view('SinVista'); 
})->name('SinVista');

Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.registrar');




// --- ZONA PRIVADA (DASHBOARDS) ---

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');



// Estados
Route::get('/api/estados', [EstadoController::class, 'index']);

// Municipios (todos o filtrados por estado)
Route::get('/api/municipios', [MunicipioController::class, 'index']);
Route::get('/api/municipios/{estadoId}', [MunicipioController::class, 'byEstado']);

// Colonias (todas o filtradas por municipio)
Route::get('/api/colonias', [ColoniaController::class, 'index']);
Route::get('/api/colonias/{municipioId}', [ColoniaController::class, 'byMunicipio']);

// Calles (todas o filtradas por colonia)
Route::get('/api/calles', [CalleController::class, 'index']);
Route::get('/api/calles/{coloniaId}', [CalleController::class, 'byColonia']);

// Habilidades
Route::get('/api/habilidades', [HabilidadController::class, 'index']);

//Route::get('/postulacion/{id}', [PostulacionController::class, 'create'])->name('postulacion.create');
Route::post('/postularse/{id}', [PostulacionController::class, 'store'])
    ->middleware('auth');






//FALTANTES

//Dashboard

// Empleado
//Route::get('/dashboardEmpleado', function () {
    //return view('Empleado.dashboardEmpleado'); 
//})->name('empleado.dashboardEmpleado');

Route::get('/detalles', function () {
    return view('Empleado.detalles'); 
})->name('empleado.detalles');

Route::get('/pagosdetalles', function () {
    return view('Empleado.pagosdetalles'); 
})->name('empleado.pagos');

//Route::get('/perfilempleado', function () {
  //  return view('Empleado.perfilempleado');
//})->name('empleado.perfilEmpleado');


Route::get('/dashboardEmpleado', [MostrarTareasController::class, 'dashboardEmpleado'])
     ->name('empleado.dashboardEmpleado');

// Empleador
Route::get('/dashboardEmpleador', function () {
    return view('Empleador.dashboardEmpleador'); 
})->name('empleador.dashboardEmpleador');

Route::get('/detalleEmpleador', function () {
    return view('Empleador.detalleEmpleador'); 
})->name('empleador.detalles');

Route::get('/perfilempleador', function () {
    return view('Empleador.perfilempleador');
})->name('empleador.perfil');

Route::get('/metodoPago', function () {
    return view('Empleador.metodoPago'); 
})->name('empleador.pago');

Route::get('/dashboardEmpleador', [EmpleadorDashboardController::class, 'index'])->name('empleador.dashboardEmpleador');


