<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendas;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class VendasController extends Controller
{
    public function index()
    {
        $vendas = Vendas::all();

        return view('conteudos.vendas.app_vendas', compact('vendas'));
    }

    public function create()
    {
        return view('conteudos.vendas.app_registar_venda');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $venda = new Vendas;
        $venda->lista_produtos = $request->lista_produtos;
        $venda->numero_pi = $request->numero_pi;
        $venda->qtd_parcelas = $request->qtd_parcelas;
        $venda->inicio_campanha = $request->inicio_campanha;
        $venda->anexo_pdf = $request->anexo_pdf;
        $venda->numero_nf = $request->numero_nf;
        $venda->valor_bruto = $request->valor_bruto;
        $venda->valor_imposto = $request->valor_imposto;
        $venda->valor_depositado = $request->valor_depositado;
        $venda->pagamento_colagem = $request->pagamento_colagem;
        $venda->pagamento_garagem = $request->pagamento_garagem;
        $venda->fotos_comprovacao = $request->fotos_comprovacao;
        $venda->fluxo = $request->fluxo ?? 'vendedor';
        $venda->status = $request->status ?? 'orçamento';

        $venda->save();

        Alert::toast('Venda Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/vendas');
    }

    public function show($id)
    {
        $venda = Vendas::find($id);

        return view('conteudos.vendas.app_visualizar_venda', compact('venda'));
    }

    public function edit($id)
    {
        $venda = Vendas::find($id);

        return view('conteudos.vendas.app_editar_venda', compact('venda'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $venda = Vendas::find($id);
        $venda->lista_produtos = $request->lista_produtos;
        $venda->numero_pi = $request->numero_pi;
        $venda->qtd_parcelas = $request->qtd_parcelas;
        $venda->inicio_campanha = $request->inicio_campanha;
        $venda->anexo_pdf = $request->anexo_pdf;
        $venda->numero_nf = $request->numero_nf;
        $venda->valor_bruto = $request->valor_bruto;
        $venda->valor_imposto = $request->valor_imposto;
        $venda->valor_depositado = $request->valor_depositado;
        $venda->pagamento_colagem = $request->pagamento_colagem;
        $venda->pagamento_garagem = $request->pagamento_garagem;
        $venda->fotos_comprovacao = $request->fotos_comprovacao;
        $venda->fluxo = $request->fluxo ?? 'vendedor';
        $venda->status = $request->status ?? 'orçamento';

        $venda->save();

        $user_logado = Auth::user();
        $this->registarLog("A venda com o id {$venda->id} foi editada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Registro Atualizado Com Sucesso', 'success');

        return redirect('/vendas');
    }

    public function destroy($id)
    {
        Vendas::destroy($id);
        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/vendas');
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
