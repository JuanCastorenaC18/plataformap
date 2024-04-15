

@extends('adminlte::page')

@section('title', 'ESTATAL')

@section('content_header')
    <h1>ESTATAL</h1>
@stop

@section('content')
  <!-- Main content -->
  <section class="content">
    @include('components.boxmini')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header" style="background-color: #603;">
              <h3 class="card-title" style="color: #fff;">NIVEL ESTRUCTURA : <strong>SIMPATIZANTE</strong></h3>
              <form action="" method="GET" class="form-inline float-right">
                <div class="form-group mr-2">
                  <label for="role" class="mr-2">Filtrar por rol:</label>
                  <select name="role" id="role" class="form-control" onchange="this.form.submit()">
                    <option value="Todos">Todos</option> <!-- Opción para mostrar todos los usuarios -->
                  </select>
                </div>
              </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="usuarios" class="table table-bordered table-striped" data-toggle="table" data-target="#usuarios">
                <thead>
                  <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>Tel. Celular</th>
                    <th>Simpatizantes</th>
                    <th>Alt. Usuario</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  @foreach ($usersWithDetails as $userData)
                  <tr>
                    <td style="text-align: center;">{{ $user->id }}</td>
                    <td style="text-align: center;">{{ $user->name }}</td>
                    <td style="text-align: center;">{{ $userData['details']->municipio }}</td>
                    <td style="text-align: center;">{{ $userData['details']->tel_celular }}</td>
                    <td style="text-align: center;">(1)</td>
                    <td style="text-align: center;">
                      {{ isset($coordinadores[$userData['details']->coordinador_id]) ? $coordinadores[$userData['details']->coordinador_id] : '-' }}
                    </td>
                    <td class="project-state" style="text-align: center;">
                      @if($user->status == 1)
                        <span class="badge badge-success"><i class="fas fa-check"></i></span> <!-- Icono de palomita -->
                      @else
                        <span class="badge badge-danger"><i class="fas fa-times"></i></span> <!-- Icono de tachita -->
                      @endif
                    </td>
                    <td class="project-actions text-right">
                      <form action="{{ route('grupo.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-xl-{{ $user->id }}" title="Ver">
                          <i class="fas fa-folder">
                          </i>
                          Ver
                        </a>
                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-up-{{ $user->id }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Editar
                        </a>
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash">
                          </i>
                          Eliminar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>Tel. Celular</th>
                    <th>Simpatizantes</th>
                    <th>Alt. Usuario</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

   <!-- VER -->
@foreach ($users as $user)
      <div class="modal fade" id="modal-xl-{{ $user->id }}">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <img src="img/logoiesizformal.png" alt="User Image" class="img-fluid" style="max-width: 40px; max-height: 40px; margin-right: 10px;">
              <h4 class="modal-title">Datos Del Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group text-dark">
                        <strong class="text-dark">Nombre:</strong>
                        <input type="text" class="form-control form-control-border" value="{{ $user->name }}" readonly>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group text-dark">
                        <strong class="text-dark">Usuario:</strong>
                        <input type="text" class="form-control form-control-border" value="{{ $user->usuario }}" readonly>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group text-dark">
                        <strong class="text-dark">Correo:</strong>
                        <input type="text" class="form-control form-control-border" value="{{ $user->email }}" readonly>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group text-dark">
                        <strong class="text-dark">Contraseña:</strong>
                        <input type="text" class="form-control form-control-border" value="{{ $user->helperpass }}" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group text-dark">
                    <div id="conteiner1">
                      <table class="table table-striped table-bordered">
                        <thead class="table-info">
                          <tr>
                            <th>Fecha de Nacimiento</th>
                            <th>Sexo</th>
                            <th>Ocupacion</th>
                            <th>Estado</th>
                            <th>Tipo De Usuario</th>
                            <th>Fecha de Alta</th>
                            <th>Tel Celular</th>
                            <th>Tel Particular</th>
                            <th>Twitter</th>
                            <th>Facebook</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            {{ $userData['details']->fecha_nacimiento }}
                            </td>
                            <td>
                            {{ $userData['details']->sexo }}
                            </td>
                            <td>
                            {{ $userData['details']->ocupacion }}
                            </td>
                            <td>
                              @if($user->status == 1)
                                <span style="color: green;">Activo</span>
                              @else
                                <span style="color: red;">Inactivo</span>
                              @endif
                            </td>
                            <td>
                              @foreach ($user->roles as $role)
                                @if ($role->name === 'COOESTATAL')
                                  COORDINADOR ESTATAL
                                @elseif ($role->name === 'COOMUNICIPAL')
                                  COORDINADOR MUNICIPAL
                                @elseif ($role->name === 'COOGRUPO')
                                  COORDINADOR DE GRUPO
                                @elseif ($role->name === 'RESPONSABLERED')
                                  RESPONSABLE DE RED
                                @elseif ($role->name === 'SIMPATIZANTES')
                                  SIMPATIZANTE
                                @endif
                                
                              @endforeach
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                            {{ $userData['details']->tel_celular }}
                            </td>
                            <td>
                            {{ $userData['details']->tel_particular }}
                            </td>
                            <td>
                            {{ $userData['details']->twitter }}
                            </td>
                            <td>
                            {{ $userData['details']->facebook }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group text-dark">
                    <div id="conteiner1">
                      <table class="table table-striped table-bordered">
                        <thead class="table-info">
                          <tr>
                            <th>Informacion</th>
                            <th>Clave Electorial</th>
                            <th>Calle</th>
                            <th>Municipio</th>
                            <th>Seccion</th>
                            <th>Numero De Casa</th>
                            <th>Num. Interno</th>
                            <th>Codigo Postal</th>
                            <th>Colonia</th>
                            <th>Fecha y Hora De Alta</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            {{ $userData['details']->informacion }}
                            </td>
                            <td>{{ $userData['details']->clave }}</td>
                            <td>{{ $userData['details']->calle }}</td>
                            <td>{{ $userData['details']->municipio }}</td>
                            <td>{{ $userData['details']->seccion }}</td>
                            <td>{{ $userData['details']->num }}</td>
                            <td>{{ $userData['details']->int }}</td>
                            <td>{{ $userData['details']->codigo_postal }}</td>
                            <td>{{ $userData['details']->colonia }}</td>
                            <td>{{ $userData['details']->created_at }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endforeach
  <!--EDITAR-->
  @foreach ($users as $user)
    <div class="modal fade" id="modal-up-{{ $user->id }}">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <img src="img/logoiesizformal.png" alt="User Image" class="img-fluid" style="max-width: 40px; max-height: 40px; margin-right: 10px;">
            <h4 class="modal-title">Editar Datos Del Usuario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('simpatizante.update', $user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH') 

                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-warning">
                        <h5>Datos Personales</h5>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="apellido_paterno" class="form-control form-control-border" value="{{ $user->apellido_paterno }}" placeholder="Ap. Paterno" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="apellido_materno" class="form-control form-control-border" value="{{ $user->apellido_materno }}" placeholder="Ap. Materno" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="nombre" class="form-control form-control-border" value="{{ $user->nombre }}" placeholder="Nombre(s)" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-2 col-xl-2">
                      <p>Fecha Nacimiento:</p>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-2 col-xl-2">
                      <input type="date" name="fecha_nacimiento" value="{{ $userData['details']->fecha_nacimiento }}" class="form-control form-control-border" placeholder="Fecha Nacimiento" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <select name="sexo" value="{{ $userData['details']->sexo }}" id="Sexo" class="custom-select form-control-border" id="exampleSelectBorder">
                        <option value="">Indique El Sexo</option>
                        <option value="Hombre" @if($userData['details']->sexo == 'Hombre') selected @endif>Hombre</option>
                        <option value="Mujer" @if($userData['details']->sexo == 'Mujer') selected @endif>Mujer</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="fecha_alta" class="form-control form-control-border" value="{{ $userData['details']->fecha_alta }}"  placeholder="Fecha Actual" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-warning">
                      <h5>Datos Adicionales</h5>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="ocupacion" class="form-control form-control-border" value="{{ $userData['details']->ocupacion }}"  placeholder="Ocupacion" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="tel" name="tel_celular" class="form-control form-control-border" value="{{ $userData['details']->tel_celular }}" placeholder="Tel. Celular" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="tel" name="tel_particular" class="form-control form-control-border" value="{{ $userData['details']->tel_particular }}" placeholder="Tel. Particular" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="email" name="email" value="{{ $userData['details']->email }}" class="form-control form-control-border" placeholder="Correo" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="facebook" value="{{ $userData['details']->facebook }}" class="form-control form-control-border" placeholder="Facebook" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="twitter" value="{{ $userData['details']->twitter }}" class="form-control form-control-border" placeholder="Twitter" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <input type="text" name="informacion" value="{{ $userData['details']->informacion }}" class="form-control form-control-border" placeholder="Informacion Extra">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-warning">
                      <h5>Datos Domicilio</h5>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="calle" value="{{ $userData['details']->calle }}" class="form-control form-control-border" placeholder="Calle" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <select name="municipio" id="Municipio" value="{{ $userData['details']->municipio }}" class="custom-select form-control-border" id="exampleSelectBorder">
                        <!-- Opciones para municipios de Coahuila -->
                        <option value="Abasolo" @if($userData['details']->municipio == 'Abasolo') selected @endif>Abasolo</option>
                        <option value="Acuña" @if($userData['details']->municipio == 'Acuña') selected @endif>Acuña</option>
                        <option value="Allende" @if($userData['details']->municipio == 'Allende') selected @endif>Allende</option>
                        <option value="Arteaga" @if($userData['details']->municipio == 'Arteaga') selected @endif>Arteaga</option>
                        <option value="Candela" @if($userData['details']->municipio == 'Candela') selected @endif>Candela</option>
                        <option value="Castaños" @if($userData['details']->municipio == 'Castaños') selected @endif>Castaños</option>
                        <option value="Cuatro Ciénegas" @if($userData['details']->municipio == 'Cuatro Ciénegas') selected @endif>Cuatro Ciénegas</option>
                        <option value="Escobedo" @if($userData['details']->municipio == 'Escobedo') selected @endif>Escobedo</option>
                        <option value="Francisco I. Madero" @if($userData['details']->municipio == 'Francisco I. Madero') selected @endif>Francisco I. Madero</option>
                        <option value="Frontera" @if($userData['details']->municipio == 'Frontera') selected @endif>Frontera</option>
                        <option value="General Cepeda" @if($userData['details']->municipio == 'General Cepeda') selected @endif>General Cepeda</option>
                        <option value="Guerrero" @if($userData['details']->municipio == 'Guerrero') selected @endif>Guerrero</option>
                        <option value="Hidalgo" @if($userData['details']->municipio == 'Hidalgo') selected @endif>Hidalgo</option>
                        <option value="Jiménez" @if($userData['details']->municipio == 'Jiménez') selected @endif>Jiménez</option>
                        <option value="Juárez" @if($userData['details']->municipio == 'Juárez') selected @endif>Juárez</option>
                        <option value="Lamadrid" @if($userData['details']->municipio == 'Lamadrid') selected @endif>Lamadrid</option>
                        <option value="Matamoros" @if($userData['details']->municipio == 'Matamoros') selected @endif>Matamoros</option>
                        <option value="Monclova" @if($userData['details']->municipio == 'Monclova') selected @endif>Monclova</option>
                        <option value="Morelos" @if($userData['details']->municipio == 'Morelos') selected @endif>Morelos</option>
                        <option value="Múzquiz" @if($userData['details']->municipio == 'Múzquiz') selected @endif>Múzquiz</option>
                        <option value="Nadadores" @if($userData['details']->municipio == 'Nadadores') selected @endif>Nadadores</option>
                        <option value="Nava" @if($userData['details']->municipio == 'Nava') selected @endif>Nava</option>
                        <option value="Ocampo" @if($userData['details']->municipio == 'Ocampo') selected @endif>Ocampo</option>
                        <option value="Parras" @if($userData['details']->municipio == 'Parras') selected @endif>Parras</option>
                        <option value="Piedras Negras" @if($userData['details']->municipio == 'Piedras Negras') selected @endif>Piedras Negras</option>
                        <option value="Progreso" @if($userData['details']->municipio == 'Progreso') selected @endif>Progreso</option>
                        <option value="Ramos Arizpe" @if($userData['details']->municipio == 'Ramos Arizpe') selected @endif>Ramos Arizpe</option>
                        <option value="Sabinas" @if($userData['details']->municipio == 'Sabinas') selected @endif>Sabinas</option>
                        <option value="Sacramento" @if($userData['details']->municipio == 'Sacramento') selected @endif>Sacramento</option>
                        <option value="Saltillo" @if($userData['details']->municipio == 'Saltillo') selected @endif>Saltillo</option>
                        <option value="San Buenaventura" @if($userData['details']->municipio == 'San Buenaventura') selected @endif>San Buenaventura</option>
                        <option value="San Juan de Sabinas" @if($userData['details']->municipio == 'San Juan de Sabinas') selected @endif>San Juan de Sabinas</option>
                        <option value="San Pedro" @if($userData['details']->municipio == 'San Pedro') selected @endif>San Pedro</option>
                        <option value="Sierra Mojada" @if($userData['details']->municipio == 'Sierra Mojada') selected @endif>Sierra Mojada</option>
                        <option value="Torreón" @if($userData['details']->municipio == 'Torreón') selected @endif>Torreón</option>
                        <option value="Viesca" @if($userData['details']->municipio == 'Viesca') selected @endif>Viesca</option>
                        <option value="Villa Unión" @if($userData['details']->municipio == 'Villa Unión') selected @endif>Villa Unión</option>
                        <option value="Zaragoza" @if($userData['details']->municipio == 'Zaragoza') selected @endif>Zaragoza</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="seccion" value="{{ $userData['details']->seccion }}" class="form-control form-control-border" placeholder="Seccion" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="num" value="{{ $userData['details']->num }}" class="form-control form-control-border" placeholder="Num" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name=" int" value="{{ $userData['details']->int }}" class="form-control form-control-border" placeholder="int.">
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4">
                      <input type="text" name="codigo_postal" value="{{ $userData['details']->codigo_postal }}" class="form-control form-control-border" placeholder="Codigo Postal" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                      <input type="text" name="colonia" value="{{ $userData['details']->colonia }}" class="form-control form-control-border" placeholder="Colonia" required>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                      <input type="text" name="clave" value="{{ $userData['details']->clave }}" class="form-control form-control-border" placeholder="Clav E" required>
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 callout callout-warning">
                      <h5>Datos de Control</h5>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                    <input type="text" name="usuario"  value="{{ $user->usuario }}" class="form-control form-control-border" placeholder="Usuario" required>
                  </div>
                  <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                    <div class="input-group mb-3">
                      <input type="password" name="password" id="password" value="{{ $user->helperpass }}" class="form-control form-control-border" placeholder="Contraseña" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                          <span class="fas fa-eye" id="eyeIcon"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
                  <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                </div>
            </form>           
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  @endforeach

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    


  <!-- DataTables JS -->

  <!-- DataTables Buttons CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">

  <!-- DataTables Buttons JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>
  <!-- Bootstrap CSS (Agrega esto en tu vista Blade o en tu archivo de plantilla principal) -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome CSS (Para los iconos de los botones) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- jQuery (Debe estar incluido antes de DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons CSS -->
<link href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css" rel="stylesheet">

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#usuarios').DataTable({
          responsive: true,
          autoWidth: false,
          paging: true,
          lengthMenu: [ [10, 25, 50, 100, 150, 200, -1], [10, 25, 50, 100, 150, 200, "Todos"] ],
          language: {
              lengthMenu: 'Mostrar _MENU_ registros por página',
              zeroRecords: 'Nada encontrado - disculpa',
              info: 'Mostrando la página _PAGE_ de _PAGES_',
              infoEmpty: 'No hay registros disponibles',
              infoFiltered: '(filtrado de _MAX_ registros totales)',
              search: 'Buscar',
              paginate: {
                  next: 'Siguiente',
                  previous: 'Anterior'
              }
          },
          buttons: [
              {
                  extend: 'copy',
                  className: 'btn btn-primary',
                  text: '<i class="fas fa-copy"></i> Copiar',
                  titleAttr: 'Copiar'
              },
              {
                  extend: 'csv',
                  className: 'btn btn-info',
                  text: '<i class="fas fa-file-csv"></i> Exportar a CSV',
                  titleAttr: 'Exportar a CSV'
              },
              {
                  extend: 'excel',
                  className: 'btn btn-success',
                  text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                  titleAttr: 'Exportar a Excel'
              },
              {
                  extend: 'pdf',
                  className: 'btn btn-danger',
                  text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                  titleAttr: 'Exportar a PDF'
              },
              {
                  extend: 'print',
                  className: 'btn btn-secondary',
                  text: '<i class="fas fa-print"></i> Imprimir',
                  titleAttr: 'Imprimir'
              }
          ],
          dom: 
            "<'row'<'col-md-6'l><'col-md-6'f>>" + // Menú lengthMenu y campo de búsqueda
              "<'row'<'col-md-12'B>>" + // Botones
              "<'row'<'col-md-12't>>" + // Tabla
              "<'row'<'col-md-5'i><'col-md-7'p>>", // Info y paginación después de la tabla
          initComplete: function () {
              // Aplicar clases de Bootstrap a los botones y elementos de la tabla si es necesario
              $('#usuarios_wrapper .dt-buttons').addClass('btn-group');
              $('#usuarios_wrapper a.dt-button').addClass('btn btn-secondary').removeClass('dt-button');
              $('#usuarios_wrapper button').removeClass('dt-button');
          }
      });
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
