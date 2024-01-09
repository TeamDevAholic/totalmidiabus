@extends('layouts.app')

@section('content')


<main id="main-container">
    <!-- Page Content -->

      <!-- Quick Overview -->
      <div class="bg-body-light">
        <div class="content content-full">
          <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Permissões no sistema</h1>

          </div>
        </div>
      </div>
       <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Defina as permissões para as determinadas funções</h3>
            </div>
            <div class="block-content">
<div class="card">


</div class="card-body">

<form action="/salvar_permissions_roles" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="table-responsive bg-white">

    <table class="table table-striped table-bordered">

      <thead> 
        <tr>
          <th>Perfil {{$role_id}}</th>
        </tr>
      </thead>

      <tbody>
        <td>
          <select class="form-control" id="select_role" name="role_id">
            @foreach($roles as $item)
            <option value="{{$item->id}}" {{$item->id == $role_id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
          </select>
        </td>
      </tbody>
    </table>


  </div>
<br><br>

<table class="table">
  <thead>
  <tr>
            <th scope="col">Premissões</th>
            <th scope="col">Visualização </th>
            <th scope="col">Inclusão </th>
            <th scope="col">Edição </th>
            <th scope="col">Exclusão </th>
        </tr>
  </thead>
  <tbody>

  <tr>
            <th scope="col">Seleções Coletivas</th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="visualizacao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="inclusao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="edicao"></th>
            <th scope="col">  <input type="checkbox" class="checkAll" data-column="exclusao"></th>
        </tr>

    {{-- <tr>
        <th scope="row">Dashboard</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_dashboard", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_dashboard"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_dashboard", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_dashboard"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_dashboard", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_dashboard"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_dashboard", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_dashboard"></td>
    </tr> --}}

    <tr>
        <th scope="row"><span><i class="fa fa-coins"></i> </span> Orçamento </th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_orcamento", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_orcamento"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_orcamento", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_orcamento"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_orcamento", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_orcamento"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_orcamento", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_orcamento"></td>
    </tr>

    <tr>
        <th scope="row"><span><i class="fa fa-user-plus"></i></span> Cadastro pi/venda </th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_cadastro_pi_venda", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_cadastro_pi_venda"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_cadastro_pi_venda", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_cadastro_pi_venda"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_cadastro_pi_venda", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_cadastro_pi_venda"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_cadastro_pi_venda", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_cadastro_pi_venda"></td>
    </tr>

    <tr>
        <th scope="row"><span><i class="fa fa-people-carry"></i></span> Garagem </th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_garagem", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_garagem"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_garagem", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_garagem"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_garagem", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_garagem"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_garagem", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_garagem"></td>
    </tr>

    <tr>
        <th scope="row"><span><i class="fa fa-newspaper"></i> </span> Relatórios</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_relatorios", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_relatorios", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_relatorios", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_relatorios", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_relatorios"></td>
    </tr>
    <tr>
        <th scope="row"><span><i class="fa fa-file"></i></span> Logs</th>
        <td><input class="form-check-input" type="checkbox" id="visualizacao" name="visualizacao[]" {{ in_array("pode_visualizar_relatorios", old('visualizacao', $selected)) ? 'checked' : '' }} value="pode_visualizar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="inclusao" name="inclusao[]" {{ in_array("pode_registrar_relatorios", old('inclusao', $selected)) ? 'checked' : '' }} value="pode_registrar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="edicao" name="edicao[]" {{ in_array("pode_editar_relatorios", old('edicao', $selected)) ? 'checked' : '' }} value="pode_editar_relatorios"></td>
        <td><input class="form-check-input" type="checkbox" id="exclusao" name="exclusao[]" {{ in_array("pode_eliminar_relatorios", old('exclusao', $selected)) ? 'checked' : '' }} value="pode_eliminar_relatorios"></td>
    </tr>


  </tbody>
</table>

<center> <button type="submit" name="Enviar" class="btn btn-primary">Salvar</button> </center>

</form>

</div>
      </div>
    </div>
</main>

<script>
    document.querySelector('#select_role').addEventListener('change', function() {
      let value = this.value;
      // use o método fetch para enviar a requisição
      window.location.href = "/permissions_roles_by_id/" + value;
    });
</script>


<script>
    // Adicione event listeners para os checkboxes de marcar/desmarcar colunas
    const checkAllCheckboxes = document.querySelectorAll('.checkAll');
    checkAllCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const column = this.getAttribute('data-column');
            const checkboxes = document.querySelectorAll(`input[name="${column}[]"]`);
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });
    });
</script>

@endsection
