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
      {{$responsavel->nome}}
    </h1>
  </div>
  <div style=" margin-left:73%; margin-top: -5%;">
    <a class="btn btn-hero btn-primary" href="/editar_responsavel/{{$responsavel->id}}" data-toggle="click-ripple">
      <i class="fa fa-pencil-alt"></i>
    </a>
    <a class="btn btn-hero btn-primary" href="#" onclick="confirmarEliminar({{$responsavel->id}})" data-toggle="click-ripple">
      <i class="fa fa-trash"></i>
  </a>
    <a class="btn  btn-hero btn-primary my-2" href="/responsaveis">
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
            <img class="profile-user-img img-fluid img-circle"
                 src="{{asset('media/avatars/avatar0.jpg')}}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{ $responsavel->nome }}</h3>

          <p class="text-muted text-center">{{ $responsavel->email }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>WhatsApp: </b> {{ $responsavel->whatsapp }}
            </li>
            <li class="list-group-item">
              <b>Celular: </b> {{ $responsavel->celular }}
            </li>
          </ul>

          <a href="/editar_responsavel/{{$responsavel->id}}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Mais informações do responsavel</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fab fa-active mr-1"></i> Setor</strong>

          <p class="text-muted">
            {{ $responsavel->setor }}
          </p>

          <hr>

          <strong>  Data de cadastro</strong>

          <p class="text-muted">{{ $responsavel->created_at }}</p>

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
                <!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <p>
                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                  <span class="float-right">
                    <a href="#" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Comments (5)
                    </a>
                  </span>
                </p>

                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
              </div>
              <!-- /.post -->

              <!-- Post -->
              <div class="post clearfix">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                  <span class="username">
                    <a href="#">Sarah Ross</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                  </span>
                  <span class="description">Sent you a message - 3 days ago</span>
                </div>
                <!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <form class="form-horizontal">
                  <div class="input-group input-group-sm mb-0">
                    <input class="form-control form-control-sm" placeholder="Response">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-danger">Send</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.post -->

              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                  <span class="username">
                    <a href="#">Adam Jones</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                  </span>
                  <span class="description">Posted 5 photos - 5 days ago</span>
                </div>
                <!-- /.user-block -->
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <p>
                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                  <span class="float-right">
                    <a href="#" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Comments (5)
                    </a>
                  </span>
                </p>

                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
              </div>
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
                      <form action="/actualizar_responsavel/{{$responsavel->id}}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="mb-4 col-9 inline-block">
                              <label class="form-label" for="nome">Nome do Responsavel</label>
                              <input type="text" class="form-control" id="nome" required name="nome" value="{{ $responsavel->nome }}">
                            </div>

                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$responsavel->email ?? ''}}">
                            </div>
                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="descricao">Whatsapp</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{$responsavel->whatsapp ?? ''}}">
                            </div>

                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="celular">Celular</label>
                                <input type="text" name="celular" id="celular" value="{{$responsavel->celular ?? ''}}" class="form-control">
                            </div>
                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="setor">Setor</label>
                                <input type="text" name="setor" id="setor" value="{{$responsavel->setor ?? ''}}" class="form-control">
                            </div>
                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="data_aniversario">Data de aniversário</label>
                                <input type="date" name="data_aniversario" id="data_aniversario" value="{{$responsavel->data_aniversario ?? ''}}" class="form-control">
                            </div>

                            <div class="mb-4 col-9 inline-block complemento">
                                <label class="form-label" for="empresa_id">Empresa</label>
                                <select name="empresa_id" id="empresa_id" class="form-control">
                                    @if ($empresa->isNotEmpty())
                                     @foreach ($empresa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                     @endforeach
                                    @else
                                    <option value="" disabled>Nenhuma empresa encontrada</option>
                                    @endif
                                </select>
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
