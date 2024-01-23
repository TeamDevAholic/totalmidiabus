@extends('layouts.app')

@section('content')


      <!-- Main Container -->
      <main id="main-container">
<center>
  @if (session('erro'))
  <div class="alert alert-danger">
    {{ session('erro') }}
  </div>
  @endif
</center>


<div class="container  bg-light text-center" style="margin-top: 5%;">

  <div class="py-2">
    <h1 class="fw-bold text-dark  ">
      {{$linha->nome}}
    </h1>
  </div>
  <div style=" margin-left:73%; margin-top: -5%;">
    <a class="btn btn-hero btn-primary" href="/editar_item_venda/{{$linha->id}}" data-toggle="click-ripple">
      <i class="fa fa-pencil-alt"></i>
    </a>
    <a class="btn btn-hero btn-primary" href="#" onclick="confirmarApagar({{$linha->id}})" data-toggle="click-ripple">
      <i class="fa fa-trash"></i>
  </a>
    <a class="btn  btn-hero btn-primary my-2" href="/itens_vendas">
      <i class="fa fa-reply" aria-hidden="true"></i>
      <span class="d-sm-inline ms-1"></span>
    </a>
  </div>
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            @if ($linha->logomarca)

            <img class="profile-user-img img-fluid img-circle"
                 src="{{ $linha->logomarca }}"
                 alt="User profile picture">
            @else
            <img class="profile-user-img img-fluid img-circle"
                 src="{{ asset('media/avatars/avatar0.jpg') }}"
                 alt="User profile picture">
            @endif
          </div>

          <h3 class="profile-username text-center">{{ $linha->numero_linha }}</h3>

          <p class="text-muted text-center">{{ $linha->nome }}</p>

          <a href="/editar_item_venda/{{$linha->id}}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Mais informações do item </h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong>Produto</strong>
            <p>{{ $linha->produto_id }}</p>

          <hr>
          <strong>Quantidade de produtos</strong>
            <p>{{ $linha->qtd_produto }}</p>

          <hr>
          <strong>Data de inicio</strong>
            <p>{{ $linha->data_inicio }}</p>

          <hr>
          <strong>Data final</strong>
            <p>{{ $linha->data_final }}</p>

          <hr>
          <strong>Valor</strong>
            <p>{{ $linha->valor }}</p>

          <hr>
          <strong>Custo de colagem do produto</strong>
            <p>{{ $linha->custo_colagem_produto }}</p>

          <hr>
          <strong>Custo de linha de ônibus</strong>
            <p>{{ $linha->custo_linha_onibus }}</p>

          <hr>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Atividades</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Logs</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                  <span class="username">
                    <a href="#">Jonathan Burke Jr.</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                  </span>
                  <span class="description">Shared publicly - 7:30 PM today</span>
                </div>
                </div>
              <!-- /.post -->
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-danger">
                    10 Feb. 2014
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-envelope bg-primary"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-user bg-info"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-comments bg-warning"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-success">
                    3 Jan. 2014
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
                <h2 class="content-heading">Faça as alterações necessárias</h2>

                <div class="row">
                  <div class="col-lg-8 space-y-2">

                      <!-- Form Inline - Alternative Style -->
                      <form class="row" action="/actualizar_item_venda/{{$linha->id}}" method="POST" enctype="multipart/form-data">
                          @csrf <!-- CSRF token -->

                            <div class="mb-4 col-8 inline-block">
                              <label class="form-label" for="orcamento_id">Orçamento</label>

                            </div>
                            <div class="mb-4 col-8 inline-block">
                                <label class="form-label" for="logomarca">Venda</label>

                            </div>
                                <div class="mb-4 col-8 inline-block cep">
                                <label class="form-label" for="dm-ecom-product-name">Produto</label>

                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="qtd_produto">Quantidade de produtos</label>
                                    <input type="number" name="qtd_produto" value="{{ $linha->qtd_produto }}" id="qtd_produto" class="form-control">
                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="data_inicio">Data de inicio</label>
                                    <input type="date" name="data_inicio" id="data_inicio" value="{{ $linha->data_inicio }}" class="form-control">
                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="data_final">Data final</label>
                                    <input type="date" value="{{ $linha->data_final }}" name="data_final" id="data_final" class="form-control">
                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="valor">Valor</label>
                                    <input type="number" name="valor" value="{{ $linha->valor }}" id="valor" class="form-control">
                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="custo_colagem_produto">Custo de colagem do produto</label>
                                    <input type="number" value="{{ $linha->custo_colagem_produto }}" name="custo_colagem_produto" id="custo_colagem_produto" class="form-control">
                                </div>
                                <div class="mb-4 col-8 inline-block cep">
                                    <label class="form-label" for="custo_linha_onibus">Custo de linha do onibus</label>
                                    <input type="number" value="{{ $linha->custo_linha_onibus }}" name="custo_linha_onibus" id="custo_linha_onibus" class="form-control">
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
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

</div>


</main>


<script>

function confirmarApagar(linhaId) {
        Swal.fire({
            title: 'Confirmar Ação',
            text: 'Tem certeza de que deseja apagar este item?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_linha/" + linhaId;
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
