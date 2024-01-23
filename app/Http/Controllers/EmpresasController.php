<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresas::all();

        return view('conteudos.empresas.app_empresas', compact('empresas'));
    }

    public function create()
    {
        return view('conteudos.empresas.app_registar_empresa');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $empresa = new Empresas;
        $empresa->nome = $request->nome;
        $empresa->logomarca = $request->logomarca;
        $empresa->descricao = $request->descricao;

        $empresa->save();

        Alert::toast('Empresa Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova empresa com o id {$empresa->id} e nome {$empresa->nome} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/empresas');
    }

    public function show($id)
    {
        $empresa = Empresas::find($id);

        return view('conteudos.empresas.app_visualizar_empresa', compact('empresa'));
    }

    public function edit($id)
    {
        $empresa = Empresas::find($id);

        return view('conteudos.empresas.app_editar_empresa', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $empresa = Empresas::find($id);
        $empresa->nome = $request->nome;
        $empresa->logomarca = $request->logomarca;
        $empresa->descricao = $request->descricao;

        $empresa->save();

        $user_logado = Auth::user();
        $this->registarLog("A empresa com o id {$empresa->id} e nome {$empresa->nome} foi editada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/empresas');
    }

    public function destroy($id)
    {
        Empresas::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/empresas');
    }

    public function pesquisar()
    {
        return 'A página está a ser trabalhada...';
    }

    public function registarLog($descricao, $user_id)
    {
        $log = new Logs();
        $log->descricao = $descricao;
        $log->usuario_id = $user_id;
        $log->save();
    }
}