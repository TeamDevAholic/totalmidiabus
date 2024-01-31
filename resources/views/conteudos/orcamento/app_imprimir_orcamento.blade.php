@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')

      <!-- Main Container -->
      <main id="main-container">


        <!-- Page Content -->
        <div class="content content-boxed">
          <!-- Orçamento -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/orcamentos" style="margin-right: 10px;">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    <span class="d-sm-inline ms-1"></span>
                  </a>
              <h3 class="block-title">#{{$orcamento->id}}</h3>
              <div class="block-options">
                <!-- Print Page functionality is initialized dmPrint() -->
                <button type="button" class="btn-block-option" onclick="Dashmix.helpers('dm-print');">
                  <i class="si si-printer me-1"></i> Imprimir Orçamento
                </button>
              </div>
            </div>
            <img src="/media/photos/img1.jpg" alt="" style="width: 100%;">

            <div class="block-content">

              <div class="p-sm-4 p-xl-7">
                <!-- Orçamento Info -->
                <div class="row mb-5">
                  <!-- Company Info -->
                  <div class="col-6">
                    <p class="h3">Orçamento</p>


                      <p class="text-muted mb-2">
                        Campanha: {{$orcamento->nome_campanha}}
                      </p>

                  </div>
                  <!-- END Company Info -->

                  <!-- Client Info -->
                  <div class="col-6 text-end">
                    <p class="h3">Cliente</p>
                    <p class="text-muted mb-2">
                        Nome: {{$cliente->nome}}
                    </p>
                    <p class="text-muted mb-2">
                        CNPJ: {{$cliente->cnpj}}
                    </p>

                  </div>
                  <!-- END Client Info -->
                </div>
                <!-- END Orçamento Info -->

                <!-- Table -->
                <div class="table-responsive push">
                  <table class="table table-bordered">
                    <thead class="bg-body">
                      <tr>
                        <th class="text-center" style="width: 150px;">Nome do Produto</th>
                        <th class="text-end">Qtd</th>
                        <th class="text-end">Início</th>
                        <th class="text-end">Final</th>
                        <th class="text-end">Valor</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($itens_vendas as $item)
                      <tr>
                        <td>
                          <p class="fw-semibold mb-1">{{$item->nome}}</p>
                        </td>
                        <td>
                            <div class="text-muted">{{$item->qtd_produto}}</div>
                          </td>
                          <td class="text-center">
                            <span>{{ \Carbon\Carbon::parse($item->data_inicio)->format('d-m-Y') }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ \Carbon\Carbon::parse($item->data_final)->format('d-m-Y') }}</span>
                        </td>

                          <td class="text-center">
                            <span class="">{{$item->valor}}</span>
                          </td>



                      </tr>
                      @endforeach

                      <tr>
                        <td colspan="4" class="fw-bold text-uppercase text-end bg-body-light">Total Geral</td>
                        <td class="fw-bold text-end bg-body-light">R$ {{$valor_total}},00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <p class="text-muted text-center my-5">
                  Relatório do Orçamento
                </p>
                <!-- END Footer -->
              </div>
            </div>
            <img src="/media/photos/img2.jpg" alt="" style="width: 100%;">
          </div>
          <!-- END Orçamento -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      @endsection
