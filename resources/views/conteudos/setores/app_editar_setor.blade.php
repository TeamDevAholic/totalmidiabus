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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">setor</h1>
              </div>
            </div>
          </div>
          <!-- END Hero -->

          <!-- Page Content -->
          <div class="content">
          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Editar setor</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">

                    <div class="row">
                        <div class="col-lg-8 space-y-2">

                            <!-- Form Inline - Alternative Style -->
                            <form class="row" action="/actualizar_setor/{{$setor->id}}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- CSRF token -->

                                <!-- Primeira Coluna -->
                                <div class="col-md-12">

                                    <!-- Nome input -->
                                    <div class="form-group mb-2">
                                        <label for="example-if-email2">Nome</label>
                                        <input type="text" value="{{ $setor->nome }}" class="form-control form-control-lg" id="example-if-email2" name="nome" placeholder="Nome">
                                    </div>

                                    <!-- Descrição input -->
                                    <div class="form-group mb-2">
                                        <label for="example-if-email2">Descrição</label>
                                        <textarea name="descricao" class="form-control" id="descricao" cols="10" rows="5" style="resize: none;">{{ $setor->descricao }}</textarea>
                                    </div>


                                </div>

                                <!-- Submit button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-secondary">Guardar</button>
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
