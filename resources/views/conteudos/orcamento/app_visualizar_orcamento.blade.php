@extends('layouts.app')
@section('title', '| Visualizar cliente')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <!-- Quick Actions -->
      <div class="row items-push">
        <div class="col-6">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">
                <i class="fa fa-pencil-alt"></i>
              </div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Editar Orçamento
              </p>
            </div>
          </a>
        </div>
        <div class="col-6">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-danger mb-1">
                <i class="fa fa-times"></i>
              </div>
              <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                Eliminar Orçamento
              </p>
            </div>
          </a>
        </div>
      </div>
      <!-- END Quick Actions -->

      <!-- User Info -->
      <div class="block block-rounded">

        <div class="block-content text-center">

          <div class="py-4">
            <div class="mb-3">
              <img class="img-avatar img-avatar96" src="/media/avatars/avatar15.jpg" alt="">
            </div>
            <h1 class="fs-lg mb-0">
                Cliente: {{ $cliente->nome }}
            </h1>
            <p class="text-muted">
              <i class="fa fa-award text-warning me-1"></i>
              Campanha: {{$orcamento->nome_campanha}}
            </p>
          </div>
          <br>

        </div>
        <div class="block-content bg-body-light text-center">
          <div class="row items-push text-uppercase">
            <div class="col-6 col-md-4">
              <div class="fw-semibold text-dark mb-1">ID do Orçamento</div>
              <a class="link-fx fs-3" href="javascript:void(0)">{{ $orcamento->id }}</a>
            </div>
            <div class="col-6 col-md-4">
              <div class="fw-semibold text-dark mb-1">Cliente </div>
              <a class="link-fx fs-3" href="javascript:void(0)">{{$cliente->nome ?? ''}}</a>
            </div>
            <div class="col-6 col-md-4">
              <div class="fw-semibold text-dark mb-1">Data de  Criação</div>
              <a class="link-fx fs-3" href="javascript:void(0)">{{$orcamento->created_at ?? ''}}</a>
            </div>


          </div>

        </div>
      </div>
      <!-- END User Info -->


      <!-- LISTA DE Vendas -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Detalhes da Venda</h3>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">ID Venda</th>
                  <th class="d-none d-sm-table-cell text-center">Nº PI</th>
                  <th class="d-none d-md-table-cell">Qtd Parcelas</th>
                  <th>Status</th>
                  <th class="d-none d-sm-table-cell">Início da Campanha</th>
                  <th class="d-none d-sm-table-cell text-end">Valor Bruto</th>
                  <th class="text-center">Ação</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="text-center fs-sm">
                    <a class="fw-semibold" href="/visualizar_venda/{{$venda->id}}">
                      {{$venda->id}}               </a>
                  </td>
                  <td class="d-none d-sm-table-cell text-center fs-sm">{{$venda->numero_pi}}</td>
                  <td class="d-none d-md-table-cell text-center fs-sm">
                    {{$venda->qtd_parcelas}}
                  </td>
                  <td>
                    @if ($venda->status == "Orçamento")
                        <span class="badge bg-status">{{$venda->status}}</span>
                    @endif
                    @if ($venda->status == "Venda")
                        <span class="badge bg-secondary">{{$venda->status}}</span>
                    @endif
                    @if ($venda->status == "Aguardando Colagem")
                        <span class="badge bg-secondary">{{$venda->status}}</span>
                    @endif
                    @if ($venda->status == "Aguardando Faturamento")
                        <span class="badge bg-secondary">{{$venda->status}}</span>
                    @endif
                    @if ($venda->status == "Venda Concluida")
                        <span class="badge bg-success">{{$venda->status}}</span>
                    @endif
                  </td>
                  <td class="d-none d-md-table-cell text-center fs-sm">
                    {{$venda->inicio_campanha}}
                  </td>
                  <td class="text-end d-none d-sm-table-cell fs-sm">
                    <strong>R$ {{$venda->valor_bruto}}</strong>
                  </td>
                  <td class="text-center fs-sm">
                    <a class="btn btn-sm btn-alt-secondary" href="/visualizar_venda/{{$venda->id}}">
                      <i class="fa fa-fw fa-eye"></i>
                    </a>
                    {{-- <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                      <i class="fa fa-fw fa-times text-danger"></i>
                    </a> --}}
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END LISTA DE COBRANÇAS -->


      <!-- END Private Notes -->
    </div>
    <!-- END Page Content -->
  </main>
  <!-- END Main Container -->

@endsection
