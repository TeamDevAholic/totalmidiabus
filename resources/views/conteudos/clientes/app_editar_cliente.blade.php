@extends('layouts.app')

@section('content')

<br>
<center>
  @if (session('erro'))
  {{-- expr --}}
  <div class="alert alert-danger" role="alert">
    {{session('erro')}}
  </div>
  @endif
</center>


          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Editar Cliente</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                  <form action="/actualizar_cliente/{{$cliente->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Nome do Cliente</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="nome" value="{{$cliente->nome}}">
                    </div>
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Data de Nascimento</label>
                      <input type="date" class="form-control" id="dm-ecom-product-name" required name="data_nascimento" value="{{$cliente->data_nascimento}}">
                    </div>
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Email</label>
                      <input type="email" class="form-control" id="dm-ecom-product-name" required name="email" value="{{$cliente->email}}">
                    </div>
                    <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Whatsapp</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="whatsapp" value="{{$cliente->whatsapp}}">
                    </div>
                    <!-- <div class="mb-4 col-5 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Cep</label>
                      <input type="text" class="form-control" id="dm-ecom-product-name" required name="cep" value="{{$cliente->cep}}">
                    </div> -->
                    <!-- <div class="mb-4 col-10 inline-block">
                      <label class="form-label" for="dm-ecom-product-name">Foto do cliente</label>
                      <input type="file" class="form-control" id="dm-ecom-product-name" name="foto" value="">
                    </div> -->

                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Salvar Cliente</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->


@endsection
