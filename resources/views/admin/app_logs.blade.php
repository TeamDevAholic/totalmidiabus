@extends('layouts.app')

@section('content')

<br><br>
@can('pode_visualizar_logs')

    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #eee0e0;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

<div class="pt-3" style="display: flex; justify-content: center">
    <div class="col-9 col-md-5 col-lg-10">

    <h1>Listagem de Logs</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Mensagem</th>
            <th>Data e Hora</th>
        </tr>
        </thead>
<tbody>
        <tr>
            @foreach ($logs as $log)
            <td>{{$log->descricao}}</td>
            <td>{{$log->created_at}}</td>
        </tr>
        @endforeach
        <!-- Adicione mais linhas de registro aqui -->
    </tbody>
    </table>
    <ul class="pagination">
        <li class="page-item">
        </li>
        <li class="page-item">{{ $logs->links()}}</li>
        <li class="page-item">
        </li>
        </ul>

    </div>
</div>


@else

<center>
    <div class="alert alert-danger" role="alert">
    Você não tem permissão para acessar esta página
    </div>
</center>
@endcan

@endsection
