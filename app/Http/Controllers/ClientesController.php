<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Consultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;
use Alert;



class clientesController extends Controller
{
    public function index()
    {
        //
        $user = Auth::user();

        $clientes = Clientes::
                    where('criado_por', $user->id)
                    ->get();

        return view('conteudos.clientes.app_clientes', compact('user','clientes'));
    }


    public function create()
    {
        //
        $user = Auth::user();

        return view('conteudos.clientes.app_registar_cliente', compact('user'));
    }

    public function store(Request $request)
    {
        //
        $user = Auth::user();

        $cliente = new Clientes;
        $cliente->nome = $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->email = $request->email;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->genero = $request->genero;
        $cliente->cep = $request->cep;
        $cliente->rua = $request->rua;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->uf = $request->uf;
        $cliente->numero = $request->numero;
        $cliente->complemento = $request->complemento;
        $cliente->criado_por = $user->id;
        $cliente->actualizado_por = $user->id;

        $cliente->save();

        // redirecionar para a página inicial
        // Alert::toast('cliente Registado Com Sucesso', 'success');

        if (isset($request->check_marcar_consulta)) {
            return redirect('/registar_consulta_por_cliente/'.$cliente->id);
         }


        return redirect('/clientes');

    }



    public function show($id)
    {
        $user = Auth::user();
        $cliente = Clientes::find($id);



        return view('conteudos.clientes.app_visualizar_cliente', compact('cliente','user'));
    }


    public function edit($id)
    {
        //
        $user = Auth::user();
        $cliente = Clientes::find($id);

        return view('conteudos.clientes.app_editar_cliente', compact('user','cliente'));
    }

    public function update(Request $request, $id)
    {
        //
        $user = Auth::user();

        $cliente = Clientes::find($id);
        $cliente->nome = $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->email = $request->email;
        $cliente->actualizado_por = $user->id;


        $cliente->save();

        // redirecionar para a página inicial
        Alert::toast('Registo Actualizado Com Sucesso', 'success');

        return redirect('/clientes');
    }


    public function destroy($id)
    {
        //
        Clientes::destroy($id);
        Alert::toast('Registo Eliminado Com Sucesso', 'success');

        return redirect('/clientes');
    }

    public function pesquisar()
    {
        //
        return 'A página está a ser trabalhada...';

        return redirect('/clientes');
    }
}
