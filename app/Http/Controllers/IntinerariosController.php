<?php

namespace App\Http\Controllers;

use App\Models\Intinerarios;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class IntinerariosController extends Controller
{
    public function index()
    {
        $itinerarios = Intinerarios::all();

        return view('conteudos.itinerarios.app_itinerarios', compact('itinerarios'));
    }

    public function create()
    {
        return view('conteudos.itinerarios.app_registar_itinerario');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $itinerario = new Intinerarios;
        $itinerario->nome = $request->nome;
        $itinerario->linha_id = $request->linha_id;

        $itinerario->save();

        Alert::toast('Itinerário Registrado Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Um novo itinerário com o id {$itinerario->id} e nome {$itinerario->nome} foi criado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/itinerarios');
    }

    public function show($id)
    {
        $itinerario = Intinerarios::find($id);

        return view('conteudos.itinerarios.app_visualizar_itinerario', compact('itinerario'));
    }

    public function edit($id)
    {
        $itinerario = Intinerarios::find($id);

        return view('conteudos.itinerarios.app_editar_itinerario', compact('itinerario'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $itinerario = Intinerarios::find($id);
        $itinerario->nome = $request->nome;
        $itinerario->linha_id = $request->linha_id;

        $itinerario->save();

        $user_logado = Auth::user();
        $this->registarLog("O itinerário com o id {$itinerario->id} e nome {$itinerario->nome} foi editado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/itinerarios');
    }

    public function destroy($id)
    {
        Intinerarios::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/itinerarios');
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
