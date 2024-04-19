

@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'REGISTRO')

@section('content_header')
    <h1>REGISTRO MUNICIPAL</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            
            @include('components.boxmini')
            @include('components.boxminiReg')
            <br>
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
            @if(session('exito'))
                <div class="alert alert-success">
                {{ session('exito') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-info">
                    <div class="card-header" style="background-color: #603;">
                        <div class="d-flex align-items-center ">
                            <img src="{{ asset('img/gitpri1.gif')}}" alt="User Image" class="img-fluid" style="max-width: 300px; max-height: 70px; ">
                            <p>ALTA DE SIMPATIZANTE</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('simpatizante.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-info">
                                        <h5>Datos Personales</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="apellido_paterno" class="form-control form-control-border" placeholder="Ap. Paterno" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="apellido_materno" class="form-control form-control-border" placeholder="Ap. Materno" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="nombre" class="form-control form-control-border" placeholder="Nombre(s)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-2 col-xl-2">
                                        <p>Fecha Nacimiento:</p>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-2 col-xl-2">
                                        <input type="date" name="fecha_nacimiento" class="form-control form-control-border" placeholder="Fecha Nacimiento" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <select name="sexo" id="Sexo" class="custom-select form-control-border" id="exampleSelectBorder">
                                            <option value="" disabled selected>Indique El Sexo</option>
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="fecha_alta" class="form-control form-control-border" placeholder="dd/mm/yyyy" id="fecha" placeholder="Fecha Actual" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-info">
                                        <h5>Datos Adicionales</h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="ocupacion" class="form-control form-control-border" placeholder="Ocupacion" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="tel" name="tel_celular" class="form-control form-control-border" maxlength="10" minlength="10" placeholder="Tel. Celular" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="tel" name="tel_particular" class="form-control form-control-border" maxlength="10" minlength="10" placeholder="Tel. Particular" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="email" name="email" class="form-control form-control-border" placeholder="Correo" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="facebook" class="form-control form-control-border" placeholder="Facebook" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="twitter" class="form-control form-control-border" placeholder="Twitter" required>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input type="text" name="informacion" class="form-control form-control-border" placeholder="Informacion Extra">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-info">
                                        <h5>Datos Domicilio</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="calle" class="form-control form-control-border" placeholder="Calle" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <select name="municipio" id="Municipio" class="custom-select form-control-border" id="exampleSelectBorder">
                                            <option value="" disabled selected>Indique El Municipio</option>
                                            <!-- Opciones para municipios de Coahuila -->
                                            <option value="Abasolo">Abasolo</option>
                                            <option value="Acuña">Acuña</option>
                                            <option value="Allende">Allende</option>
                                            <option value="Arteaga">Arteaga</option>
                                            <option value="Candela">Candela</option>
                                            <option value="Castaños">Castaños</option>
                                            <option value="Cuatro Ciénegas">Cuatro Ciénegas</option>
                                            <option value="Escobedo">Escobedo</option>
                                            <option value="Francisco I. Madero">Francisco I. Madero</option>
                                            <option value="Frontera">Frontera</option>
                                            <option value="General Cepeda">General Cepeda</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jiménez">Jiménez</option>
                                            <option value="Juárez">Juárez</option>
                                            <option value="Lamadrid">Lamadrid</option>
                                            <option value="Matamoros">Matamoros</option>
                                            <option value="Monclova">Monclova</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Múzquiz">Múzquiz</option>
                                            <option value="Nadadores">Nadadores</option>
                                            <option value="Nava">Nava</option>
                                            <option value="Ocampo">Ocampo</option>
                                            <option value="Parras">Parras</option>
                                            <option value="Piedras Negras">Piedras Negras</option>
                                            <option value="Progreso">Progreso</option>
                                            <option value="Ramos Arizpe">Ramos Arizpe</option>
                                            <option value="Sabinas">Sabinas</option>
                                            <option value="Sacramento">Sacramento</option>
                                            <option value="Saltillo">Saltillo</option>
                                            <option value="San Buenaventura">San Buenaventura</option>
                                            <option value="San Juan de Sabinas">San Juan de Sabinas</option>
                                            <option value="San Pedro">San Pedro</option>
                                            <option value="Sierra Mojada">Sierra Mojada</option>
                                            <option value="Torreón">Torreón</option>
                                            <option value="Viesca">Viesca</option>
                                            <option value="Villa Unión">Villa Unión</option>
                                            <option value="Zaragoza">Zaragoza</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="seccion" class="form-control form-control-border" placeholder="Seccion" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="num" class="form-control form-control-border" placeholder="Num" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name=" int" class="form-control form-control-border" placeholder="int.">
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                                        <input type="text" name="codigo_postal" class="form-control form-control-border" placeholder="Codigo Postal" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                                        <input type="text" name="colonia" class="form-control form-control-border" placeholder="Colonia" required>
                                    </div>
                                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                                        <input type="text" name="clave" class="form-control form-control-border" maxlength="18" minlength="18" placeholder="Clav E" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-info">
                                        <h5>Datos de Control</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                                    <input type="text" name="usuario" id="usuario" class="form-control form-control-border" placeholder="Usuario" required>

                                    
                                </div>
                                <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="password" class="form-control form-control-border" placeholder="Contraseña" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <span class="fas fa-eye" id="eyeIcon"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                    <button type="submit" class="btn btn-info btn-block btn-flat">Guardar</button>
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
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        
    </style>
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Función para generar un número aleatorio de 6 dígitos
            function generarNumeroAleatorio() {
                return Math.floor(100000 + Math.random() * 900000);
            }

            // Generar el nombre de usuario automáticamente al cargar la vista
            var usuarioInput = document.getElementById("usuario");
            usuarioInput.value = "usuario" + generarNumeroAleatorio();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Función para generar un número aleatorio de 6 dígitos
            function generarNumeroAleatorio() {
                return Math.floor(100000 + Math.random() * 900000);
            }

            // Función para generar una letra aleatoria en minúscula
            function generarLetraAleatoria() {
                var letras = 'abcdefghijklmnopqrstuvwxyz';
                return letras.charAt(Math.floor(Math.random() * letras.length));
            }

            // Generar la contraseña automáticamente al cargar la vista
            var passwordInput = document.getElementById("password");
            var letraInicial = generarLetraAleatoria();
            var letraFinal = generarLetraAleatoria();
            var numeroAleatorio = generarNumeroAleatorio();
            passwordInput.value = letraInicial + numeroAleatorio + letraFinal;
        });
    </script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
      // Obtener la fecha actual
      var fechaActual = new Date();
  
      // Obtener día, mes y año
      var dia = fechaActual.getDate();
      var mes = fechaActual.getMonth() + 1; // ¡Recuerda que los meses en JavaScript van de 0 a 11!
      var ano = fechaActual.getFullYear();
  
      // Formatear la fecha como "DD/MM/YYYY"
      var fechaFormateada = (dia < 10 ? '0' : '') + dia + '/' + (mes < 10 ? '0' : '') + mes + '/' + ano;
  
      // Establecer el valor predeterminado en el campo de texto
      document.getElementById("fecha").value = fechaFormateada;
    </script>
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
@stop
