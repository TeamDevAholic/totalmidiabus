<?php

namespace App\Http\Controllers;

use App\Models\Orcamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Produtos;

use App\Models\Logs;
use App\Models\Clientes; // Certifique-se de importar o modelo Cliente no início do seu arquivo
use App\Models\ItensVendas;
use App\Models\Vendas;

class OrcamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $orcamentos = Orcamentos::orderBy('created_at', 'desc')->get();

        return view('conteudos.orcamento.app_listar_orcamento', compact('user', 'orcamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        $clientes = Clientes::all();
        return view('conteudos.orcamento.app_cadastrar_orcamento', compact('user','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user();

    $orcamento = new Orcamentos;
    $orcamento->cliente_id = $request->cliente_id;
    $orcamento->nome_campanha = $request->nome_campanha;
    $orcamento->descricao = $request->descricao;
    $orcamento->save();


    $venda = new Vendas();
    $venda->orcamento_id = $orcamento->id;
    $venda->lista_produtos = "";
    $venda->numero_pi = "0";
    $venda->qtd_parcelas = "0";
    $venda->inicio_campanha = null;
    $venda->anexo_pdf = "";
    $venda->numero_nf = "";
    $venda->valor_bruto = null;
    $venda->valor_imposto = null;
    $venda->valor_depositado = null;
    $venda->pagamento_colagem = null;
    $venda->pagamento_garagem = null;
    $venda->fotos_comprovacao = null;
    $venda->fluxo = 'Vendedor';
    $venda->status = 'Orçamento';
    $venda->save();

    $user_logado = Auth::user();
    $this->registarLog("Um novo orçamento com o id {$orcamento->id} e nome {$orcamento->nome_campanha} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);


    $user_logado = Auth::user();
    $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

    Alert::toast('Orçamento cadastrado com sucesso', 'success');

    $produtos = Produtos::all();

    return redirect('/registar_venda/'.$orcamento->id);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $orcamento = Orcamentos::find($id);
        $cliente = Clientes::find($orcamento->cliente_id);
        $venda = Vendas::where('orcamento_id', $id)->first();
        $itens_venda = ItensVendas::where('venda_id', $venda->id)->get();



        return view('conteudos.orcamento.app_visualizar_orcamento', compact('orcamento','cliente','venda','itens_venda'));
    }


    public function edit(string $id)
    {
        //

        $user = Auth::user();
        $clientes = Clientes::all();
        return view('conteudos.orcamento.app_editar_orcamento', compact('user','clientes'));
    }


    public function update(Request $request, string $id)
    {
        //

        $user = Auth::user();

        $orcamento = Orcamentos::find($id);
        $orcamento->cliente_id = $request->cliente_id;
        $orcamento->nome_campanha = $request->nome_campanha;
        $orcamento->descricao = $request->descricao;

        $orcamento->save();

        $user_logado = Auth::user();

        $this->registarLog("O orçamento com o id {$orcamento->id} e nome {$orcamento->nome} foi editada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        Alert::toast('Orçamento atualizado com sucesso', 'success');

        return redirect('/orcamentos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Orcamentos::destroy($id);

        Alert::toast('Registro Eliminado Com Sucesso', 'success');

        return redirect('/orcamentos');
    }
    public function registarLog($descricao, $user_id)
    {
        $log = new Logs();
        $log->descricao = $descricao;
        $log->usuario_id = $user_id;
        $log->save();
    }

    public function imprimir_orcamento(Request $request)
    {
        $id = $request->orcamento_id;

        $orcamento = Orcamentos::find($id);
        $venda = Vendas::where('orcamento_id', $id)->first();
        $cliente = Clientes::find($orcamento->cliente_id);
        $produtos = Produtos::all();
        $itens_vendas = ItensVendas::where('venda_id', $venda->id)
                    ->join('produtos','produtos.id','itens_vendas.produto_id')
                    ->select('itens_vendas.*','produtos.nome')
                    ->get();

        $valor_total = ItensVendas::where('venda_id', $venda->id)
                    ->join('produtos','produtos.id','itens_vendas.produto_id')
                    ->select('itens_vendas.*','produtos.nome')
                    ->sum('itens_vendas.valor');

        // Calcula o valor total diretamente no banco de dados
        $valor_total = ItensVendas::where('venda_id', $venda->id)
        ->join('produtos','produtos.id','itens_vendas.produto_id')
        ->select('itens_vendas.*','produtos.nome')
        ->sum('itens_vendas.valor');

        // Calcula outros totais
        $custo_colagem_total = ItensVendas::where('venda_id', $venda->id)
                ->join('produtos','produtos.id','itens_vendas.produto_id')
                ->select('itens_vendas.*','produtos.nome')
                ->sum('itens_vendas.custo_colagem_produto');

        $custo_linha_total = ItensVendas::where('venda_id', $venda->id)
                ->join('produtos','produtos.id','itens_vendas.produto_id')
                ->select('itens_vendas.*','produtos.nome')
                ->sum('itens_vendas.custo_linha_onibus');

        // Passa os totais para a view
        $total_geral = $valor_total + $custo_colagem_total + $custo_linha_total;

        return view('conteudos.orcamento.app_imprimir_orcamento', compact('venda','produtos','id'
                ,'cliente','orcamento','itens_vendas','valor_total', 'custo_colagem_total', 'custo_linha_total','total_geral'));
    }
}
