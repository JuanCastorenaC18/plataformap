<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.5/dist/css/adminlte.min.css">
    <title>PARTIDO</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container main">
        <div class="row">
          <div class="col-md-6 side-image">
            <!-------------      image     ------------->
            <!---<img src="img/PRI-logo-blanco.png" alt="">-->
            <div class="text">
              <a href="/">
                <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
              </a>
              <p>"TODOS UNIDOS POR UN MISMO PROYECTO"</p>
              <x-application-logo2 class="w-5 h-5 fill-current text-gray-300" />
            </div>
          </div>
          <div class="col-md-6 right">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="input-box">
              <header style="color: gray;">
                <img src="img/logo2.png" alt="">
                <h3 style="color: gray;">Redes de <strong>Sectores y Organizaciones</strong></h3>
                <p style="color: gray;">Partido Revolucionario Institucional <strong style="color: red;">COAHUILA</strong></p>
              </header>
              <form method="POST" id="login-form" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="input-field">
                  <input class="input" id="email" type="text" name="username" :value="old('username')" required autofocus autocomplete="off">
                  <label for="email">Usuario</label> 
                </div> 
                <div class="input-field">
                  <input type="password" class="input" id="pass" name="password" id="passwordInput" required autocomplete="current-password">
                  <label for="pass">Password</label>
                </div> 
                <div class="input-field">
                  <button type="submit" class="btn btn-outline-danger btn-block"><i class="fa-right-to-bracket"></i> ENTRAR</button>
                </div> 
                <div class="signin">
                  <span>Already have an account? <a href="#">Log in here</a></span>
                </div>
              </form>
            </div>  
          </div>
        </div>
      </div>
    </div>
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
                      title: "Bienvenido a ANTORCHA",
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
    </script>
  </body>
</html>