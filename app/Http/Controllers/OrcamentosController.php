<?php

namespace App\Http\Controllers;

use App\Models\Orcamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Produtos;

use App\Models\Logs;
use App\Models\Clientes; // Certifique-se de importar o modelo Cliente no início do seu arquivo
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
        $orcamentos = Orcamentos::all();

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

    // // Verifique se há um cliente correspondente ao usuário autenticado
    // $cliente = Clientes::find($user->id);

    // if (!$cliente) {
    //     // Se não houver cliente correspondente, você pode tratar isso de acordo com a lógica do seu aplicativo
    //     // Por exemplo, lançar uma exceção, redirecionar para uma página de erro, etc.
    //     // Aqui, eu estou lançando uma exceção como exemplo:
    //     throw new \Exception('Cliente não encontrado para o usuário autenticado.');
    // }

    $orcamento = new Orcamentos;
    $orcamento->cliente_id = $request->cliente_id;
    $orcamento->nome_campanha = $request->nome_campanha;
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
    $venda->fluxo = 'vendedor';
    $venda->status = 'orçamento';
    $venda->save();

    $user_logado = Auth::user();
    $this->registarLog("Um novo orçamento com o id {$orcamento->id} e nome {$orcamento->nome_campanha} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

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
        $cliente = Clientes::all();
        $orcamento = Orcamentos::find($id);
        return view('conteudos.orcamento.app_visualizar_orcamento', compact('orcamento','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $user = Auth::user();
        $clientes = Clientes::all();
        return view('conteudos.orcamento.app_editar_orcamento', compact('user','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user = Auth::user();

        $orcamento = Orcamentos::find($id);
        $orcamento->cliente_id = $request->cliente_id;
        $orcamento->nome_campanha = $request->nome_campanha;

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
}
