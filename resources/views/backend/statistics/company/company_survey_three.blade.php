@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Competencias Laborales @endsection

@php
$arr=array(5=>'Excelente', 4=>'Bueno', 3=>'Regular', 2=>'Malo', 1=>'Pesimo');
@endphp

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>

<div class="row">
    <div class="col-12">
        <!-- BAR CHART -->
        <div class="card card-danger">
            <div class="card-header">Competencias considera deben desarrollar los egresados del Instituto Tecnológico,
                para desempeñarse eficientemente en sus actividades laborales. Promedios.</h3>
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
                <h3 class="card-title">Habilidad para resolver conflictos</h3>
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
                    @foreach ($resolve_conflicts as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->resolve_conflicts].' ('.$option->resolve_conflicts.')' }}:&nbsp;
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
                <h3 class="card-title">Ortografía y redacción de documentos</h3>

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
                    @foreach ($orthography as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->orthography].' ('.$option->orthography.')' }}:&nbsp;
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
                <h3 class="card-title">Mejora de procesos</h3>
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
                    @foreach ($process_improvement as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->process_improvement].' ('.$option->process_improvement.')' }}:&nbsp;
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
                <h3 class="card-title">Trabajo en equipo</h3>
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
                    @foreach ($teamwork as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->teamwork].' ('.$option->teamwork.')' }}:&nbsp;
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
                <h3 class="card-title">Habilidad para administrar tiempo</h3>
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
                    @foreach ($time_management as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->time_management].' ('.$option->time_management.')' }}:&nbsp;
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
                <h3 class="card-title">Seguridad personal</h3>
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
                    @foreach ($security as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->security].' ('.$option->security.')' }}:&nbsp;
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
                <h3 class="card-title">Facilidad de palabra</h3>
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
                    @foreach ($ease_speech as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->ease_speech].' ('.$option->ease_speech.')' }}:&nbsp;
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
                <h3 class="card-title">Gestión de proyectos</h3>
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
                    @foreach ($project_management as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->project_management].' ('.$option->project_management.')' }}:&nbsp;
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
                <h3 class="card-title">Puntualidad y asistencia</h3>
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
                    @foreach ($puntuality as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->puntuality].' ('.$option->puntuality.')' }}:&nbsp;
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
                <h3 class="card-title">Cumplimiento de las normas</h3>
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
                    @foreach ($rules as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->rules].' ('.$option->rules.')' }}:&nbsp;
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
                <h3 class="card-title">Integración al trabajo</h3>
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
                    @foreach ($integration_work as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->integration_work].' ('.$option->integration_work.')' }}:&nbsp;
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
                <h3 class="card-title">Creatividad e innovación</h3>
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
                    @foreach ($creativity as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->creativity].' ('.$option->creativity.')' }}:&nbsp;
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
                <h3 class="card-title">Capacidad de negociación</h3>
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
                    @foreach ($bargaining as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->bargaining].' ('.$option->bargaining.')' }}:&nbsp;
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
                <h3 class="card-title">Abstracción, análisis y síntesis</h3>
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
                <canvas id="pieChart14" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($abstraction as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->abstraction].' ('.$option->abstraction.')' }}:&nbsp;
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
                <h3 class="card-title">Liderazgo y toma de decisión</h3>
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
                <canvas id="pieChart15" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
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
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Adaptar al cambio</h3>
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
                <canvas id="pieChart16" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($changes as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $arr[$option->changes].' ('.$option->changes.')' }}:&nbsp;
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

<div class="row">
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">¿Cómo considera su desempeño laboral respecto a su formación académica? Del total
                    de egresados anote el porcentaje que corresponda.</h3>
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
                <canvas id="pieChart17" width="685" height="312" class="chartjs-render-monitor pie-style"></canvas>
            </div>
            <!-- /.card-body -->

            <div class="card-footer bg-light p-0 d-flex justify-content-sm-center">
                <ul class="nav nav-pills flex-column">
                    @foreach ($job_performance as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->job_performance }}:&nbsp;
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

@section('scripts')
<script src="{{ asset('backend/js/chart/company_3.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script type="text/javascript">
    charts_three(
        @php echo $resolve_conflicts; @endphp,
        @php echo $orthography; @endphp,
        @php echo $process_improvement; @endphp,
        @php echo $teamwork; @endphp,
        @php echo $time_management; @endphp,
        @php echo $security; @endphp,
        @php echo $ease_speech; @endphp,
        @php echo $project_management; @endphp,
        @php echo $puntuality; @endphp,
        @php echo $rules; @endphp,
        @php echo $integration_work; @endphp,
        @php echo $creativity; @endphp,
        @php echo $bargaining; @endphp,
        @php echo $abstraction; @endphp,
        @php echo $leadership; @endphp,
        @php echo $changes; @endphp,
        @php echo $job_performance; @endphp,
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