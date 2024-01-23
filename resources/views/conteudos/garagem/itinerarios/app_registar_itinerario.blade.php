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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Novo itinerario</h1>

                    </div>
                  </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


          <!-- Info -->
          <div class="block block-rounded">

            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/itinerarios" style="margin-right: 10px;">
                  <i class="fa fa-reply" aria-hidden="true"></i>
                  <span class="d-sm-inline ms-1"></span>
                </a>
              <h3 class="block-title">Registar Novo Itinerario</h3>
            </div>

            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/salvar_itinerario" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-8 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Nome do itinerario</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="nome" value="">
                    </div>
                    <div class="mb-4 col-8 inline-block">
                        <label class="form-label" for="linha_id">Linha</label>
                        <select name="linha_id" id="linha_id" class="form-control">
                           @if ($linhas->isNotEmpty())
                            @foreach ($linhas as $item)
                            <option value="{{$item->id}}">{{$item->nome}}</option>
                            @endforeach
                           @else
                            <option value="" disabled>Nenhuma linha disponivel</option>
                           @endif
                        </select>
                    </div>

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar itinerario</button>
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
