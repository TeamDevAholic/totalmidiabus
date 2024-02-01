@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Venda P.I </h1>

                    </div>
                    <h5>Esta venda pertence ao orçamento número {{$id}} </h5>
                  </div>
                </div>
                <!-- END Hero -->


                <div class="content content-boxed">




  <div class="block block-rounded">
    <div class="block-content block-content-full">

        <form action="/imprimir_orcamento" method="POST">
            @csrf

            <input type="hidden" name="orcamento_id" value="{{$orcamento->id}}">
            <input type="hidden" name="venda_id" value="{{$venda->id}}">
            <button type="submit" class="btn btn-hero btn-success my-2" style="margin-right: 10px;">
                <span class="d-sm-inline ms-1"></span> Imprimir Orçamento
            </button>
        </form>
      <div class="d-sm-flex">
        <div class="ms-sm-2 me-sm-4 py-2 text-center">
          {{-- <a class="item item-rounded bg-body-dark text-dark fs-2 mb-2 " style="margin-left: 15px;" href="javascript:void(0)">
          </a> --}}
        </div>
        <div class="py-2">
          <p class="link-fx h4 mb-1 d-inline-block text-dark" >
            Cliente: {{$cliente->nome}}
          </p>

          <p class="text-muted mb-2">
            Campanha: {{$orcamento->nome_campanha}}
          </p>
          <p class="text-muted mb-2">
            Fluxo: {{$venda->fluxo}}
          </p>
          <p class="text-muted mb-2">
            Status: {{$venda->status}}
          </p>

        </div>


      </div>


    </div>
    <center>
        <!-- Seu formulário existente -->



<form action="{{ route('atualizar.descricao.orcamento', ['id' => $id]) }}" method="POST">

  @csrf
        <div class="mb-4 col-5 inline-block">
            <label class="form-label" for="dm-ecom-product-name">Descrição da Campanha</label>
            <textarea name="nova_descricao"  value="{{$orcamento->descricao}}" class="form-control" id="" cols="30" rows="10" required>{{$orcamento->descricao}}</textarea>
            </div>
            <button type="submit" class="btn btn-md btn-primary">Salvar</button>
            <br><br>
        </div>


        </form>

    </center>
  </div>


   <!-- Page Content -->
   <div class="content">


    <!-- All Orders -->
<div class="block block-rounded">
<div class="block-header block-header-default">
<a class="btn  btn-hero btn-primary my-2" href="#" style="margin-right: 10px;" data-toggle="modal" data-target="#exampleModal">
    <span class="d-sm-inline ms-1"></span> + Adicionar Produto
  </a>
<h3 class="block-title">Produtos A Venda</h3>
<div class="block-options">
<div class="dropdown">


</div>
</div>
</div>

<div class="block-content">
<!-- All Orders Table -->
<div class="table-responsive">
<table class="table table-borderless table-striped table-vcenter fs-sm">
  <thead>
    <tr>
      <th class="text-center" style="width: 100px;">ID</th>
      <th class="d-none d-sm-table-cell text-center">Nome do Produto</th>
      <th class="d-none d-xl-table-cell">Quantidade</th>
      <th class="d-none d-xl-table-cell text-center">Data de Início</th>
      <th class="d-none d-sm-table-cell text-end">Data Final</th>
      <th class="d-none d-sm-table-cell text-end">Valor</th>
      <th class="d-none d-sm-table-cell text-end">Custo de Colagem</th>
      <th class="d-none d-sm-table-cell text-end">Custo de Linha</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($itens_vendas as $item)

    <tr>
      <td class="text-center">
        <a class="fw-semibold" href="be_pages_ecom_order.html">
          <strong> {{$item->id}} </strong>
        </a>
      </td>
      <td class="d-none d-sm-table-cell text-center">{{$item->nome}}</td>

      <td class="d-none d-xl-table-cell">
        <a class="fw-semibold" href="be_pages_ecom_customer.html">{{$item->qtd_produto}}</a>
      </td>
      <td class="d-none d-xl-table-cell text-center">
        <a class="fw-semibold" href="be_pages_ecom_order.html">{{ \Carbon\Carbon::parse($item->data_inicio)->format('d-m-Y') }}</a>
    </td>
    <td class="d-none d-sm-table-cell text-end">
        <strong>{{ \Carbon\Carbon::parse($item->data_final)->format('d-m-Y') }}</strong>
    </td>

      <td class="d-none d-sm-table-cell text-end">
        <strong>R$ {{$item->valor}},00</strong>
      </td>
      <td class="d-none d-sm-table-cell text-end">
        <strong>R$ {{$item->custo_colagem_produto}},00</strong>
      </td>
      <td class="d-none d-sm-table-cell text-end">
        <strong>R$ {{$item->custo_linha_onibus}},00</strong>
      </td>
      <td class="text-center fs-base">
        <a class="btn btn-sm btn-alt-secondary" data-toggle="modal" data-target="#modalShowItem{{$item->id}}">
          <i class="fa fa-fw fa-eye"></i>
        </a>
        <a class="btn btn-sm btn-alt-secondary" data-toggle="modal" data-target="#modalEditItem{{$item->id}}">
            <i class="fa fa-fw fa-edit"></i>
          </a>
        <a class="btn btn-sm btn-alt-secondary" data-toggle="modal" data-target="#modalDeleteItem{{$item->id}}">
          <i class="fa fa-fw fa-times text-danger"></i>
        </a>
      </td>
    </tr>
    @endforeach

    <tr>
        <td colspan="4" class="fw-bold text-uppercase text-end bg-body-light">Valor Total</td>
        <td class="fw-bold text-end bg-body-light">R$ {{$valor_total}},00</td>
    </tr>

  </tbody>
