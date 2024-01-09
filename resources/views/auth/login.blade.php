@extends('layouts.sidebar')

@section('content')


    <div class="row g-0 justify-content-center bg-body-dark">
        <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
          <!-- Sign In Block -->
          <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('{{asset('media/photos/photo20@2x.jpg')}}');">
            <div class="row g-0">
              <div class="col-md-6 order-md-1 bg-body-extra-light">
                <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                  <!-- Header -->
                  <div class="text-center">
                    <a class="link-fx fw-bold fs-2 fs-md-3" href="/">
                        <span class="text-warning">TOTAL</span><span class="text-primary">MÍDIA</span><span class="text-warning">BUS</span>
                      </a>
                    <p class="text-uppercase fw-bold fs-6 fs-md-7 text-muted">Login</p>
                  </div>


                  <!-- END Header -->

                  <!-- Sign In Form -->
                  <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                  <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                  <form class="js-validation-signin" action="/route" method="POST">
                    @csrf
                    <div class="mb-4">
                      <input type="email" class="form-control @error('email') is-invalid @enderror form-control-alt" id="login-username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="position-relative mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror form-control-alt pr-5" id="login-password" name="password" required autocomplete="current-password" placeholder="Senha">
                        <span toggle="#login-password" class="fa fa-fw fa-eye field-icon toggle-password position-absolute top-50 translate-middle-y end-0 me-2"></span>

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn w-100 btn-hero btn-warning">
                        <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Entrar
                      </button>
                    </div>
                    <div class="mb-4" style="text-align: center;">
                        <a href="/register">
                           Não tenho conta
                        </a>
                      </div>
                  </form>
                  <!-- END Sign In Form -->
                </div>
              </div>
              <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                  <div class="d-flex">
                    <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                      <img class="img-avatar img-avatar-thumb" src="{{asset('media/avatars/avatar12.jpg')}}" alt="">
                    </a>
                    <div class="flex-grow-1">
                      <p class="text-white fw-semibold mb-1">
                        Bem-vindo ao sistema! Explore e aproveite todas as funcionalidades.
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END Sign In Block -->
        </div>
      </div>
</div>
<style>
    .position-relative {
        position: relative;
    }
    .position-absolute {
        position: absolute;
    }
    .top-50 {
        top: 50%;
    }
    .translate-middle-y {
        transform: translateY(-50%);
    }
</style>
<script>
    const passwordField = document.querySelector('#login-password');
    const togglePassword = document.querySelector('.toggle-password');

    togglePassword.addEventListener('click', function () {
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  </script>
@endsection
