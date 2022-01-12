@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Desempeño profesional de los egresados @endsection

@php
    $arr=array(5=>'Excelente', 4=>'Bueno', 3=>'Regular', 2=>'Malo', 1=>'Pesimo');
@endphp

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>

<div class="row">
    <div class="col-4">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Eficiencia para realizar las actividades laborales, en relación con su formación
                    académica</h3>
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
                <canvas id="pieChart1" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($efficiency_work_activities as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->efficiency_work_activities }}:&nbsp;
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

    <div class="col-4">
        <!-- PIE CHART -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cómo califica su formación académica con respecto a su desempeño laboral</h3>
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
                <canvas id="pieChart2" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($academic_training as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->academic_training }}:&nbsp;
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

    <div class="col-4">
        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Utilidad de las residencias profesionales o prácticas profesionales para su
                    desarrollo laboral y profesional</h3>
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
                <canvas id="pieChart3" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($usefulness_professional_residence as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->usefulness_professional_residence }}:&nbsp;
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
</div>

<div class="row">
    <div class="col-12">
        <!-- BAR CHART -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Aspectos que valora la empresa u organismo para la contratación de egresados.
                    Promedios</h3>
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
                <canvas id="bar" width="685" height="312" class="chartjs-render-monitor bar-style"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Área o campo de estudio</h3>
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
                <canvas id="pieChart4" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($study_area as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->study_area].' ('.$option->study_area.')' }}:&nbsp;
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
                <h3 class="card-title">Titulación</h3>
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
                <canvas id="pieChart5" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($title as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->title].' ('.$option->title.')' }}:&nbsp;
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
                <h3 class="card-title">Experiencia Laboral / Práctica (antes de egresar)</h3>
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
                <canvas id="pieChart6" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($experience as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->experience].' ('.$option->experience.')' }}:&nbsp;
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
                <h3 class="card-title">Competencia Laboral: Resolver problemas, análisis, aprendizaje, trabajo en
                    equipo, etc</h3>
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
                <canvas id="pieChart7" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($job_competence as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->job_competence].' ('.$option->job_competence.')' }}:&nbsp;
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
                <h3 class="card-title">Posicionamiento de la Institución de Egreso</h3>
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
                <canvas id="pieChart8" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($positioning as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->positioning].' ('.$option->positioning.')' }}:&nbsp;
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
                <h3 class="card-title">Conocimiento de Idiomas Extranjeros</h3>
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
                <canvas id="pieChart9" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($languages as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->languages].' ('.$option->languages.')' }}:&nbsp;
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
                <h3 class="card-title">Recomendaciones / Referencias</h3>
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
                <canvas id="pieChart10" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($recommendations as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->recommendations].' ('.$option->recommendations.')' }}:&nbsp;
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
                <h3 class="card-title">Personalidad / Actitudes</h3>
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
                <canvas id="pieChart11" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($personality as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->personality].' ('.$option->personality.')' }}:&nbsp;
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
                <h3 class="card-title">Capacidad de liderazgo</h3>
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
                <canvas id="pieChart12" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($leadership as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->leadership].' ('.$option->leadership.')' }}:&nbsp;
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
                <h3 class="card-title">Otros</h3>
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
                <canvas id="pieChart13" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($others as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->others].' ('.$option->others.')' }}:&nbsp;
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

<script src="{{ asset('backend/js/chart/graduate_4.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script type="text/javascript">
    charts_four(
        @php echo $efficiency_work_activities; @endphp,
        @php echo $academic_training; @endphp,
        @php echo $usefulness_professional_residence; @endphp,
        @php echo $study_area; @endphp,
        @php echo $title; @endphp,
        @php echo $experience; @endphp,
        @php echo $job_competence; @endphp,
        @php echo $positioning; @endphp,
        @php echo $languages; @endphp,
        @php echo $recommendations; @endphp,
        @php echo $personality; @endphp,
        @php echo $leadership; @endphp,
        @php echo $others; @endphp,
    );

    $(function () {
        var labels_avg = [@php foreach($averages as $key => $average){ echo ('\'' . $key .'\'' .',');}@endphp];
        var data_avg = [@php foreach($averages as $average){ echo ($average .',');}@endphp];
        var colors_avg = randomColor({luminosity: 'light',count: data_avg.length});

        const data = {
            labels: labels_avg,
            datasets: [{
                label: 'Promedios',
                data: data_avg,
                backgroundColor: colors_avg,
                borderWidth: 1,
            }]
        };

          var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                min: 0
              }    
            }]
          }
        };

        var ctx = $('#bar').get(0).getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });

</script>

@endsection

@endsection