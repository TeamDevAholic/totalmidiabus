<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendas;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Alert;
use App\Models\Clientes;
use App\Models\ItensVendas;
use App\Models\Orcamentos;
use App\Models\Produtos;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class VendasController extends Controller
{
    public function index()
    {
        $vendas = Vendas::all();

        return view('conteudos.vendas.app_vendas', compact('vendas'));
    }

    public function create($id)
    {

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


        return view('conteudos.vendas.app_registar_venda', compact('venda','produtos','id'
                ,'cliente','orcamento','itens_vendas','valor_total'));
    }
    public function createpi1($id){
        $venda = Vendas::find($id);
        $produtos = Produtos::all();

        return view('conteudos.vendas.app_registar_vendapi1', compact('venda','produtos'));

    }
    public function createpi2($id){
        $venda = Vendas::find($id);
        $produtos = Produtos::all();

        return view('conteudos.vendas.app_registar_vendapi2', compact('venda','produtos'));

    }
    public function createpi3($id){
        $venda = Vendas::find($id);
        $produtos = Produtos::all();

        return view('conteudos.vendas.app_registar_vendapi3', compact('venda','produtos'));

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


        if ($request->fotos_comprovacao) {
            $fotos_comprovacao = $request->fotos_comprovacao;
            $extensaoI =  $fotos_comprovacao->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'PNG' && $extensaoI!= 'JPG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }
        $venda->save();

        if ($request->fotos_comprovacao) {
                    File::move($fotos_comprovacao, public_path().'/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI);
                    $venda->fotos_comprovacao = '/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI;
                    $venda->save();
                }

                if ($request->anexo_pdf) {
                    $anexo_pdf = $request->anexo_pdf;
                    $extensaoI =  $anexo_pdf->getClientOriginalExtension();
                    if ($extensaoI!= 'pdf') {
                        return back()->with('erro', 'Erro: anexo inválido');
                    }
                }

                $venda->save();

                if ($request->anexo_pdf) {
                            File::move($anexo_pdf, public_path().'/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI);
                            $venda->anexo_pdf = '/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI;
                            $venda->save();
                        }

        $venda->save();
        Alert::toast('Venda Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/registar_venda_pi1/'.$venda->id);
    }
    public function storepi1(Request $request)
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
        $venda->fluxo = $request->fluxo ?? 'Vendedor';
        $venda->status = $request->status ?? 'Orçamento';


        if ($request->fotos_comprovacao) {
            $fotos_comprovacao = $request->fotos_comprovacao;
            $extensaoI =  $fotos_comprovacao->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'PNG' && $extensaoI!= 'JPG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }
        $venda->save();

        if ($request->fotos_comprovacao) {
                    File::move($fotos_comprovacao, public_path().'/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI);
                    $venda->fotos_comprovacao = '/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI;
                    $venda->save();
                }

                if ($request->anexo_pdf) {
                    $anexo_pdf = $request->anexo_pdf;
                    $extensaoI =  $anexo_pdf->getClientOriginalExtension();
                    if ($extensaoI!= 'pdf') {
                        return back()->with('erro', 'Erro: anexo inválido');
                    }
                }

                $venda->save();

                if ($request->anexo_pdf) {
                            File::move($anexo_pdf, public_path().'/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI);
                            $venda->anexo_pdf = '/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI;
                            $venda->save();
                        }

        $venda->save();
        Alert::toast('Venda Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/registar_venda_pi2/'.$venda->id);
    }
    public function storepi2(Request $request)
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


        if ($request->fotos_comprovacao) {
            $fotos_comprovacao = $request->fotos_comprovacao;
            $extensaoI =  $fotos_comprovacao->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'PNG' && $extensaoI!= 'JPG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }
        $venda->save();

        if ($request->fotos_comprovacao) {
                    File::move($fotos_comprovacao, public_path().'/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI);
                    $venda->fotos_comprovacao = '/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI;
                    $venda->save();
                }

                if ($request->anexo_pdf) {
                    $anexo_pdf = $request->anexo_pdf;
                    $extensaoI =  $anexo_pdf->getClientOriginalExtension();
                    if ($extensaoI!= 'pdf') {
                        return back()->with('erro', 'Erro: anexo inválido');
                    }
                }

                $venda->save();

                if ($request->anexo_pdf) {
                            File::move($anexo_pdf, public_path().'/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI);
                            $venda->anexo_pdf = '/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI;
                            $venda->save();
                        }

        $venda->save();
        Alert::toast('Venda Registrada Com Sucesso', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/registar_venda_pi3/'.$venda->id);
    }
    public function storepi3(Request $request)
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


        if ($request->fotos_comprovacao) {
            $fotos_comprovacao = $request->fotos_comprovacao;
            $extensaoI =  $fotos_comprovacao->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'PNG' && $extensaoI!= 'JPG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }
        $venda->save();

        if ($request->fotos_comprovacao) {
                    File::move($fotos_comprovacao, public_path().'/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI);
                    $venda->fotos_comprovacao = '/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI;
                    $venda->save();
                }

                if ($request->anexo_pdf) {
                    $anexo_pdf = $request->anexo_pdf;
                    $extensaoI =  $anexo_pdf->getClientOriginalExtension();
                    if ($extensaoI!= 'pdf') {
                        return back()->with('erro', 'Erro: anexo inválido');
                    }
                }

                $venda->save();

                if ($request->anexo_pdf) {
                            File::move($anexo_pdf, public_path().'/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI);
                            $venda->anexo_pdf = '/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI;
                            $venda->save();
                        }

        $venda->save();
        Alert::toast('Fluxo terminado, parabens', 'success');

        $user_logado = Auth::user();
        $this->registarLog("Uma nova venda com o id {$venda->id} foi criada com sucesso pelo usuário {$user_logado->name}", Auth::user()->id);

        return redirect('/orcamentos');
    }

    public function show($id)
    {
        $venda = Vendas::find($id);
        $produtos = Produtos::all();
        return view('conteudos.vendas.app_visualizar_venda', compact('venda','produtos'));
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

        if ($request->fotos_comprovacao) {
            $fotos_comprovacao = $request->fotos_comprovacao;
            $extensaoI =  $fotos_comprovacao->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'PNG' && $extensaoI!= 'JPG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }
        $venda->save();

        if ($request->fotos_comprovacao) {
                    File::move($fotos_comprovacao, public_path().'/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI);
                    $venda->fotos_comprovacao = '/media/vendas/Totalmidia_imag_'.$venda->id.'.'.$extensaoI;
                    $venda->save();
                }

                if ($request->anexo_pdf) {
                    $anexo_pdf = $request->anexo_pdf;
                    $extensaoI =  $anexo_pdf->getClientOriginalExtension();
                    if ($extensaoI!= 'pdf') {
                        return back()->with('erro', 'Erro: anexo inválido');
                    }
                }

                $venda->save();

                if ($request->anexo_pdf) {
                            File::move($anexo_pdf, public_path().'/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI);
                            $venda->anexo_pdf = '/media/anexos/Totalmidia_anexo_pdf_'.$venda->id.'.'.$extensaoI;
                            $venda->save();
                        }

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
