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

                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">

            <div class="col-md-12">
                <div class="block block-rounded">
                  <div class="block-content block-content-full bg-gd-aqua text-center">
                    <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                      <i class="fa fa-check-double fa-600px text-white"></i>
                    </a>
                    <h1 class="text-white fw-light mt-3 mb-0">
                      Parabéns
                    </h1>
                    <h3 class="text-white-75 mb-0">
                      A venda foi concluída com êxito
                    </h3>
                  </div>
                  <div class="block-content block-content-full">
                    <p class="alert alert-warning">
                        VENDA CONCLUÍDA, AGUARDAR APENAS A DATA DE PAGAMENTO PARA FECHAR O CICLO
                    </p>
                    <center>
                    <div class="row g-sm js-gallery img-fluid-100">
                    <center>  <div class="col-md-6 col-lg-4 animated fadeIn push">
                        <a class="btn btn-info" style="margin-bottom: 2px;" data-bs-toggle="tooltip" title="Ver todos orçamentos" href="/orcamentos">
                         <i class="fa fa-reply"></i>   Orçamentos
                        </a>
                        <a class="btn btn-secondary" style="margin-bottom: 2px;" data-bs-toggle="tooltip" title="Ver orçamento gerado" href="/visualizar_orcamento/{{$orcamento->id}}">
                            <i class="fa fa-eye"></i>
                            Visualizar orçamento
                        </a>
                      </div>
                </center>
                    </div>
                </center>
                  </div>
                </div>
              </div>
                </div>
            </main>


@endsection
