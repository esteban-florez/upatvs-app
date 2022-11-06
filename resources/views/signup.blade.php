<x-layout.app-alt title="Registrarse">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/fixOverlay.js') }}"></script>
    <script defer src="{{ asset('js/imgPreview.js') }}"></script>
  @endpush
  <body class="hold-transition register-page">
    <div class="overlay"></div>
    <div class="register-box">
      <x-circle-logo />
      <div class="register-logo">
        <a class="text-white" href="#">
          <h1 class="font-weight-normal">Registro de usuario</h1>
        </a>
      </div>
      <div class="card mb-3">
        <div class="card-body register-card-body">
          <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center">
              <h2>Datos de usuario</h2>
              <a class="pb-3" href="{{ route('login') }}">¿Ya posees una cuenta? Inicia sesión</a>
            </div>
            <p class="text-muted">
              Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
            </p>
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 col-md-6 mb-3">
                  <div class="image-input-container d-flex justify-content-center align-items-center" id="previewWrapper">
                    <span class="badge badge-3 badge-dark position-absolute user-select-none">Click para añadir imagen</span>
                    <img class="img-cover" src="{{ asset('img/placeholder.jpg') }}" alt="Imagen de perfil" id="previewImg"> 
                    <input type="file" name="image" id="imgInput">
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <x-field type="password" name="password" id="password" required>
                    Contraseña:
                  </x-field>  
                  <x-field type="password" name="password_confirmation" id="passwordConfirmation" required>
                    Confirmar contraseña:
                  </x-field>
                </div>
              </div>
              <hr>
              <h2>Datos personales</h2>
              <div class="row">
                <div class="col-md-6">
                  <x-field type="text" name="first_name" id="firstName" required>
                    Primer nombre: 
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-field type="text" name="second_name" id="secondName">
                    Segundo nombre: 
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-field type="text" name="first_lastname" id="firstLastname" required>
                    Primer apellido: 
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-field type="text" name="second_lastname" id="secondLastname">
                    Segundo apellido: 
                  </x-field>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="ci"><i class="fas fa-asterisk text-danger mr-1"></i>Cédula: </label>
                  <div class="d-flex ci-wrapper">
                    <select class="form-control w-25" name="ci_type" required>
                      <option value="V">V-</option>
                      <option value="E">E-</option>
                    </select>
                    <input class="form-control" type="number" name="ci" placeholder="Cédula de Identidad" id="ci" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <x-field type="email" name="email" id="email" required>
                    Correo Electrónico: 
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-field type="date" name="birth" id="birth" required>
                    Fecha de nacimiento:
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-select default name="gender" id="gender" required :options="['female'=>'Femenino', 'male'=>'Masculino']">
                    Género:
                  </x-select>
                </div>
                <div class="col-md-6">
                  <x-field type="number" name="phone" id="phone" required>
                    Número de Teléfono: 
                  </x-field>
                </div>
                <div class="col-md-6">
                  <x-select default name="grade" id="grade" required :options="['school'=>'Primaria', 'high'=>'Bachillerato', 'tsu'=>'TSU', 'college'=>'Pregrado']">
                    Grado de Instrucción:
                  </x-select>
                </div>
                <div class="mb-3 col-12">
                  <x-textarea name="address" id="address" placeholder="Cagua, Los cocos calle 3 casa #24" required>
                    Dirección:
                  </x-textarea>
                </div>
              </div>
              <x-button type="submit" class="btn-lg btn-block">Registrarse</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- {{-- <script>
      const overlay = document.querySelector('.overlay');
      const height = document.computedStyle;
      overlay.style.height = `${height}px`;
    </script> --}} -->
  </body>
</x-layout.app-alt>