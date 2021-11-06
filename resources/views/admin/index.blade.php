@extends('admin.admin_master')

@section('TopTitle')Tablero @endsection

@section('title_section')Tablero de Administrator @endsection

@section('admin_content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $gradute }}</h3>
                <p>Egresados registrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('graduate.view') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $company }}</h3>
                <p>Empresas registradas</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
            <a href="{{ route('company.config.view') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $survey }}</h3>
                <p>Encuestas respondidas</p>
            </div>
            <div class="icon">
                <i class="ion ion-document"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $percent }}<sup style="font-size: 20px">%</sup></h3>
                <p>Porcentaje de repuesta</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">¿Qué es lo que están haciendo los egresados?</h3>

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
                <canvas id="donutChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
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
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col (LEFT) -->

    <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Calidad de los docentes según los egresados</h3>
        
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
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- DONUT CHART -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Sexo de los egresados</h3>
        
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
                <canvas id="donutChart2"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 548px;"
                    width="685" height="312" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col (RIGHT) -->
</div>

@section('scripts')
<script src="{{ asset('backend/js/charts.js') }}" type="text/javascript"> </script>
<script type="text/javascript">

$(function () {
    var array_survey_three = <?php echo $survey_three;?>;
    var labels_graduates = array_survey_three.map(a => a.do_for_living);
    var colors_graduates = [];
    var data_graduates = array_data(array_survey_three, colors_graduates);

    var array_careers = <?php echo $careers;?>;
    var labels_careers = array_careers.map(a => a.name);
    var colors_careers = [];
    var data_careers = array_data(array_careers, colors_careers);

    var array_quality = <?php echo $survey_two;?>;
    var labels_quality = array_quality.map(a => a.quality_teachers);
    var colors_quality = [];
    var data_quality = array_data(array_quality, colors_quality);

    var array_sex = <?php echo $survey_one;?>;
    var labels_sex = array_sex.map(a => a.sex);
    var colors_sex = [];
    var data_sex = array_data(array_sex, colors_sex);


    //-------------
    //- DONUT CHART -
    //-------------
    var donutOptions = { maintainAspectRatio: false, responsive: true, }
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
    var donutData = {
        labels: labels_graduates,
        datasets: [
            { data: data_graduates, backgroundColor: colors_graduates, }
        ]
    }

    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    });

    //-------------
    //- PIE CHART -
    //-------------
    var pieOptions = { maintainAspectRatio: false, responsive: true, }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieData = {
        labels: labels_careers,
        datasets: [
            { data: data_careers, backgroundColor: colors_careers, }
        ]
    }
    
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });

    //-------------
    //- PIE CHART 2-
    //-------------
    var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d');
    var pieData2 = {
        labels: labels_quality,
        datasets: [
            { data: data_quality, backgroundColor: colors_quality, }
        ]
    }

    new Chart(pieChartCanvas2, {
        type: 'pie',
        data: pieData2,
        options: pieOptions
    });
    
    
    //-------------
    //- DONUT CHART 2-
    //-------------
    var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d');
    var donutData2 = {
        labels: labels_sex,
        datasets: [
            { data: data_sex, backgroundColor: colors_sex, }
        ]
    }

    new Chart(donutChartCanvas2, {
        type: 'doughnut',
        data: donutData2,
        options: donutOptions
    });    
});
</script>

@endsection

@endsection