<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Setores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class SetoresController extends Controller
{
    //

    public function index()
    {
        $setores = Setores::orderBy('created_at', 'desc')->get();

        return view('conteudos.setores.app_setores', compact('setores'));
    }

    public function create()
    {
        return view('conteudos.setores.app_registar_setor');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $setor = new Setores;
        $setor->nome = $request->nome;
        $setor->descricao = $request->descricao;

        $setor->save();

        Alert::toast('setor Registrado Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Um novo setor com o id {$setor->id} e nome {$setor->nome} foi criado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/setores');
    }

    public function show($id)
    {
        $setor = Setores::find($id);

        return view('conteudos.setores.app_visualizar_setor', compact('setor'));
    }

    public function edit($id)
    {
        $setor = setores::find($id);

        return view('conteudos.setores.app_editar_setor', compact('setor'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $setor = Setores::find($id);
        $setor->nome = $request->nome;
        $setor->descricao = $request->descricao;

        $setor->save();

        $user_logado = Auth::user();
        $this->registarLog("O setor com o id {$setor->id} e nome {$setor->nome} foi editado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/setores');
    }

    public function destroy($id)
    {
        Setores::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/setores');
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
