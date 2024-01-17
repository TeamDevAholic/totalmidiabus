@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<center>
  @if (session('erro'))
  {{-- expr --}}
  <div class="alert alert-danger" role="alert">
    {{session('erro')}}
  </div>
  @endif
</center>


<!-- Latest Friends -->
<h2 class="content-heading">
        Listagem de Clientes
          </h2>

              <!-- All Products Table -->
              <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="d-sm-table-cell text-center">Nome</th>
                      <th class="d-sm-table-cell text-center">Whatsapp</th>
                      <th class="d-sm-table-cell text-center">Email</th>
                      <th class="d-sm-table-cell text-center">Data de Cadastro</th>
                      <th class="text-center">Acções</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($clientes as $item)
                    <tr>

                      <td class="d-sm-table-cell text-center fs-sm">
                        <a class="fw-semibold" href="/visualizar_cliente/{{$item->id}}"> {{$item->nome}} </a></td>
                      <td class="d-sm-table-cell text-center fs-sm">
                        <strong>{{$item->whatsapp}}</strong>
                      </td>
                      <td class="d-sm-table-cell text-center fs-sm">
                        <strong>{{$item->email}}</strong>
                      </td>
                      <td class="d-sm-table-cell text-center fs-sm">
                        <strong>{{$item->created_at}}</strong>
                      </td>
                      <td class="text-center fs-sm">
                        <a class="btn btn-sm btn-alt-secondary" href="/visualizar_cliente/{{$item->id}}">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary" href="/eliminar_cliente/{{$item->id}}">
                          <i class="fa fa-fw fa-times text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- END All Products Table -->


@endsection
