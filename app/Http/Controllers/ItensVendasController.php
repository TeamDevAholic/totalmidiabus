<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItensVendas;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ItensVendasController extends Controller
{
    public function index()
    {
        $itensVendas = ItensVendas::all();

        return view('conteudos.itens_vendas.app_itens_vendas', compact('itensVendas'));
    }

    public function create()
    {
        return view('conteudos.itens_vendas.app_registar_item_venda');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $itemVenda = new ItensVendas;
        $itemVenda->orcamento_id = $request->orcamento_id;
        $itemVenda->venda_id = $request->venda_id;
        $itemVenda->produto_id = $request->produto_id;
        $itemVenda->qtd_produto = $request->qtd_produto;
        $itemVenda->data_inicio = $request->data_inicio;
        $itemVenda->data_final = $request->data_final;
        $itemVenda->valor = $request->valor;
        $itemVenda->custo_colagem_produto = $request->custo_colagem_produto;
        $itemVenda->custo_linha_onibus = $request->custo_linha_onibus;

        $itemVenda->save();

        Alert::toast('Item de Venda Registrado Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Um novo item de venda com o id {$itemVenda->id} foi criado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/itens-vendas');
    }

    public function show($id)
    {
        $itemVenda = ItensVendas::find($id);

        return view('conteudos.itens_vendas.app_visualizar_item_venda', compact('itemVenda'));
    }

    public function edit($id)
    {
        $itemVenda = ItensVendas::find($id);

        return view('conteudos.itens_vendas.app_editar_item_venda', compact('itemVenda'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $itemVenda = ItensVendas::find($id);
        $itemVenda->orcamento_id = $request->orcamento_id;
        $itemVenda->venda_id = $request->venda_id;
        $itemVenda->produto_id = $request->produto_id;
        $itemVenda->qtd_produto = $request->qtd_produto;
        $itemVenda->data_inicio = $request->data_inicio;
        $itemVenda->data_final = $request->data_final;
        $itemVenda->valor = $request->valor;
        $itemVenda->custo_colagem_produto = $request->custo_colagem_produto;
        $itemVenda->custo_linha_onibus = $request->custo_linha_onibus;

        $itemVenda->save();

        $user_logado = Auth::user();
        $this->registarLog("O item de venda com o id {$itemVenda->id} foi editado com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/itens-vendas');
    }

    public function destroy($id)
    {
        ItensVendas::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/itens-vendas');
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