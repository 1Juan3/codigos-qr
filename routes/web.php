<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/googe-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name("google");

// Ruta para manejar la respuesta de Google y autenticar al usuario
Route::get('/google/callback', function () {
    $user = Socialite::driver('google')->user();

    $userExist = User::where('email', $user->email)->first();
    
    if($userExist){
        Auth::login($userExist);
    }else {
        redirect('/');
    }
    // Redirigir al usuario a la página de inicio después de iniciar sesión
    return redirect('/verGrupos');
});
//ruta para mostrar el login 
Route::get('/', function () {
    return view('login');})->name('login');


Route::get('verGrupos/{grupo}', [App\Http\Controllers\QRController::class, 'eliminarQrPorGrupo'])->name('eliminar');
Route::post('verGrupos/{grupo}', [App\Http\Controllers\QRController::class, 'eliminarQrPorGrupo'])->name('eliminar');
Route::get('actualizar/{grupo}', [App\Http\Controllers\QRController::class, 'editQrCount'])->name('updated');
Route::patch('actualizar/{grupo}', [App\Http\Controllers\QRController::class, 'updateQrCount'])->name('updated');
Route::get('/verGrupos',[App\Http\Controllers\QRController::class,'verQrPorGrupo'])->name('gruposQr');
Route::post('/verGrupos',[App\Http\Controllers\QRController::class,'storage'])->name('create');
Route::get('/viewQrs/{grupo}',[App\Http\Controllers\QRController::class,'generateQr'])->name('visualizar');
Route::get('/viewQrs/{grupo}/{qr}',[App\Http\Controllers\QRController::class,'generateQrIndividual'])->name('visualizar1');
Route::get('/verRegistro',[App\Http\Controllers\QRController::class,'consultar_informacion_entrada'])->name('consutarRegistro');
Route::post('/verRegistro',[App\Http\Controllers\QRController::class,'consultar_informacion_entrada'])->name('consutarRegistro');
Route::get('/registrarEntrada',[App\Http\Controllers\QRController::class,'consultar_informacion'])->name('consultar');
Route::post('/registrarEntrada',[App\Http\Controllers\QRController::class,'consultar_informacion'])->name('consultar');
Route::post('/registrarEntrada/{datos}',[App\Http\Controllers\QRController::class,'registrar_entrada'])->name('registrar');
Route::post('/eliminar-info', [App\Http\Controllers\QRController::class,'saveInfo'])->name('limpiar');
Route::get('/view', [App\Http\Controllers\QRController::class,'consultar_entrada'])->name('entrada');
Route::post('/view', [App\Http\Controllers\QRController::class,'consultar_entrada'])->name('entrada');
Route::get('/subir-excel', [App\Http\Controllers\ExcelController::class,'index'])->name('subir-excel');
Route::post('/subir-excel', [App\Http\Controllers\ExcelController::class,'subirExcel'])->name('subir-excel');
Route::get('/descargar-excel1', [App\Http\Controllers\ExcelController::class,'index1'])->name('descargar-excel1');
Route::post('/descargar-excel', [App\Http\Controllers\ExcelController::class,'descargarExcel'])->name('descargar-excel');


