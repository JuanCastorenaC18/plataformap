<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAA</title>
  <link rel="icon" href="images/IESIZIcon.ico" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.5/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>IESIZ</b>SIAA</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif
      <x-auth-session-status class="mb-4" :status="session('status')" />
      <div class="card-body login-card-body">
        <a href="/">
          <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
        </a>
        <form method="POST" id="login-form" action="{{ route('login') }}" novalidate>
          @csrf
          <div class="input-group mb-3">
              <input class="form-control" placeholder="Email o Matricula" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="passwordInput" required autocomplete="current-password">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <span class="fas fa-eye" id="eyeIcon"></span>
              </button>
            </div>
          </div>
          <div class="row">
              <div class="col-7">
                  <div class="icheck-primary">
                      <input type="checkbox" id="remember" name="remember">
                      <label for="remember">{{ __('Remember me') }}</label>
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-5">
                  <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
              </div>
              <!-- /.col -->
          </div>
        </form>
      
      

        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
          <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
      </div>-->
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.5/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        // Obtén los valores del formulario
        var formData = new FormData(this);

        // Realiza una solicitud de inicio de sesión usando AJAX
        $.ajax({
            url: "{{ route('login') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Si las credenciales son correctas, muestra un mensaje de éxito
                Swal.fire({
                    icon: "success",
                    title: "Bienvenido a SIAA",
                    showConfirmButton: true,
                }).then((result) => {
                    // Redirecciona al usuario al dashboard si hace clic en el botón de confirmación
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('dashboard') }}";
                    }
                });
            },
            error: function(xhr, status, error) {
                // Si las credenciales son incorrectas, muestra un mensaje de error
                Swal.fire({
                  icon: "error",
                    title: "Usuario Inválido",
                    text: "¡Credenciales incorrectas!",
                });
            }
        });
    });

    document.getElementById("togglePassword").addEventListener("click", function () {
        var passwordInput = document.getElementById("passwordInput");
        var eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    });
  </script>  
</body>
</html>