</table>
</div>
<!-- END All Orders Table -->

<form action="/salvar_venda" method="POST" enctype="multipart/form-data">

@csrf

<input type="hidden" name="orcamento_id" value="{{$id}}">
<input type="hidden" name="venda_id" value="{{$venda->id}}">

<button type="submit" class="btn  btn-hero btn-success my-2" style="margin-right: 10px;">
<span class="d-sm-inline ms-1"></span> Próximo Passo >>
</button>
</form>

</div>
</div>
<!-- END All Orders -->



<!-- Modal Adicionar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form method="post" action="/salvar_item_venda">
@csrf
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Adicionar Um Novo Produto</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<input type="hidden" name="orcamento_id" value="{{$id}}">
<input type="hidden" name="venda_id" value="{{$venda->id}}">
<div class="form-group">
    <label class="form-label" for="lista_produtos">Lista de produtos</label>
    <select class="form-control" name="produto_id" id="lista_produtos" required>
      @if ($produtos->isNotEmpty())
      @foreach ($produtos as $produto)
      <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
      @endforeach
      @else
      <option value="" disabled>Nenhum produto encontrado</option>
      @endif
  </select>
</div>
<div class="form-group">
  <label class="form-label" for="exampleInputPassword1">Quantidade de Produtos</label>
  <input type="number" class="form-control" id="exampleInputPassword1" name="qtd_produto" placeholder="digite a quantidade" required>
</div>
<div class="form-group">
    <label class="form-label" for="exampleInputPassword1">Data de Início</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="data_inicio" required>
  </div>
  <div class="form-group">
    <label class="form-label" for="exampleInputPassword1">Data Final</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name="data_final" required>
  </div>
  <div class="form-group">
    <label class="form-label" for="exampleInputPassword1">Valor</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="valor" placeholder="digite a quantidade" required>
  </div>
  <div class="form-group">
    <label class="form-label" for="exampleInputPassword1">Custo de Colagem</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="custo_colagem_produto" placeholder="Insira o valor" required>
  </div>
  <div class="form-group">
    <label class="form-label" for="exampleInputPassword1">Custo de Linha</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="custo_linha_onibus" placeholder="Insira o valor" required>
  </div>
<br>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Adicionar Produto</button>
</div>
</form>

</div>
</div>
</div>



@foreach ($itens_vendas as $item)
<!-- Modal Editar -->
<div class="modal fade" id="modalEditItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form method="post" action="/actualizar_item_venda">
    @csrf
<input type="hidden" name="item_venda_id" value="{{$item->id}}">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Editar Item {{$item->id}} </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
    <input type="hidden" name="orcamento_id" value="{{$id}}">
    <input type="hidden" name="venda_id" value="{{$venda->id}}">
        <div class="form-group">
            <label class="form-label" for="lista_produtos">Lista de produtos</label>
            <select class="form-control" name="produto_id" id="lista_produtos" required>
            @if ($produtos->isNotEmpty())
            @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ $produto->id == $item->produto_id ? 'selected' : '' }}>{{ $produto->nome }}</option>
            @endforeach
            @else
            <option value="" disabled>Nenhum produto encontrado</option>
            @endif
        </select>
        </div>
        <div class="form-group">
        <label class="form-label" for="exampleInputPassword1">Quantidade de Produtos</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="qtd_produto" value="{{$item->qtd_produto}}" placeholder="digite a quantidade" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Data de Início</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data_inicio" value="{{$item->data_inicio}}" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Data Final</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="data_final" value="{{$item->data_final}}" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Valor</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="valor" value="{{$item->valor}}" placeholder="digite a quantidade" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Custo de Colagem</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="custo_colagem_produto" value="{{$item->custo_colagem_produto}}" placeholder="Insira o valor" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Custo de Linha</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="custo_linha_onibus" value="{{$item->custo_linha_onibus}}" placeholder="Insira o valor" required>
        </div>
        <br>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Atualizar Item</button>
</div>
</form>

</div>
</div>
</div>



<!-- Modal Visualizar -->
<div class="modal fade" id="modalShowItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <h6>Lista de produtos</h6>
        <p>{{ $item->nome }}</p>

        <h6>Quantidade de Produtos</h6>
        <p>{{ $item->qtd_produto }}</p>

        <h6>Data de Início</h6>

        <p>
        <span>{{ \Carbon\Carbon::parse($item->data_inicio)->format('d-m-Y') }}</span>
    </p>

        <h6>Data Final</h6>
        <p>     <span>{{ \Carbon\Carbon::parse($item->data_final)->format('d-m-Y') }}</span></p>

        <h6>Valor</h6>

        <p>R${{ $item->valor }},00</p>

        <h6>Custo de Colagem</h6>
        <p>{{ $item->custo_colagem_produto }}</p>

        <h6>Custo de Linha</h6>
        <p>{{ $item->custo_linha_onibus }}</p>

        <br>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <!-- Adicione outros botões ou ações aqui, se necessário -->
    </div>

</div>
</div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalDeleteItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Operação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Tem a certeza que pretende eliminar o item <strong>{{$item->nome}}</strong> ?
    </div>
    <div class="modal-footer">
        <form method="post" action="/eliminar_item_venda">
            @csrf
            @method('DELETE')
            <input type="hidden" name="item_venda_id" value="{{$item->id}}">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    </div>
</div>
</div>
</div>



</div>




  @endforeach

@endsection
