@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Expéctativas de desarrollo, superación profesional y de actualización @endsection

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>
<div class="row">
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">¿Le gustaria tomar cursos de actualización?</h3>
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
        </div>
        <!-- /.card -->
    </div>

    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">¿Le gustaria tomar algún posgrado?</h3>
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
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div id="accordion" class="pb-5">
            <div class="row d-flex justify-content-center">
                <div class="card w-75 text-dark">
                    <div class="card-header bg-gray-dark">
                        <a class="card-link text-light" data-toggle="collapse" href="#collapseOne">
                            Cursos que interesan a los egresados
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul class="description-style">
                                @foreach ($courses as $option)
                                <li>{{ $option->courses }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="card w-75 text-dark">
                    <div class="card-header bg-gray-dark">
                        <a class="collapsed card-link text-light" data-toggle="collapse" href="#collapseTwo">
                            Posgrado que interesan a los egresados
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul class="description-style">
                                @foreach ($master as $option)
                                <li>{{ $option->master }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('backend/js/chart/graduate_5.js') }}" type="text/javascript"> </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script type="text/javascript">
    charts_five(
        @php echo $courses_yes_no; @endphp,
        @php echo $master_yes_no; @endphp,
    );
</script>

@endsection

@endsection