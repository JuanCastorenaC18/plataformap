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
            @can('estatal.create')
                <a href="#" class="small-box-footer">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            @endcan
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
            @can('municipal.create')
                <a href="{{ route('municipal.create') }}" class="small-box-footer">
                    DAR DE ALTA <i class="fas fa-arrow-circle-right"></i>
                </a>
            @endcan
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
            @can('grupo.create')
                <a href="{{ route('grupo.create') }}" class="small-box-footer">
                    DAR DE ALTA <i class="fas fa-arrow-circle-right"></i>
                </a>
            @endcan
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
            <a href="#" class="small-box-footer">
                NO REQUERIDO <i class="fas fa-arrow-circle-right"></i>
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
            @can('simpatizante.create')
                <a href="{{ route('simpatizante.create') }}" class="small-box-footer">
                    DAR DE ALTA <i class="fas fa-arrow-circle-right"></i>
                </a>
            @endcan
        </div>
    </div>
    <!-- ./col -->  
</div>