<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Linhas;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class linhasController extends Controller
{
    public function index()
    {
        $linhas = Linhas::all();

        return view('conteudos.linhas.app_linhas', compact('linhas'));
    }

    public function create()
    {
        return view('conteudos.linhas.app_registar_linha');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $linha = new Linhas;
        $linha->numero_linha = $request->numero_linha;
        $linha->municipio = $request->municipio;
        $linha->nome = $request->nome;
        $linha->empresa_id = $request->empresa_id;

        $linha->save();

        Alert::toast('Linha Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova linha com o id {$linha->id} e nome {$linha->nome} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/linhas');
    }

    public function show($id)
    {
        $linha = Linhas::find($id);

        return view('conteudos.linhas.app_visualizar_linha', compact('linha'));
    }

    public function edit($id)
    {
        $linha = Linhas::find($id);

        return view('conteudos.linhas.app_editar_linha', compact('linha'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $linha = Linhas::find($id);
        $linha->numero_linha = $request->numero_linha;
        $linha->municipio = $request->municipio;
        $linha->nome = $request->nome;
        $linha->empresa_id = $request->empresa_id;

        $linha->save();

        $user_logado = Auth::user();
        $this->registarLog("A linha com o id {$linha->id} e nome {$linha->nome} foi editada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/linhas');
    }

    public function destroy($id)
    {
        Linhas::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/linhas');
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
