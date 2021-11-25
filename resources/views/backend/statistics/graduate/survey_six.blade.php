@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Participación social de los egresados @endsection

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>
<div class="row">
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">¿Pertenece a organizaciones sociales?</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            Organizaciones:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                @foreach ($organization as $option)
                                <u>{{ $option->organization }}</u>&nbsp;
                                @endforeach
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">¿Pertenece a organismos de profesionistas?</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart1"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            Organismos profesionistas:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                @foreach ($agency as $option)
                                <u>{{ $option->agency }}</u>&nbsp;
                                @endforeach
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">¿Pertenece a asociaciones de egresados?</h3>
    
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart2"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            Asociaciones:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                @foreach ($association as $option)
                                <u>{{ $option->association }}</u>&nbsp;
                                @endforeach
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>    
</div>

@section('scripts')
<script src="{{ asset('backend/js/chart/graduate_6.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>


<script type="text/javascript">
    charts_six(
        <?php echo $organization_yes_no;?>,
        <?php echo $agency_yes_no;?>,
        <?php echo $association_yes_no;?>
    );
</script>

@endsection

@endsection