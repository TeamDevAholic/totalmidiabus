<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Orcamentos;
use App\Models\Produtos;
use App\Models\Setores;
use App\Models\User;
use App\Models\Vendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $total_empresas = Empresas::all()->count();
        $total_produtos = Produtos::all()->count();
        $total_setores = Setores::all()->count();
        $total_usuarios = User::all()->count();


        // Obtém o primeiro e último dia do mês corrente
        $primeiroDiaMes = now()->startOfMonth();
        $ultimoDiaMes = now()->endOfMonth();

        // Filtra os orçamentos que aconteceram no mês corrente
        $orcamentos_mes = Orcamentos::whereBetween('created_at', [$primeiroDiaMes, $ultimoDiaMes])
        ->orderBy('created_at', 'desc')
        ->get();

        $vendas_mes = Vendas::whereBetween('created_at', [$primeiroDiaMes, $ultimoDiaMes])
        ->orderBy('created_at', 'desc')
        ->where('status', 'Venda Concluida')
        ->get();

        return view('home', compact('orcamentos_mes','vendas_mes','total_empresas','total_produtos','total_setores','total_usuarios'));
    }
}
