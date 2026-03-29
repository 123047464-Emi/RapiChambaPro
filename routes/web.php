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
use App\Http\Controllers\TareaController;
use App\Http\Controllers\DashboardEmpleadorController;;

#Route::get('/perfilempleado', [EmpleadoController::class, 'perfil'])
    #->middleware('auth')   // Protege el guardado del empleado
    #->name('empleado.perfilEmpleado');
Route::get('/perfilempleado', function () {
    return view('Empleado.perfilempleado');
})->name('empleado.perfil');

#Route::get('/dashboardEmpleados', [EmpleadoController::class, 'dashboardEmpleado'])
#    ->middleware('auth')
 #   ->name('empleado.dashboardEmpleado');

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

Route::get('/registro', [RegistroController::class, 'showRegistro'])->name('registro');
Route::get('/municipios/{idEstados}', [RegistroController::class, 'getMunicipios']);
Route::get('/colonias/{municipioId}', [RegistroController::class, 'getColonias']);
Route::get('/calles/{coloniaId}', [RegistroController::class, 'getCalles']);



// --- ZONA PRIVADA (DASHBOARDS) ---

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');



// Estados
//Route::get('/api/estados', [EstadoController::class, 'index']);

// Municipios (todos o filtrados por estado)
//Route::get('/api/municipios', [MunicipioController::class, 'index']);
//Route::get('/api/municipios/{estadoId}', [MunicipioController::class, 'byEstado']);

// Colonias (todas o filtradas por municipio)
//Route::get('/api/colonias', [ColoniaController::class, 'index']);
//Route::get('/api/colonias/{municipioId}', [ColoniaController::class, 'byMunicipio']);

// Calles (todas o filtradas por colonia)
//Route::get('/api/calles', [CalleController::class, 'index']);
//Route::get('/api/calles/{coloniaId}', [CalleController::class, 'byColonia']);

// Habilidades
//Route::get('/api/habilidades', [HabilidadController::class, 'index']);

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


#Route::get('/dashboardEmpleado', [MostrarTareasController::class, 'dashboardEmpleado'])
 #    ->name('empleado.dashboardEmpleado');

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



#Nuevas rutas
Route::get('/detalleTarea', function () {
    return view('Empleado.detalleTarea');  
})->name('detalleTareaEmpleado');

Route::get('/crearTarea', [TareaController::class, 'create'])->name('empleador.crearTarea');

Route::post('/guardarTarea', [TareaController::class, 'store'])->name('tarea.store');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
Route::get('/tareas/crear', [TareaController::class, 'create'])->name('tareas.create');

Route::get('/dashboardEmpleados', [MostrarTareasController::class, 'dashboardEmpleado'])
    ->middleware('auth')
    ->name('empleado.dashboardEmpleado');

#Para publicar una tarea, primero verificamos si el usuario está autenticado y si ya tiene una tarea publicada. 
#Si no tiene una tarea, lo redirigimos a la página de creación de tareas; si ya tiene una, lo redirigimos a la página 
#de precios.
use Illuminate\Support\Facades\Auth;
use App\Models\Tareas;

Route::get('/publicar-chamba', function () {

    // 1. Verificar si NO está logueado
    if (!Auth::check()) {
        return redirect()->route('login'); // ajusta si tu login tiene otro nombre
    }

    $usuario = Auth::user();

    // 2. Verificar si ya tiene tareas (usando idEmpleador)
    $tieneTarea = Tareas::where('idEmpleador', $usuario->id)->exists();

    // 3. Si NO tiene tareas -> puede crear
    if (!$tieneTarea) {
        return redirect()->route('empleador.crearTarea');
    }

    // 4. Si YA tiene una -> mandarlo a precios
    return redirect()->route('precios');

})->name('empleador.publicar');


Route::post('/postularse/{tareaId}', [PostulacionController::class, 'store'])
    ->name('postularse')
    ->middleware('auth'); // Esto asegura que solo usuarios logueados puedan llamar la ruta

// En routes/web.php
Route::post('/login-biometrico', [LoginController::class, 'loginBiometrico'])->name('login.biometrico');

//  nueva vista
Route::get('/mis-chambas', [EmpleadoController::class, 'misChambas'])
    ->name('empleado.misChambas');

//tareasPublicadas 
Route::get('/dashboard-empleador', [DashboardEmpleadorController::class, 'index'])
    ->name('empleador.dashboardEmpleador');

//Route::get('/tareas-publicadas', [DashboardEmpleadorController::class, 'tareasPublicadas'])
//  ->name('empleador.tareasPublicadas');

Route::get('/Empleador.tareasPublicadas', function () {
    return view('Empleador.tareasPublicadas');
});

Route::get('/tareas-publicadas', [DashboardEmpleadorController::class, 'tareasPublicadas'])
    ->name('empleador.tareasPublicadas')
    ->middleware('auth');

Route::resource('tareas', TareaController::class);

Route::get('/tareas/{id}/postulados', [TareaController::class, 'verPostulados'])
    ->name('tareas.postulados');
