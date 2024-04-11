@extends('controlescolar.users.layout')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- DataTables -->
  <link rel="icon" href="images/IESIZIcon.ico" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('resources/css/styleuser.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
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
  @if(session('Exito'))
    <div class="alert alert-success">
      {{ session('Exito') }}
    </div>
  @endif
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <br>
      <div class="pull-right">
        <a class="btn bg-gradient-success" href="{{ route('usersA.create') }}">
          <i class="fas fa-user-plus"></i> Crear Usuario
        </a>
      </div>
      <br>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">USUARIOS</h3>
              <form action="{{ route('usersA.index') }}" method="GET" class="form-inline float-right">
                  <div class="form-group mr-2">
                      <label for="role" class="mr-2">Filtrar por rol:</label>
                      <select name="role" id="role" class="form-control" onchange="this.form.submit()">
                          <option value="Todos">Todos</option> <!-- Opción para mostrar todos los usuarios -->
                          @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                          @endforeach
                      </select>
                  </div>
              </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="usuarios" class="table table-bordered table-striped" data-toggle="table" data-target="#usuarios">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th width="340px">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td style="text-align: center;">{{ $user->id }}</td>
                    <td style="text-align: center;">{{ $user->name }}</td>
                    <td style="text-align: center;">{{ $user->email }}</td>
                    <td class="project-state" style="text-align: center;">
                      @if($user->status == 1)
                        <span class="badge badge-success"><i class="fas fa-check"></i></span> <!-- Icono de palomita -->
                      @else
                        <span class="badge badge-danger"><i class="fas fa-times"></i></span> <!-- Icono de tachita -->
                      @endif
                    </td>
                    <td>
                      <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-{{ $user->id }}" title="Ver"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#modal-up-{{ $user->id }}" title="Editar"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th width="340px">Accion</th>
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

  <hr style="border-color: #000000; border-width: 2px;">
  <br>

  <!-- Modal outside the table 
  @foreach ($users as $user)
  <div class="modal fade" id="modal-lg-{{ $user->id }}">
      <div class="modal-dialog modal-lg">
           ... modal content ... 
          <div class="modal-body">
              <div class="row">
                   ... modal body content ... 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group text-dark">
                          <strong class="text-dark">Nombre:</strong>
                          {{ $user->name }}
                      </div>
                  </div>
                   ... other fields ... 
              </div>
          </div>
           ... modal footer ... 
      </div>
  </div>
  @endforeach-->

  @foreach ($users as $user)
      <div class="modal fade" id="modal-lg-{{ $user->id }}">
        <div class="modal-dialog modal-lg">
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
                        <strong class="text-dark">Matricula:</strong>
                        <input type="text" class="form-control form-control-border" value="{{ $user->matricula }}" readonly>
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
                            <th>Carta Aceptacion</th>
                            <th>Carta Asignacion</th>
                            <th>Carta Finalizacion</th>
                            <th>Estado</th>
                            <th>Tipo De Usuario</th>
                            <th>Fecha de Alta</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              @if($user->userDoc)
                                @if($user->userDoc->doc1 == 1)
                                  <span style="color: green;">Tramitada</span>
                                @else
                                  <span style="color: red;">No tramitada</span>
                                @endif
                              @else
                                No disponible
                              @endif
                            </td>
                            <td>
                              @if($user->userDoc)
                                @if($user->userDoc->doc2 == 1)
                                  <span style="color: green;">Tramitada</span>
                                @else
                                  <span style="color: red;">No tramitada</span>
                                @endif
                              @else
                                No disponible
                              @endif
                            </td>
                            <td>
                              @if($user->userDoc)
                                @if($user->userDoc->doc3 == 1)
                                  <span style="color: green;">Tramitada</span>
                                @else
                                  <span style="color: red;">No tramitada</span>
                                @endif
                              @else
                                No disponible
                              @endif
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
                                @if ($role->name === 'Admin')
                                  Administrador
                                @elseif ($role->name === 'Socialservice')
                                  Servicio Social
                                @elseif ($role->name === 'Student')
                                  Estudiante
                                @endif
                              @endforeach
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/logoiesizformal.png" alt="User Image" class="img-fluid" style="max-width: 40px; max-height: 40px; margin-right: 10px;">
                    <h4 class="modal-title">EDITAR Datos Del Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Agrega esta línea para indicar que es una actualización -->

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group text-dark">
                                    <strong class="text-dark">Nombre:</strong>
                                    <input type="text" class="form-control form-control-border" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group text-dark">
                                    <strong class="text-dark">Correo:</strong>
                                    <input type="text" class="form-control form-control-border" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group text-dark">
                                    <strong class="text-dark">Contraseña:</strong>
                                    <input type="text" class="form-control form-control-border" name="helperpass" value="{{ $user->helperpass }}">
                                </div>
                            </div>
                            <!-- Agrega otros campos similares para 'matricula', 'email', 'helperpass', etc. -->
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
  @endforeach


<script src="../../dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>


  <script>
    $(document).ready(function () {
      console.log("¡Documento listo!");
      $("#usuarios").DataTable({
        responsive: true,
        autoWidth: false,
        paging: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": 'Buscar',
            'paginate':{
              'next': 'Siguiente',
              'previous': 'Anterior',
            }
        }
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
@endsection

@if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
