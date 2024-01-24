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
      {{$venda->lista_produtos}}
    </h1>
  </div>
  <div style=" margin-left:73%; margin-top: -5%;">
    <a class="btn btn-hero btn-primary" href="/editar_item_venda/{{$venda->id}}" data-toggle="click-ripple">
      <i class="fa fa-pencil-alt"></i>
    </a>
    <a class="btn btn-hero btn-primary" href="#" onclick="confirmarApagar({{$venda->id}})" data-toggle="click-ripple">
      <i class="fa fa-trash"></i>
  </a>
    <a class="btn  btn-hero btn-primary my-2" href="/vendas">
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
            @if ($venda->logomarca)

            <img class="profile-user-img img-fluid img-circle"
                 src="{{ $venda->logomarca }}"
                 alt="User profile picture">
            @else
            <img class="profile-user-img img-fluid img-circle"
                 src="{{ asset('media/avatars/avatar0.jpg') }}"
                 alt="User profile picture">
            @endif
          </div>

          <h3 class="profile-username text-center">{{ $venda->lista_produtos }}</h3>


          <a href="/editar_item_venda/{{$venda->id}}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Mais informações da venda </h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong>Número P.I</strong>
            <p>{{ $venda->numero_pi }}</p>

          <hr>
          <strong>Quantidade de parcelas</strong>
            <p>{{ $venda->qtd_parcelas }}</p>

          <hr>
          <strong>Data de inicio de campanha</strong>
            <p>{{ $venda->inicio_campanha }}</p>

          <hr>
          <strong>Número NF</strong>
            <p>{{ $venda->numero_nf }}</p>

          <hr>
          <strong>Valor bruto</strong>
            <p>{{ $venda->valor_bruto }}</p>

          <hr>
          <strong>Valor do imposto</strong>
            <p>{{ $venda->valor_imposto }}</p>

          <hr>
          <strong>Valor depositado</strong>
            <p>{{ $venda->valor_depositado }}</p>

          <hr>
          <strong>Pagamento da colagem</strong>
            <p>{{ $venda->pagamento_colagem }}</p>

          <hr>
          <strong>Pagamento garagem</strong>
            <p>{{ $venda->pagamento_garagem }}</p>

          <hr>
          <strong>Fluxo</strong>
            <p>{{ $venda->fluxo }}</p>

          <hr>
          <strong>Anexo</strong>
            <p>
             <a href="{{ $venda->anexo_pdf }}">{{ $venda->anexo_pdf }}</a>
            </p>

          <hr>
          <strong>Imagem de comprovação</strong>

            <p>{{ $venda->fluxo }}
            <img src="{{ $venda->fluxo }}" alt="IMAGEM DE COMPROVAÇÃO">
            </p>

          <hr>
          <strong>Status</strong>
         <p>
         @if ($venda->status == 'orçamento')
            <span class="badge bg-success">Orçamento</span>
          @else
            <span class="badge bg-danger">Status não especificado correctamente</span>
          @endif
            </p>

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
                      <form action="/actualizar_venda/{{$venda->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-4 col-12 inline-block">
                          <label class="form-label" for="lista_produtos">Lista de produtos</label>
                          <select class="form-control" name="lista_produtos"  id="lista_produtos">
                            @if ($produtos->isNotEmpty())
                            @foreach ($produtos as $item)
                            <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                            @endforeach
                            @else
                            <option value="" disabled>Nenhum produto encontrado</option>
                            @endif
                        </select>
                        </div>
                        <div class="mb-4 col-12 inline-block">
                            <label class="form-label" for="cpf">Número de P.I</label>
                            <input type="number" class="form-control" id="numero_pi" required name="numero_pi" value="{{ $venda->numero_pi }}"  maxLength="14" onkeypress="formatarCPF(event)" autocomplete="off" maxlength="14 ">
                            </div>
                            <div class="mb-4 col-12 inline-block">
                              <label class="form-label" for="qtd_parcelas">Quantidade por parcelas</label>
                              <input type="number" class="form-control" id="dm-ecom-product-name" value="{{ $venda->qtd_parcelas }}" required name="qtd_parcelas" >
                            </div>
                            <div class="mb-4 col-12 inline-block">
                              <label class="form-label" for="dm-ecom-product-name">Data de inicio da campanha</label>
                              <input type="date" class="form-control" id="dm-ecom-product-name" required name="inicio_campanha" value="{{ $venda->inicio_campanha }}" >
                            </div>
                            <div class="mb-4 col-12 inline-block">
                              <label class="form-label" for="dm-ecom-product-name">Número <small>(NF)</small></label>
                              <input type="number" class="form-control" id="dm-ecom-product-name" value="{{ $venda->numero_nf }}" required name="numero_nf" >
                            </div>
                            <div class="mb-4 col-12 inline-block">
                              <label class="form-label" for="valor_bruto">Valor bruto</label>
                              <input type="number" class="form-control" id="valor_bruto" value="{{ $venda->valor_bruto }}" required name="valor_bruto" >
                            </div>
                            <div class="mb-4 col-12 inline-block">
                              <label class="form-label" for="valor_imposto">Valor imposto</label>
                              <input type="number" name="valor_imposto" id="valor_imposto" value="{{ $venda->valor_imposto }}" class="form-control">
                            </div>
                            <div class="mb-4 col-12 inline-block cep">
                            <label class="form-label" for="dm-ecom-product-name">Valor depositado</label>
                            <input type="number" class="form-control" id="cep" name="valor_depositado" value="{{ $venda->valor_depositado }}" size="10" maxlength="9" required>
                            </div>
                            <div class="mb-4 col-12 inline-block rua">
                                <label class="form-label" for="pagamento_colagem">Pagamento colagem</label>
                                <input type="number" class="form-control" id="pagamento_colagem" value="{{ $venda->pagamento_colagem }}" name="pagamento_colagem"  required>
                            </div>

                            <div class="mb-4 col-12 inline-block Bairro">
                                <label class="form-label" for="pagamento_garagem">Pagamento garagem</label>
                                <input type="text" class="form-control" id="pagamento_garagem" name="pagamento_garagem" value="{{ $venda->pagamento_garagem }}" required>
                            </div>

                            <div class="mb-4 col-12 inline-block Cidade">
                                <label class="form-label" for="fotos_comprovacao">Foto de comprovação</label>
                                <input type="file" class="form-control" id="fotos_comprovacao" value="{{ $venda->fotos_comprovacao }}" name="fotos_comprovacao" required>
                            </div>

                            <div class="mb-4 col-12 inline-block complemento">
                                <label class="form-label" for="anexo_pdf">Anexo <small>(PDF)</small></label>
                                <input type="file" class="form-control" id="anexo_pdf" value="{{ $venda->anexo_pdf }}" name="anexo_pdf">
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

function confirmarApagar(vendaId) {
        Swal.fire({
            title: 'Confirmar Ação',
            text: 'Tem certeza de que deseja apagar esta venda?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_venda/" + vendaId;
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
