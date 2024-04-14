@extends('serviciosocial.admin.users.layout')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-dark">Crear nuevo usuario</h1>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
            </div>
            <br>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">DATOS DEL ALUMNO</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del Alumno:</label>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control form-control-border" placeholder="Nombre del Alumno" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo:</label>
                                <div class="row">
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control form-control-border" placeholder="Correo">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" name="matricula" id="matricula" class="form-control form-control-border" placeholder="Matricula" required oninput="generatePassword()">
                                </div>
                                <div class="col-4">
                                    <select name="modalidad" id="modalidad" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="" disabled selected>Indique La Modalidad</option>
                                        <option value="Escolarizada">Escolarizada</option>
                                        <option value="Sabatina">Sabatina</option>
                                        <option value="Linea">En Linea</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="campus" id="campus" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option value="" disabled selected>Indique El Campus</option>
                                        @foreach($campus as $campusItem)
                                            <option value="{{ $campusItem->campus_id }}">{{ $campusItem->nombre_campus }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="password" class="form-control form-control-border" placeholder="Contraseña" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <span class="fas fa-eye" id="eyeIcon"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <input type="password" name="helperpass" id="helperpass" class="form-control form-control-border" placeholder="Contraseña Confirmar" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleHelperPass">
                                                <span class="fas fa-eye" id="helperEyeIcon"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                    <button type="submit" class="btn btn-outline-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
          <!-- /.row -->
    </div><!-- /.container-fluid -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var passwordInput = $('#password');
            var helperpassField = $('#helperpass');
            var togglePasswordBtn = $('#togglePassword');
            var eyeIcon = $('#eyeIcon');
            var toggleHelperPassBtn = $('#toggleHelperPass');
            var helperEyeIcon = $('#helperEyeIcon');

            togglePasswordBtn.on('click', function () {
                togglePasswordVisibility(passwordInput, eyeIcon);
            });

            toggleHelperPassBtn.on('click', function () {
                togglePasswordVisibility(helperpassField, helperEyeIcon);
            });

            passwordInput.on('input', function () {
                helperpassField.val($(this).val());
            });

            function togglePasswordVisibility(inputField, eyeIcon) {
                if (inputField.attr('type') === 'password') {
                    inputField.attr('type', 'text');
                    eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    inputField.attr('type', 'password');
                    eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            // Función para mostrar u ocultar campos según el rol seleccionado
            function toggleFieldsByRole() {
                var selectedRole = $('#rol').find(':selected').data('role');
    
                // Ocultar todos los campos adicionales
                $('[id$="Fields"]').hide();
    
                // Mostrar campos específicos según el rol seleccionado
                if (selectedRole === 'Student') {
                    $('#studentFields').show();
                } else if (selectedRole === 'Admin') {
                    $('#otherRoleFields').show();
                }
                // Agrega más condiciones según tus roles y campos adicionales
            }
    
            // Llama a la función al cargar la página y cada vez que cambie el valor del select
            toggleFieldsByRole();
            $('#rol').change(toggleFieldsByRole);
        });
    </script>

    <!-- script actualizado -->
    <script>
        $(document).ready(function () {
            var passwordInput = $('#password');
            var helperpassField = $('#helperpass');
            var matriculaInput = $('input[name="matricula"]');
            var nameInput = $('input[name="name"]');
            var togglePasswordBtn = $('#togglePassword');
            var eyeIcon = $('#eyeIcon');

            togglePasswordBtn.on('mousedown', function () {
                togglePasswordVisibility(passwordInput, eyeIcon);
            });

            matriculaInput.on('input', updatePassword);
            nameInput.on('input', updatePassword);

            function updatePassword() {
                // Obtener los últimos 5 caracteres de la matrícula
                var matriculaLastFive = matriculaInput.val().slice(-5);

                // Obtener las iniciales de los apellidos y la inicial del nombre
                var initials = nameInput.val().split(' ').map(function (word) {
                    return word.charAt(0);
                }).join('');

                // Construir la contraseña
                var newPassword = matriculaLastFive + initials;

                // Actualizar el valor del campo de contraseña
                passwordInput.val(newPassword);

                // Actualizar el valor del campo helperpass
                helperpassField.val(newPassword);
            }

            function togglePasswordVisibility(inputField, eyeIcon) {
                if (inputField.attr('type') === 'password') {
                    inputField.attr('type', 'text');
                    eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    inputField.attr('type', 'password');
                    eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            }
        });
    </script>

    @endsection