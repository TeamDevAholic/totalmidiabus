<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentosController;
use App\Http\Controllers\EmpresasController;
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



Auth::routes();

// Define a rota raiz como a página de login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'App\Http\Controllers\adminController@dashboard')->middleware('auth')->middleware('auth');
Route::get('/logout', 'App\Http\Controllers\adminController@logout')->middleware('auth');

Route::get('/roles_users','App\Http\Controllers\adminController@roles_users') ->name('roles');
Route::get('/permissions_roles','App\Http\Controllers\adminController@permissions_roles')->name('permissions');
Route::get('/permissions_roles_by_id/{id}','App\Http\Controllers\adminController@permissions_roles_by_id')->middleware('auth');
Route::post('/salvar_roles_users','App\Http\Controllers\adminController@salvar_roles_users')->middleware('auth');
Route::post('/actualizar_roles_users','App\Http\Controllers\adminController@actualizar_roles_users')->middleware('auth');
Route::post('/salvar_permissions_roles','App\Http\Controllers\adminController@salvar_permissions_roles')->middleware('auth');
Route::get('/login', 'App\Http\Controllers\adminController@login')->middleware('auth');
Route::post('/criar_token_acesso', 'App\Http\Controllers\adminController@criar_token_acesso')->middleware('auth');

// ========================= CLIENTES ========================

Route::get('/clientes', 'App\Http\Controllers\clientesController@index')->middleware('auth');
Route::get('/registar_cliente', 'App\Http\Controllers\clientesController@create')->middleware('auth');
Route::get('/editar_cliente/{id}', 'App\Http\Controllers\clientesController@edit')->middleware('auth');
Route::get('/visualizar_cliente/{id}', 'App\Http\Controllers\clientesController@show')->middleware('auth');
Route::get('/eliminar_cliente/{id}', 'App\Http\Controllers\clientesController@destroy')->middleware('auth');
Route::post('/actualizar_cliente/{id}', 'App\Http\Controllers\clientesController@update')->middleware('auth');
Route::post('/salvar_cliente', 'App\Http\Controllers\clientesController@store')->middleware('auth');

// ========================= ORÇAMENTOS ========================

Route::get('/orcamentos', 'App\Http\Controllers\OrcamentosController@index')->middleware('auth');
Route::get('/registar_orcamento', 'App\Http\Controllers\OrcamentosController@create')->middleware('auth');
Route::get('/editar_orcamento/{id}', 'App\Http\Controllers\OrcamentosController@edit')->middleware('auth');
Route::get('/visualizar_orcamento/{id}', 'App\Http\Controllers\OrcamentosController@show')->middleware('auth');
Route::get('/eliminar_orcamento/{id}', 'App\Http\Controllers\OrcamentosController@destroy')->middleware('auth');
Route::post('/actualizar_orcamento/{id}', 'App\Http\Controllers\OrcamentosController@update')->middleware('auth');
Route::post('/salvar_orcamento', 'App\Http\Controllers\OrcamentosController@store')->middleware('auth');

// ========================= EMPRESAS ========================

Route::get('/empresas', 'App\Http\Controllers\EmpresasController@index')->middleware('auth');
Route::get('/registar_empresa', 'App\Http\Controllers\EmpresasController@create')->middleware('auth');
Route::get('/editar_empresa/{id}', 'App\Http\Controllers\EmpresasController@edit')->middleware('auth');
Route::get('/visualizar_empresa/{id}', 'App\Http\Controllers\EmpresasController@show')->middleware('auth');
Route::get('/eliminar_empresa/{id}', 'App\Http\Controllers\EmpresasController@destroy')->middleware('auth');
Route::post('/actualizar_empresa/{id}', 'App\Http\Controllers\EmpresasController@update')->middleware('auth');
Route::post('/salvar_empresa', 'App\Http\Controllers\EmpresasController@store')->middleware('auth');
