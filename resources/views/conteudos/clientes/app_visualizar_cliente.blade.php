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
      {{$cliente->nome}}
    </h1>
  </div>
  <div style=" margin-left:73%; margin-top: -5%;">
    <a class="btn btn-hero btn-primary" href="/editar_cliente/{{$cliente->id}}" data-toggle="click-ripple">
      <i class="fa fa-pencil-alt"></i>
    </a>
    <a class="btn btn-hero btn-primary" href="#" onclick="confirmarEliminar({{$cliente->id}})" data-toggle="click-ripple">
      <i class="fa fa-trash"></i>
  </a>
    <a class="btn  btn-hero btn-primary my-2" href="/clientes">
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

          <h3 class="profile-username text-center">{{ $cliente->nome }}</h3>

          <p class="text-muted text-center">{{ $cliente->complemento }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>CPF: </b> {{ $cliente->cpf }}
            </li>
            <li class="list-group-item">
              <b>CEP: </b> {{ $cliente->cep }}
            </li>
            <li class="list-group-item">
              <b>E-mail: </b> <a class="float-right">{{ $cliente->email }}</a>
            </li>
          </ul>

          <a href="/editar_cliente/{{$cliente->id}}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Mais informações do cliente</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fab fa-whatsapp mr-1"></i> WhatsApp</strong>

          <p class="text-muted">
            {{ $cliente->whatsapp }}
          </p>

          <hr>

          <strong><i class="fas fa-address-card mr-1"></i> RG</strong>

          <p class="text-muted">{{ $cliente->rg }}</p>

          <hr>

          <strong><i class="fa fa-user-times mr-1"></i> Género</strong>

          <p class="text-muted">{{ $cliente->genero }}
          </p>

          <hr>

          <strong><i class="fa fa-city mr-1"></i> Cidade</strong>

          <p class="text-muted">{{ $cliente->cidade }}</p>
          <hr>

          <strong><i class="fa fa-street-view mr-1"></i> Bairro</strong>

          <p class="text-muted">{{ $cliente->bairro }}</p>
          <hr>

          <strong><i class="fa fa-map-marker-alt mr-1"></i> Rua</strong>

          <p class="text-muted">{{ $cliente->rua }}</p>
          <strong><i class="fa fa-calendar-alt mr-1"></i> Data de nascimento</strong>

          <p class="text-muted">{{ $cliente->data_nascimento }}</p>
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
                      <form class="row" action="actualizar_cliente/{{ $cliente->id }}" method="POST" enctype="multipart/form-data">
                          @csrf <!-- CSRF token -->

                          <!-- Primeira Coluna -->
                          <div class="col-md-6">

                              <!-- Nome input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-email2">Nome</label>
                                  <input type="text" value="{{ $cliente->nome }}" class="form-control form-control-lg" id="example-if-email2" name="nome" placeholder="Nome">
                              </div>

                              <!-- Email input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-email2">Email</label>
                                  <input type="email" value="{{ $cliente->email }}" class="form-control form-control-lg" id="example-if-email2" name="email" placeholder="Email">
                              </div>

                              <!-- Data de nascimento input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Data de nascimento</label>
                                  <input type="date" value="{{ $cliente->data_nascimento }}" class="form-control form-control-lg" id="example-if-password2" name="data_nascimento" placeholder="Data de nascimento">
                              </div>

                              <!-- CPF input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">CPF</label>
                                  <input type="text" value="{{ $cliente->cpf }}" class="form-control form-control-lg" id="example-if-password2" name="cpf" placeholder="CPF">
                              </div>

                              <!-- RG input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">RG</label>
                                  <input type="text" value="{{ $cliente->rg }}" class="form-control form-control-lg" id="example-if-password2" name="rg" placeholder="RG">
                              </div>

                              <!-- WhatsApp input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">WhatsApp</label>
                                  <input type="text" value="{{ $cliente->whatsapp }}" class="form-control form-control-lg" id="example-if-password2" name="whatsapp" placeholder="WhatsApp">
                              </div>

                          </div>

                          <!-- Segunda Coluna -->
                          <div class="col-md-6">

                              <!-- Género input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Género</label>
                                  <input type="text" value="{{ $cliente->genero }}" class="form-control form-control-lg" id="example-if-password2" name="genero" placeholder="Género">
                              </div>

                              <!-- CEP input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">CEP</label>
                                  <input type="text" value="{{ $cliente->cep }}" class="form-control form-control-lg" id="example-if-password2" name="cep" placeholder="CEP">
                              </div>

                              <!-- RUA input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Rua</label>
                                  <input type="text" value="{{ $cliente->rua }}" class="form-control form-control-lg" id="example-if-password2" name="rua" placeholder="Rua">
                              </div>

                              <!-- BAIRRO input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Bairro</label>
                                  <input type="text" value="{{ $cliente->bairro }}" class="form-control form-control-lg" id="example-if-password2" name="bairro" placeholder="Bairro">
                              </div>

                              <!-- CIDADE input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Cidade</label>
                                  <input type="text" value="{{ $cliente->cidade }}" class="form-control form-control-lg" id="example-if-password2" name="cidade" placeholder="Cidade">
                              </div>

                              <!-- UF input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">UF</label>
                                  <input type="text" value="{{ $cliente->uf }}" class="form-control form-control-lg" id="example-if-password2" name="uf" placeholder="UF">
                              </div>

                              <!-- NÚMERO input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Número</label>
                                  <input type="text" value="{{ $cliente->numero }}" class="form-control form-control-lg" id="example-if-password2" name="numero" placeholder="Número">
                              </div>

                              <!-- COMPLEMENTO input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Complemento</label>
                                  <input type="text" value="{{ $cliente->complemento }}" class="form-control form-control-lg" id="example-if-password2" name="complemento" placeholder="Complemento">
                              </div>

                              <!-- Password input -->
                              <div class="form-group mb-2">
                                  <label for="example-if-password2">Password</label>
                                  <input type="password" value="{{ $cliente->email }}" class="form-control form-control-lg" id="example-if-password2" name="example-if-password2" placeholder="Password">
                              </div>

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
   function confirmarEliminar(clienteId) {
        Swal.fire({
            title: 'Confirmar Eliminar',
            text: 'Tem certeza de que deseja eliminar este cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/eliminar_cliente/" + clienteId;
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
