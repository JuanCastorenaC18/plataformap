<div class="row">
    <div class="col">
        <!-- small card -->
        <div class="small-box" style="background-color: #690;">
            <div class="inner">
                <p style="font-size:12px; color:#fff;">COORDINADOR ESTATAL</p>
                <h3 style="color:#fff">({{$cooestatalCount}})</h3>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('estatal.index') }}" class="small-box-footer">
                Ver Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col">
        <!-- small card -->
        <div class="small-box" style="background-color: #f90;">
            <div class="inner">
                <p  style="font-size:12px; color:#fff;">COORDINADOR MUNICIPAL</p>
                <h3 style="color:#fff">({{$coomunicipalCount}})</h3>
            </div>
            <div class="icon">
                <i class="fas fa-id-card-alt"></i>
            </div>
            <a href="{{ route('municipal.index') }}" class="small-box-footer">
                Ver Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col">
        <!-- small card -->
        <div class="small-box" style="background-color: #f00;">
            <div class="inner">
                <p  style="font-size:12px; color:#fff;">COORDINADOR DE GRUPO</p>
                <h3 style="color:#fff">({{$coogrupoCount}})</h3>
            </div>
            <div class="icon">
                <i class="fas fa-id-card-alt"></i>
            </div>
            <a href="{{ route('grupo.index') }}" class="small-box-footer">
                Ver Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col">
        <!-- small card -->
        <div class="small-box" style="background-color: #ed658a;">
            <div class="inner">
                <p  style="font-size:12px; color:#fff;">RESPONSABLE DE RED</p>
                <h3 style="color:#fff">({{$responsableredCount}})</h3>
            </div>
            <div class="icon">
                <i class="fas fa-id-card-alt"></i>
            </div>
            <a href="{{ route('responsable-red.index') }}" class="small-box-footer">
                Ver Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col">
        <!-- small card -->
        <div class="small-box" style="background-color: #603;">
            <div class="inner">
                <p  style="font-size:12px; color:#fff;">SIMPATIZANTES</p>
                <h3 style="color:#fff">({{$simpatizantesCount}})</h3>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('simpatizante.index') }}" class="small-box-footer">
                Ver Detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->  
</div>