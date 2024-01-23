<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsaveis;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ResponsaveisController extends Controller
{
    public function index()
    {
        $responsaveis = Responsaveis::all();

        return view('conteudos.responsaveis.app_responsaveis', compact('responsaveis'));
    }

    public function create()
    {
        return view('conteudos.responsaveis.app_registar_responsavel');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $responsavel = new Responsaveis;
        $responsavel->empresa_id = $request->empresa_id;
        $responsavel->nome = $request->nome;
        $responsavel->email = $request->email;
        $responsavel->whatsapp = $request->whatsapp;
        $responsavel->celular = $request->celular;
        $responsavel->setor = $request->setor;
        $responsavel->data_aniversario = $request->data_aniversario;

        $responsavel->save();

        Alert::toast('Responsável Registrado Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Um novo responsável com o id {$responsavel->id} e nome {$responsavel->nome} foi criado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/responsaveis');
    }

    public function show($id)
    {
        $responsavel = Responsaveis::find($id);

        return view('conteudos.responsaveis.app_visualizar_responsavel', compact('responsavel'));
    }

    public function edit($id)
    {
        $responsavel = Responsaveis::find($id);

        return view('conteudos.responsaveis.app_editar_responsavel', compact('responsavel'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $responsavel = Responsaveis::find($id);
        $responsavel->empresa_id = $request->empresa_id;
        $responsavel->nome = $request->nome;
        $responsavel->email = $request->email;
        $responsavel->whatsapp = $request->whatsapp;
        $responsavel->celular = $request->celular;
        $responsavel->setor = $request->setor;
        $responsavel->data_aniversario = $request->data_aniversario;

        $responsavel->save();

        $user_logado = Auth::user();
        $this->registarLog("O responsável com o id {$responsavel->id} e nome {$responsavel->nome} foi editado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/responsaveis');
    }

    public function destroy($id)
    {
        Responsaveis::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/responsaveis');
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
