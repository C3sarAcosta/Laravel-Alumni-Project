@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Pertinencia y disponibilidad de medio y recursos para el aprendizaje @endsection

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>
<div class="row" id="print_row">
    <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Calidad de los docentes</h3>

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
                    @foreach ($quality_teachers as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->quality_teachers }}:&nbsp;
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
                <h3 class="card-title">Plan de estudios</h3>

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
                    @foreach ($syllabus as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->syllabus }}:&nbsp;
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
                <h3 class="card-title">Satisfacción condiciones de estudio (infraestructura)</h3>

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
                    @foreach ($study_condition as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->study_condition }}:&nbsp;
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
                <h3 class="card-title">Experiencia obtenida a través de la residencia profesional</h3>

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
                <canvas id="pieChart3"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($experience as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->experience }}:&nbsp;
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
                <h3 class="card-title">Énfasis que se le prestaba a la investigación dentro del proceso de
                enseñanza</h3>

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
                <canvas id="pieChart4"
                    style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($study_emphasis as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->study_emphasis }}:&nbsp;
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
                <h3 class="card-title">Oportunidad de participar en proyectos de investigación y
                desarrollo</h3>

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
                    @foreach ($participate_projects as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->participate_projects }}:&nbsp;
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
<script src="{{ asset('backend/js/chart/graduate_2.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>


<script type="text/javascript">
    charts_two(
        <?php echo $quality_teachers;?>,
        <?php echo $syllabus;?>,
        <?php echo $study_condition;?>,
        <?php echo $experience;?>,
        <?php echo $study_emphasis;?>,
        <?php echo $participate_projects;?>,
    );
</script>

@endsection

@endsection