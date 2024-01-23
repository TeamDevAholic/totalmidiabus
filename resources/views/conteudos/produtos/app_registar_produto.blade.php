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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Novo Cliente</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/produtos" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Novo Produto</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_produto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="nome">Nome do Produto</label>
                      <input type="text" class="form-control" id="nome" required name="nome" value="">
                    </div>

                    <div class="mb-4 col-5 inline-block complemento">
                        <label class="form-label" for="preco">Preço</label>
                        <input type="number" class="form-control" id="preco" name="preco" value="{{$cliente->preco ?? ''}}">
                    </div>
                    <div class="mb-4 col-5 inline-block complemento">
                        <label class="form-label" for="descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="descricao" cols="10" style="resize: none;" rows="5"></textarea>
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



@endsection
