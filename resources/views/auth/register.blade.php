@extends('layouts.sidebar')

@section('content')
<div class="row g-0 justify-content-center bg-body-dark">
    <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
      <!-- Sign Up Block -->
      <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('{{asset('media/photos/photo12@2x.jpg')}}');">
        <div class="row g-0">
          <div class="col-md-6 order-md-1 bg-body-extra-light">
            <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
              <!-- Header -->
              <div class="mb-4 text-center">
                <a class="link-fx fw-bold fs-2 fs-md-3" href="/">
                  <span class="text-warning">TOTAL</span><span class="text-primary">MÍDIA</span><span class="text-warning">BUS</span>
                </a>


                <p class="text-uppercase fw-bold fs-6 text-muted">Crie uma conta</p>
              </div>

              <!-- END Header -->

              <!-- Sign Up Form -->
              <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
              <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
              <form class="js-validation-signup" method="POST" action="{{ route('register') }}">
                @csrf
                 <div class="mb-4">
                  <input type="text" class="form-control @error('name') is-invalid @enderror form-control-alt" id="signup-username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome completo">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mb-4">
                  <input type="email" class="form-control @error('email') is-invalid @enderror form-control-alt" id="signup-email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
                <div class="mb-4 position-relative">
                    <input type="password" class="form-control @error('password') is-invalid @enderror form-control-alt pr-5" id="signup-password" name="password" required autocomplete="new-password" placeholder="Senha">
                    <span class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePasswordVisibility('signup-password')"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4 position-relative">
                    <input type="password" class="form-control form-control-alt pr-5" id="signup-password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar senha">
                    <span class="fa fa-fw fa-eye field-icon toggle-password-confirm" onclick="togglePasswordConfirmVisibility('signup-password-confirm')"></span>
                </div>

                <div class="mb-4" style="text-align: left;">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Termos &amp; Condições</a>
                  <div class="form-check" style="text-align: left;">
                    <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                    <label class="form-check-label" for="signup-terms">Eu aceito</label>
                  </div>
                </div>
                <div class="mb-4">
                  <button type="submit" class="btn w-100 btn-hero btn-warning">
                    <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Criar conta
                  </button>
                </div>
                <div class="mb-4" style="text-align: center;">
                    <a href="/login">
                       Já tenho conta
                    </a>
                  </div>
              </form>
              <!-- END Sign Up Form -->
            </div>
          </div>
          <div class="col-md-6 order-md-0 bg-xwork-op d-flex align-items-center">
            <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
              <div class="d-flex">
                <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                  <img class="img-avatar img-avatar-thumb" src="{{asset('media/avatars/avatar3.jpg')}}" alt="">
                </a>
                <div class="flex-grow-1">
                  <p class="text-white fw-semibold mb-1">
                    Descubra empresas locais! Cadastre-se agora para explorar uma ampla gama de negócios em sua região. Encontre oportunidades próximas e impulsione suas conexões comerciais!
                </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Sign Up Block -->
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">Termos &amp; Condições</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
              <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
            </div>
            <div class="block-content block-content-full text-end bg-body">
              <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Feito</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Terms Modal -->
  </div>

 <style>
        .position-relative {
            position: relative;
        }
        .field-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
            cursor: pointer;
        }
    </style>

    <script>
        // Funções de alternância de visibilidade das senhas
        function togglePasswordVisibility(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            const fieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', fieldType);

            const eyeIcon = document.querySelector('.toggle-password');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        }

        function togglePasswordConfirmVisibility(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            const fieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', fieldType);

            const eyeIcon = document.querySelector('.toggle-password-confirm');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        }
    </script>
@endsection
