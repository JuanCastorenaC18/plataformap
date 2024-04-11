

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
            <div class="card-header" style="background-color: #f00;">
              <h3 class="card-title" style="color: #fff;">NIVEL ESTRUCTURA : <strong>COORDINADOR DE GRUPO</strong></h3>
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
                    <th>Correo</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td style="text-align: center;">{{ $user->id }}</td>
                    <td style="text-align: center;">{{ $user->name }}</td>
                    <td style="text-align: center;">Torreon</td>
                    <td style="text-align: center;">8711131415</td>
                    <td style="text-align: center;">(1)</td>
                    <td style="text-align: center;">{{ $user->email }}</td>
                    <td class="project-state" style="text-align: center;">
                      @if($user->status == 1)
                        <span class="badge badge-success"><i class="fas fa-check"></i></span> <!-- Icono de palomita -->
                      @else
                        <span class="badge badge-danger"><i class="fas fa-times"></i></span> <!-- Icono de tachita -->
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>Tel. Celular</th>
                    <th>Simpatizantes</th>
                    <th>Correo</th>
                    <th>Estatus</th>
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
