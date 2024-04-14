// Archivo login.js


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
