<?php

namespace App\Http\Controllers;

use App\Models\Orcamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Clientes; // Certifique-se de importar o modelo Cliente no início do seu arquivo

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
        return view('conteudos.orcamento.app_cadastrar_orcamento', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user();

    // Verifique se há um cliente correspondente ao usuário autenticado
    $cliente = Clientes::find($user->id);

    if (!$cliente) {
        // Se não houver cliente correspondente, você pode tratar isso de acordo com a lógica do seu aplicativo
        // Por exemplo, lançar uma exceção, redirecionar para uma página de erro, etc.
        // Aqui, eu estou lançando uma exceção como exemplo:
        throw new \Exception('Cliente não encontrado para o usuário autenticado.');
    }

    $orcamento = new Orcamentos;
    $orcamento->cliente_id = $cliente->id;
    $orcamento->nome_campanha = $request->nome_campanha;
    $orcamento->save();

    Alert::toast('Orçamento cadastrado com sucesso', 'success');
    return redirect('/orcamentos');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
