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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Nova linha</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/linhas" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Nova Linha</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_linha" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="nome">Nome</label>
                      <input type="text" name="nome" class="form-control" id="nome">
                    </div>
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="numero_linha">Número da linha</label>
                      <input type="number" name="numero_linha" class="form-control" id="numero_linha">
                    </div>
                    <div class="mb-4 col-8 inline-block">
                        <label class="form-label" for="municipio">Município</label>
                      <input type="text" name="municipio" id="municipio" class="form-control">
                    </div>
                        <div class="mb-4 col-8 inline-block cep">
                        <label class="form-label" for="empresa_id">Empresa</label>
                        <select name="empresa_id" id="empresa_id" class="form-control">
                            @if ($empresa->isNotEmpty())
                            @foreach ($empresa as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                            @else
                            <option value="" disabled>Nenhuma empresa encontrada</option>
                            @endif
                           </select>
                        </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar</button>
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
