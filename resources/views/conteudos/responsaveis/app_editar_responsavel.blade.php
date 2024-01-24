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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Responsavel</h1>
              </div>
            </div>
          </div>
          <!-- END Hero -->

          <!-- Page Content -->
          <div class="content">
          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
                <a class="btn  btn-hero btn-primary my-2" href="/responsaveis" style="margin-right: 10px;">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    <span class="d-sm-inline ms-1"></span>
                  </a>
              <h3 class="block-title">Editar Responsavel</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">

                    <div class="row">
                        <div class="col-lg-8 space-y-2">

                            <!-- Form Inline - Alternative Style -->
                            <form action="/actualizar_responsavel/{{$responsavel->id}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <div class="mb-4 col-9 inline-block">
                                      <label class="form-label" for="nome">Nome do Responsavel</label>
                                      <input type="text" class="form-control" id="nome" required name="nome" value="{{ $responsavel->nome }}">
                                    </div>

                                    <div class="mb-4 col-9 inline-block complemento">
                                        <label class="form-label" for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$responsavel->email ?? ''}}">
                                    </div>
                                    <div class="mb-4 col-9 inline-block complemento">
                                        <label class="form-label" for="descricao">Whatsapp</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{$responsavel->whatsapp ?? ''}}">
                                    </div>

                                    <div class="mb-4 col-9 inline-block complemento">
                                        <label class="form-label" for="celular">Celular</label>
                                        <input type="text" name="celular" id="celular" value="{{$responsavel->celular ?? ''}}" class="form-control">
                                    </div>
                                    <div class="mb-4 col-9 inline-block complemento">
                                        <label class="form-label" for="setor">Setor</label>
                                        <input type="text" name="setor" id="setor" value="{{$responsavel->setor ?? ''}}" class="form-control">
                                    </div>
                                    <div class="mb-4 col-9 inline-block complemento">
                                        <label class="form-label" for="data_aniversario">Data de aniversário</label>
                                        <input type="date" name="data_aniversario" id="data_aniversario" value="{{$responsavel->data_aniversario ?? ''}}" class="form-control">
                                    </div>

                                    <div class="mb-4 col-9 inline-block complemento">
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

                            <!-- END Form Inline - Alternative Style -->
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
          </div>
      </main>

          <!-- END Info -->


@endsection
