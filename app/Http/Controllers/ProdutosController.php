<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

        return view('conteudos.produtos.app_produtos', compact('produtos'));
    }

    public function create()
    {
        return view('conteudos.produtos.app_registar_produto');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $produto = new Produtos;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->status = $request->status ?? 1;

        $produto->save();

        Alert::toast('Produto Registrado Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Um novo produto com o id {$produto->id} e nome {$produto->nome} foi criado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/produtos');
    }

    public function show($id)
    {
        $produto = Produtos::find($id);

        return view('conteudos.produtos.app_visualizar_produto', compact('produto'));
    }

    public function edit($id)
    {
        $produto = Produtos::find($id);

        return view('conteudos.produtos.app_editar_produto', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $produto = Produtos::find($id);
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->status = $request->status ?? 1;

        $produto->save();
        
        $user_logado = Auth::user();
        $this->registarLog("O produto com o id {$produto->id} e nome {$produto->nome} foi editado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/produtos');
    }

    public function destroy($id)
    {
        Produtos::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/produtos');
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
