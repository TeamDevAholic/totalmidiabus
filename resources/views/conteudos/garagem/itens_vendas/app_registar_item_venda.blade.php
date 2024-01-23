@extends('layouts.app')

@section('content')

      <!-- Main Container -->
      <main id="main-container">
        <center>
          @if (session('erro'))
          {{-- expr --}}
          <div class="alert alert-danger" role="alert">
            {{session('erro')}}
          </div>
          @endif
        </center>
                <!-- Hero -->
                <div class="bg-body-light">
                  <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Novo Item de Venda</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/itens_vendas" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Novo Item de Venda</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_item_venda" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="orcamento_id">Orçamento</label>
                      <select name="orcamento_id" id="orcamento_id" class="form-control">
                        @if ($orcamento->isNotEmpty())
                        @foreach ($orcamento as $item)
                        <option value="{{ $item->orcamento_id }}">{{ $item->nome_campanha }}</option>
                        @endforeach
                        @else
                        <option value="" disabled>Nenhum orçamento encontrado</option>
                        @endif
                      </select>
                    </div>
                    <div class="mb-4 col-8 inline-block">
                        <label class="form-label" for="logomarca">Venda</label>
                       <select name="venda_id" id="venda_id" class="form-control">
                        @if ($venda->isNotEmpty())
                        @foreach ($venda as $item)
                        <option value="{{ $item->venda_id }}">{{ $item->id }}</option>
                        @endforeach
                        @else
                        <option value="" disabled>Nenhuma venda encontrada</option>
                        @endif
                       </select>
                    </div>
                        <div class="mb-4 col-8 inline-block cep">
                        <label class="form-label" for="produto">Produto</label>
                        <select name="produto" id="produto" class="form-control">
                            @if ($produto->isNotEmpty())
                            @foreach ($produto as $item)
                            <option value="{{ $item->produto_id }}">{{ $item->nome }}</option>
                            @endforeach
                            @else
                            <option value="" disabled>Nenhum produto encontrado</option>
                            @endif
                           </select>
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="qtd_produto">Quantidade de produtos</label>
                            <input type="number" name="qtd_produto" id="qtd_produto" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="data_inicio">Data de inicio</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="data_final">Data final</label>
                            <input type="date" name="data_final" id="data_final" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="valor">Valor</label>
                            <input type="number" name="valor" id="valor" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="custo_colagem_produto">Custo de colagem do produto</label>
                            <input type="number" name="custo_colagem_produto" id="custo_colagem_produto" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                            <label class="form-label" for="custo_linha_onibus">Custo de linha do onibus</label>
                            <input type="number" name="custo_linha_onibus" id="custo_linha_onibus" class="form-control">
                        </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar item</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->

                </div>
      </main>
@endsection
