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
              <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">setores</h1>

            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            @if ($setores->isNotEmpty())
            <a style="margin-bottom: 10px;" href="/registar_setor" class="btn btn-info"><i class="fa fa-plus"></i> Cadastrar agora</a>

            <div class="col-md-12">
                <div class="block block-themed">
                  <div class="block-header bg-gd-sun">
                    <h3 class="block-title">Listagem de todos os setores</h3>

                  </div>
                    <div class="block-content">


                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th class="text-center" style="width: 100px;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($setores as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $item->id }}</th>
                                    <td class="fw-semibold">
                                        <a href="/visualizar_setor/{{$item->id}}">{{$item->nome}}</a>
                                    </td>
                                    <td>{{$item->descricao}}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/visualizar_setor/{{$item->id}}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Apagar setor" onclick="confirmarApagar({{$item->id}})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
              </div>
            @else
            <div class="alert alert-danger alert-dismissible" role="alert">
                <h3 class="alert-heading fs-4 my-2">Desculpe!</h3>
                <p class="mb-0">Não existe nenhum setor cadastrado no sistema!</p>
              </div>
              <a href="/registar_setor" class="btn btn-info"><i class="fa fa-plus"></i> Cadastrar agora</a>
            @endif

        </div>
      </main>
<!-- Adicione o seguinte script para definir a função confirmarApagar -->
<script>
    function confirmarApagar(setorId) {
        Swal.fire({
            title: 'Confirmar Ação',
            text: 'Tem certeza de que deseja apagar este setor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_setor/" + setorId;
            }
        });
    }
</script>

@endsection
