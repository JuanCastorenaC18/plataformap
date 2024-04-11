@extends('serviciosocial.admin.users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-dark">Editar Usuario</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
            </div>
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

    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-dark">
                    <strong class="text-dark">Nombre:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nombre Del Alumno">
                </div>
            </div>
            <br>
            <div class="input-group mb-3 col-xs-12 col-sm-12 col-md-12">
            <br>
                <strong class="text-dark">Matricula:</strong>
                <input type="text" name="matricula" value="{{  $user->matricula }}" class="form-control" placeholder="Matricula">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-dark">
                    <strong class="text-dark">Correo:</strong>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Correo">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-dark">
                    <strong class="text-dark">Vista Contraseña:</strong>
                    <input type="password" id="password" name="helperpass" value="{{ Crypt::decryptString($user->helperpass) }}" class="form-control" placeholder="Modificar Contraseña">
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-dark">
                    <strong class="text-dark">Contraseña:</strong>
                    <input type="password" id="helperpass" name="password" value="" class="form-control" placeholder="Contraseña">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br>
              <button type="submit" class="btn btn-outline-success">Enviar</button>
            </div>
        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(e){
            $('#imagen').change(function(){
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagenSelecionada').attr('src', e.target.result);
                    $('#imagenSelecionada').show();
                }
                reader.readAsDataURL(this.files[0]);
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            // Obtener referencias a los campos de contraseña
            var passwordField = $('#password');
            var helperpassField = $('#helperpass');
    
            // Agregar un evento de entrada al campo de contraseña
            passwordField.on('input', function () {
                // Actualizar el valor del campo "Contraseña Confirmar"
                helperpassField.val($(this).val());
            });
        });
    </script>
@endsection