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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Venda P.I 3</h1>

                    </div>
                    <h5>Status <span class="badge bg-success">VENDA CONCLUIDA,  AGUARDAR APENAS A DATA DE PAGAMENTO PARA FECHAR O CICLO</span></h5>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">



@endsection
