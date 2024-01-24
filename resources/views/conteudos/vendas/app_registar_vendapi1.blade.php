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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Venda P.I 1 </h1>

                    </div>
                    <h5>Status <span class="badge bg-warning">Aguardando colagem</span></h5>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/vendas" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Venda</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_vendapi1" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="lista_produtos">Lista de produtos</label>
                      <select class="form-control" name="lista_produtos" id="lista_produtos">
                        @if ($produtos->isNotEmpty())
                        @foreach ($produtos as $item)
                        <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                        @endforeach
                        @else
                        <option value="" disabled>Nenhum produto encontrado</option>
                        @endif
                    </select>
                    </div>
                    <div class="mb-4 col-8 inline-block">
                        <label class="form-label" for="cpf">Número de P.I</label>
                        <input type="number" class="form-control" value="{{ $venda->numero_pi }}" id="numero_pi" required name="numero_pi"  maxLength="14" onkeypress="formatarCPF(event)" autocomplete="off" maxlength="14 ">
                        </div>
                        <div class="mb-4 col-8 inline-block">
                          <label class="form-label" for="qtd_parcelas">Quantidade por parcelas</label>
                          <input type="number" class="form-control" id="dm-ecom-product-name" value="{{ $venda->qtd_parcelas }}" required name="qtd_parcelas" >
                        </div>
                        <div class="mb-4 col-8 inline-block">
                          <label class="form-label" for="dm-ecom-product-name">Data de inicio da campanha</label>
                          <input type="date" class="form-control" id="dm-ecom-product-name" value="{{ $venda->inicio_campanha }}" required name="inicio_campanha" >
                        </div>
                        <div class="mb-4 col-8 inline-block">
                          <label class="form-label" for="dm-ecom-product-name">Número <small>(NF)</small></label>
                          <input type="number" class="form-control" id="dm-ecom-product-name" required value="{{ $venda->numero_nf }}" name="numero_nf" >
                        </div>
                        <div class="mb-4 col-8 inline-block">
                          <label class="form-label" for="valor_bruto">Valor bruto</label>
                          <input type="number" class="form-control" id="valor_bruto" required value="{{ $venda->valor_bruto }}" name="valor_bruto" >
                        </div>
                        <div class="mb-4 col-8 inline-block">
                          <label class="form-label" for="valor_imposto">Valor imposto</label>
                          <input type="number" name="valor_imposto" id="valor_imposto" value="{{ $venda->valor_imposto }}" class="form-control">
                        </div>
                        <div class="mb-4 col-8 inline-block cep">
                        <label class="form-label" for="dm-ecom-product-name">Valor depositado</label>
                        <input type="number" class="form-control" id="cep" value="{{ $venda->valor_depositado }}" name="valor_depositado" size="10" maxlength="9" required>
                        </div>
                        <div class="mb-4 col-8 inline-block rua">
                            <label class="form-label" for="pagamento_colagem">Pagamento colagem</label>
                            <input type="number" class="form-control" id="pagamento_colagem" value="{{ $venda->pagamento_colagem }}" name="pagamento_colagem"  required>
                        </div>

                        <div class="mb-4 col-8 inline-block Bairro">
                            <label class="form-label" for="pagamento_garagem">Pagamento garagem</label>
                            <input type="text" class="form-control" value="{{ $venda->pagamento_garagem }}" id="pagamento_garagem" name="pagamento_garagem" required>
                        </div>

                        <div class="mb-4 col-8 inline-block Cidade">
                            <label class="form-label" for="fotos_comprovacao">Foto de comprovação</label>
                            <input type="file" class="form-control" value="{{ $venda->fotos_comprovacao }}" id="fotos_comprovacao" name="fotos_comprovacao" required>
                        </div>

                        <div class="mb-4 col-8 inline-block complemento">
                            <label class="form-label" for="anexo_pdf">Anexo <small>(PDF)</small></label>
                            <input type="file" class="form-control" value="{{ $venda->anexo_pdf }}" id="anexo_pdf" name="anexo_pdf">
                        </div>

                        <input type="hidden" name="fluxo" value="Financeiro">
                        <input type="hidden" name="status" value="Aguardando colagem">
                        <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->




@endsection
