@extends('layouts.app')
@section('title', '| Visualizar produto')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


 <!-- Main Container -->
 <main id="main-container">
    <!-- Page Content -->
    <div class="content">
      <!-- Quick Actions -->
      <div class="row items-push">
        <div class="col-6">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="/editar_produto/{{$produto->id}}">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold mb-1">
                <i class="fa fa-pencil-alt"></i>
              </div>
              <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                Editar produto
              </p>
            </div>
          </a>
        </div>
        <div class="col-6">
          <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="#" onclick="confirmarEliminar({{$produto->id}})" data-toggle="click-ripple">
            <div class="block-content py-5">
              <div class="fs-3 fw-semibold text-danger mb-1">
                <i class="fa fa-times"></i>
              </div>
              <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                Eliminar produto
              </p>
            </div>
          </a>
        </div>
      </div>
      <!-- END Quick Actions -->

      <!-- User Info -->
      <div class="block block-rounded">

        <div class="block-content text-center">

          <div class="py-4">
            <div class="mb-3">
              <img class="img-avatar img-avatar96" src="/media/avatars/avatar15.jpg" alt="">
            </div>
            <h1 class="fs-lg mb-0">
                Nome do produto: {{ $produto->nome }}
            </h1>
            <p class="text-muted">
              <i class="fa fa-award text-warning me-1"></i>
              Status: @if ($produto->status = 1)
                <span class="badge bg-success">Ativo</span>
              @else
              <span class="badge bg-danger">Inativo</span>
              @endif
            </p>
          </div>
          <br>

        </div>
        <div class="block-content bg-body-light text-center">
          <div class="row items-push text-uppercase">
            <div class="col-6 col-md-4">
              <div class="fw-semibold text-dark mb-1">ID do produto</div>
              <a class="link-fx fs-3" href="javascript:void(0)">{{ $produto->id }}</a>
            </div>
            <div class="col-6 col-md-4">
              <div class="fw-semibold text-dark mb-1">Descrição</div>
              <a class="link-fx fs-3" href="javascript:void(0)">{{$produto->descricao ?? ''}}</a>
            </div>

          </div>

        </div>
      </div>
      <!-- END User Info -->



      <!-- END Private Notes -->
    </div>
    <!-- END Page Content -->
  </main>



<script>
   function confirmarEliminar(produtoId) {
        Swal.fire({
            title: 'Confirmar Eliminar',
            text: 'Tem certeza de que deseja eliminar este produto?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_produto/" + produtoId;
            }
        });
    }

  $(document).ready(function() {
    // Handle click event for Timeline tab
    $('a[href="#timeline"]').on('click', function(e) {
      e.preventDefault(); // Prevent the default behavior of the link
      // Hide other tab contents
      $('.tab-pane').removeClass('active');
      // Show the Timeline content
      $('#timeline').addClass('active');
    });

    // Handle click event for Settings tab
    $('a[href="#settings"]').on('click', function(e) {
      e.preventDefault(); // Prevent the default behavior of the link
      // Hide other tab contents
      $('.tab-pane').removeClass('active');
      // Show the Settings content
      $('#settings').addClass('active');
    });

    // Handle click event for Activity tab
    $('a[href="#activity"]').on('click', function(e) {
      e.preventDefault(); // Prevent the default behavior of the link
      // Hide other tab contents
      $('.tab-pane').removeClass('active');
      // Show the Activity content
      $('#activity').addClass('active');
    });
  });
</script>


@endsection
