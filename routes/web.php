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


Route::get('/linhas', 'App\Http\Controllers\linhasController@index')->middleware('auth');
Route::get('/registar_linha', 'App\Http\Controllers\linhasController@create')->middleware('auth');
Route::get('/editar_linha/{id}', 'App\Http\Controllers\linhasController@edit')->middleware('auth');
Route::get('/visualizar_linha/{id}', 'App\Http\Controllers\linhasController@show')->middleware('auth');
Route::get('/eliminar_linha/{id}', 'App\Http\Controllers\linhasController@destroy')->middleware('auth');
Route::post('/actualizar_linha/{id}', 'App\Http\Controllers\linhasController@update')->middleware('auth');
Route::post('/salvar_linha', 'App\Http\Controllers\linhasController@store')->middleware('auth');


Route::get('/vendas', 'App\Http\Controllers\VendasController@index')->middleware('auth');
Route::get('/registar_venda', 'App\Http\Controllers\VendasController@create')->middleware('auth');
Route::get('/editar_venda/{id}', 'App\Http\Controllers\VendasController@edit')->middleware('auth');
Route::get('/visualizar_venda/{id}', 'App\Http\Controllers\VendasController@show')->middleware('auth');
Route::get('/eliminar_venda/{id}', 'App\Http\Controllers\VendasController@destroy')->middleware('auth');
Route::post('/actualizar_venda/{id}', 'App\Http\Controllers\VendasController@update')->middleware('auth');
Route::post('/salvar_venda', 'App\Http\Controllers\VendasController@store')->middleware('auth');


Route::get('/empresas', 'App\Http\Controllers\EmpresasController@index')->middleware('auth');
Route::get('/registar_empresa', 'App\Http\Controllers\EmpresasController@create')->middleware('auth');
Route::get('/editar_empresa/{id}', 'App\Http\Controllers\EmpresasController@edit')->middleware('auth');
Route::get('/visualizar_empresa/{id}', 'App\Http\Controllers\EmpresasController@show')->middleware('auth');
Route::get('/eliminar_empresa/{id}', 'App\Http\Controllers\EmpresasController@destroy')->middleware('auth');
Route::post('/actualizar_empresa/{id}', 'App\Http\Controllers\EmpresasController@update')->middleware('auth');
Route::post('/salvar_empresa', 'App\Http\Controllers\EmpresasController@store')->middleware('auth');


Route::get('/produtos', 'App\Http\Controllers\ProdutosController@index')->middleware('auth');
Route::get('/registar_produto', 'App\Http\Controllers\ProdutosController@create')->middleware('auth');
Route::get('/editar_produto/{id}', 'App\Http\Controllers\ProdutosController@edit')->middleware('auth');
Route::get('/visualizar_produto/{id}', 'App\Http\Controllers\ProdutosController@show')->middleware('auth');
Route::get('/eliminar_produto/{id}', 'App\Http\Controllers\ProdutosController@destroy')->middleware('auth');
Route::post('/actualizar_produto/{id}', 'App\Http\Controllers\ProdutosController@update')->middleware('auth');
Route::post('/salvar_produto', 'App\Http\Controllers\ProdutosController@store')->middleware('auth');


Route::get('/itens-vendas', 'App\Http\Controllers\ItensVendasController@index')->middleware('auth');
Route::get('/registar_item_venda', 'App\Http\Controllers\ItensVendasController@create')->middleware('auth');
Route::get('/editar_item_venda/{id}', 'App\Http\Controllers\ItensVendasController@edit')->middleware('auth');
Route::get('/visualizar_item_venda/{id}', 'App\Http\Controllers\ItensVendasController@show')->middleware('auth');
Route::get('/eliminar_item_venda/{id}', 'App\Http\Controllers\ItensVendasController@destroy')->middleware('auth');
Route::post('/actualizar_item_venda/{id}', 'App\Http\Controllers\ItensVendasController@update')->middleware('auth');
Route::post('/salvar_item_venda', 'App\Http\Controllers\ItensVendasController@store')->middleware('auth');


Route::get('/responsaveis', 'App\Http\Controllers\ResponsaveisController@index')->middleware('auth');
Route::get('/registar_responsavel', 'App\Http\Controllers\ResponsaveisController@create')->middleware('auth');
Route::get('/editar_responsavel/{id}', 'App\Http\Controllers\ResponsaveisController@edit')->middleware('auth');
Route::get('/visualizar_responsavel/{id}', 'App\Http\Controllers\ResponsaveisController@show')->middleware('auth');
Route::get('/eliminar_responsavel/{id}', 'App\Http\Controllers\ResponsaveisController@destroy')->middleware('auth');
Route::post('/actualizar_responsavel/{id}', 'App\Http\Controllers\ResponsaveisController@update')->middleware('auth');
Route::post('/salvar_responsavel', 'App\Http\Controllers\ResponsaveisController@store')->middleware('auth');


Route::get('/itinerarios', 'App\Http\Controllers\IntinerariosController@index')->middleware('auth');
Route::get('/registar_itinerario', 'App\Http\Controllers\IntinerariosController@create')->middleware('auth');
Route::get('/editar_itinerario/{id}', 'App\Http\Controllers\IntinerariosController@edit')->middleware('auth');
Route::get('/visualizar_itinerario/{id}', 'App\Http\Controllers\IntinerariosController@show')->middleware('auth');
Route::get('/eliminar_itinerario/{id}', 'App\Http\Controllers\IntinerariosController@destroy')->middleware('auth');
Route::post('/actualizar_itinerario/{id}', 'App\Http\Controllers\IntinerariosController@update')->middleware('auth');
Route::post('/salvar_itinerario', 'App\Http\Controllers\IntinerariosController@store')->middleware('auth');


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
