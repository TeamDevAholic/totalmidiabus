@extends('layouts.app')

@section('content')

<main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <!-- Quick Overview -->
      <div class="row items-push">
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="be_pages_ecom_orders.html">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-primary mb-1"> {{$total_empresas}} </div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Total de Empresas
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-success mb-1">{{$total_produtos}}</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Total de Produtos
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">{{$total_setores}}</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Total de Setores
              </p>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-3">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">{{$total_usuarios}}</div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Total de Usuários
              </p>
            </div>
          </a>
        </div>
      </div>
      <!-- END Quick Overview -->



      <!-- Top Products and Latest Orders -->
      <div class="row">
        <div class="col-xl-6">
          <!-- Top Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Orçamentos do Mês</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-borderless table-striped table-vcenter fs-sm">
                <tbody>
                    @foreach ($orcamentos_mes as $item)

                  <tr>
                    <td class="text-center">
                      <a class="fw-semibold" href="/visualizar_orcamento/{{$item->id}}"> {{$item->nome_campanha}} </a>
                    </td>
                    <td>
                      <a class="fw-medium"> {{$item->created_at}}</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!-- END Top Products -->
        </div>
        <div class="col-xl-6">
          <!-- Latest Orders -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Vendas do Mês</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <table class="table table-borderless table-striped table-vcenter fs-sm">
                <tbody>
                    @foreach ($vendas_mes as $item)

                    <tr>
                      <td class="text-center">
                        <a class="fw-semibold" href="/visualizar_venda/{{$item->id}}"> {{$item->status}} </a>
                      </td>
                      <td>
                        <a class="fw-medium"> {{$item->created_at}}</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- END Latest Orders -->
        </div>
      </div>
      <!-- END Top Products and Latest Orders -->
    </div>
    <!-- END Page Content -->
  </main>

  @endsection
