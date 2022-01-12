@extends('admin.admin_master')

@section('TopTitle')Estadísticas @endsection

@section('title_section')Estadísticas Ubicación laboral de los egresados @endsection

@section('admin_content')
<div class="row d-flex justify-content-sm-center mb-4">
    <button id="print_button" class="btn bg-gradient-success btn-lg">Imprimir</button>
</div>
<div class="row">
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Número de profesionistas con nivel de licenciatura que laboran en la empresa u
                    organismo</h3>
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
                    @foreach ($number_graduates as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->number_graduates }}:&nbsp;
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
                <h3 class="card-title">Número de egresados del Instituto Tecnológico y nivel jerárquico que ocupan en su
                    organización</h3>
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
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Congruencia entre perfil profesional y función que desarrollan los egresados del
                    Instituto Tecnológico en su empresa u organización</h3>
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
                    @foreach ($congruence as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->congruence }}:&nbsp;
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
                <h3 class="card-title">Número de egresados del Instituto Tecnológico y nivel jerárquico que ocupan en su
                    organización</h3>
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
                <canvas id="bar2" width="685" height="312" class="chartjs-render-monitor bar-style"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <!-- PIE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Carrera que demanda preferentemente su empresa u organismo</h3>
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
                    @foreach ($most_demanded_career as $option)
                    <li class="nav-item">
                        <span class="nav-link text-decoration-none">
                            {{ $option->most_demanded_career }}:&nbsp;
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
<script src="{{ asset('backend/js/chart/company_2.js') }}" type="text/javascript"> </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    charts_two(
        @php echo $careers; @endphp,
        @php echo $number_graduates; @endphp,
        @php echo $congruence; @endphp,
        @php echo $most_demanded_career; @endphp,
    );

    $(function () {
        var labels_count = [@php foreach($counts as $key => $count){ echo ('\'' . $key .'\'' .',');}@endphp];
        var data_count = [@php foreach($counts as $count){ echo ($count .',');}@endphp];
        var colors_count = randomColor({luminosity: 'light',count: data_count.length});

        var options = {
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        return (
                            "$" + Number(tooltipItem.yLabel) + " and so worth it !"
                        );
                    },
                },
            },
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                        },
                    },
                ],
            },
        };

        const data2 = {
            labels: labels_count,
            datasets: [
                {
                    label: "Cuenta",
                    data: data_count,
                    backgroundColor: colors_count,
                    borderWidth: 1,
                },
            ],
        };

        var ctx2 = $("#bar2").get(0).getContext("2d");
        new Chart(ctx2, {
            type: "bar",
            data: data2,
            options: options,
        });
    });

</script>

@endsection

@endsection