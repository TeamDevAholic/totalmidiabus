<?php

namespace App\Http\Controllers;

use App\Models\Orcamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
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
        //
        $user = Auth::user();

        $orcamentos = new Orcamentos;
        $orcamentos->cliente_id = $request->cliente_id;
        $orcamentos->nome_campanha = $request->nome_campanha;
        $orcamentos->save();

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
