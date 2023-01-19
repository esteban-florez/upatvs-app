<x-layout.app-alt title="Iniciar Sesión">
  <body class="hold-transition login-page">
    <div class="overlay"></div>
    <div class="login-box my-3">
      <x-circle-logo />
      <div class="login-logo">
        <h1 class="font-weight-normal text-white">Iniciar Sesión</h1>
      </div>
      <div class="card">
        @if(session('status'))
          <div class="alert alert-primary mb-0" role="alert">
            {{ __(session('status')) }}
          </div>
        @endif
        @if(session('registered'))
          <div class="alert alert-success m-0" role="alert">
            {{ session('registered') }}
          </div>
        @endif
        <div class="card-body login-card-body">
          <form action="{{ route('auth') }}" method="POST">
            @csrf
            @error('email')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
            @enderror
            <div class="input-group mb-3">
              <input type="email" autocomplete="off" class="form-control" placeholder="Correo Electrónico" name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" autocomplete="off" class="form-control" placeholder="Contraseña" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-key"></i>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </form>
          <hr>
          <div class="social-auth-links text-center mb-3">
            <x-button url="{{ route('register.create') }}" color="success" class="btn-block">
              ¿No tienes una cuenta? Regístrate.
            </x-button>
          </div>
          <div class="d-flex justify-content-center">
            <a class="text-center" href="{{ route('password.forgot') }}">
              Olvidé mi contraseña.
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>