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
              <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Responsaveis</h1>

            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            @if ($responsaveis->isNotEmpty())
            <a style="margin-bottom: 10px;" href="/registar_responsavel" class="btn btn-info"><i class="fa fa-plus"></i> Cadastrar agora</a>
            <a style="margin-bottom: 10px;" href="/responsaveis" class="btn btn-danger"> Remover Filtro</a>
            <div class="mb-4 col-5 inline-block complemento">
                <label class="form-label" for="setor">Filtrar Responsáveis Por Setor</label>
                <select class="form-control" name="setor" id="responsavel">
                    <option value=""></option>
                    @foreach ($setores as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <div class="block block-themed">
                  <div class="block-header bg-gd-sun">
                    <h3 class="block-title">Listagem de todos os responsáveis</h3>
                  </div>
                    <div class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>WhatsApp</th>
                                    <th>Celular</th>
                                    <th class="text-center" style="width: 100px;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($responsaveis as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $item->id }}</th>
                                    <td class="fw-semibold">
                                        <a href="/visualizar_responsavel/{{$item->id}}">{{$item->nome}}</a>
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->whatsapp}}</td>
                                    <td>{{$item->celular}}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="/visualizar_responsavel/{{$item->id}}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Apagar responsavel" onclick="confirmarApagar({{$item->id}})">
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
                <p class="mb-0">Não existe nenhum responsavel cadastrado no sistema!</p>
              </div>
              <a href="/registar_responsavel" class="btn btn-info"><i class="fa fa-plus"></i> Cadastrar agora</a>
            @endif

        </div>
      </main>
<!-- Adicione o seguinte script para definir a função confirmarApagar -->
<script>
    function confirmarApagar(responsavelId) {
        Swal.fire({
            title: 'Confirmar Ação',
            text: 'Tem certeza de que deseja apagar este responsavel?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_responsavel/" + responsavelId;
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        // Adiciona um ouvinte de evento para detectar mudanças no elemento select
        $('#responsavel').on('change', function() {
            // Obtém o valor selecionado
            var setorId = $(this).val();

            // Se um setor foi selecionado, redireciona para a URL com o filtro
            if (setorId) {
                // Substitua 'URL_DO_FILTRO' pela URL real com o filtro de responsáveis por setor
                var url = 'filtrar_responsaveis_por_setor/' + setorId;
                window.location.href = url;
            }
        });
    });
</script>

@endsection
