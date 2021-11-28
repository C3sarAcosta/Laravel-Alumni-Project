@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Perfil del Egresado @endsection

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>
<div class="row" id="print_row">
    <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Sexo</h3>

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
                    @foreach ($sex as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->sex }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Estado Civil</h3>

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
                    @foreach ($marital_status as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->marital_status }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Estado</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
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
                    @foreach ($state as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->state }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Carreras de los egresados</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart3"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($career as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->career }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Especialidad de los egresados</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart4"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($specialty as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->specialty }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col (LEFT) -->

    <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">¿El egresado está títulado?</h3>

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
                <canvas id="pieChart5"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($qualified as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->qualified }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Mes de egreso</h3>

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
                <canvas id="pieChart6"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($month as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->month }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Año de egreso</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart7"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($year as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->year }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Porcentaje de inglés</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart8"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($percent_english as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->percent_english }}%:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Otra lengua</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="pieChart9"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($another_language as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->another_language }}:&nbsp;
                            <span class="float-right text-primary font-weight-bold">
                                {{ $option->total }}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col (RIGHT) -->
</div>
@section('scripts')
<script src="{{ asset('backend/js/chart/graduate_1.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>


<script type="text/javascript">
    charts_one(
        <?php echo $sex;?>,
        <?php echo $marital_status;?>,
        <?php echo $state;?>,
        <?php echo $career;?>,
        <?php echo $specialty;?>,
        <?php echo $qualified;?>,
        <?php echo $month;?>,
        <?php echo $year;?>,
        <?php echo $percent_english;?>,
        <?php echo $another_language;?>
    );
</script>

@endsection

@endsection