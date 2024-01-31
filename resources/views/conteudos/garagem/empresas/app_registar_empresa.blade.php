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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Nova Empresa</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/empresas" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Nova Empresa</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_empresa" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Nome da empresa</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="nome" value="">
                    </div>
                    <div class="mb-4 col-8 inline-block">
                        <label class="form-label" for="logomarca">Logomarca</label>
                        <input type="file" class="form-control" id="logomarca" required name="logomarca" value="{{$cliente->cpf ?? ''}}" maxLength="14" onkeypress="formatarCPF(event)" autocomplete="off" maxlength="14 ">
                    </div>
                        <div class="mb-4 col-8 inline-block cep">
                        <label class="form-label" for="dm-ecom-product-name">Descrição</label>
                       <textarea name="descricao" class="form-control" id="descricao" cols="10" rows="5" style="resize: none;" required></textarea>
                    </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar empresa</button>
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
