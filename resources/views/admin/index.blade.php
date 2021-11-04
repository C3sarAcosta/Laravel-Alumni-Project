@extends('admin.admin_master')

@section('TopTitle')Tablero @endsection

@section('title_section')Tablero de Administrator @endsection

@php
$array_labels = array();
$array_data = array();
$array_labels_careers = array();
$array_data_careers = array();

foreach ($survey_three as $data){
array_push($array_data, $data->total);
array_push($array_labels, $data->do_for_living);
}

foreach ($careers as $data){
array_push($array_labels_careers, $data->name);
array_push($array_data_careers, $data->total);
}

$array_labels = json_encode($array_labels);
$array_data = json_encode($array_data);
$array_labels_careers = json_encode($array_labels_careers);
$array_data_careers = json_encode($array_data_careers);
@endphp

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
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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

        <!-- DONUT CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

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
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

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
    <!-- /.col (RIGHT) -->
</div>


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.js"></script>
<script type="text/javascript">
    $(function () {
        var data_graduates = <?php echo $array_data; ?>;
        var labels_graduates = <?php echo $array_labels; ?>;
        var colors_graduates = [];
        for (let i = 0; i < data_graduates.length; i++) { 
            var color = randomColor();
            colors_graduates.push(color) ; 
        }


        var data_careers = <?php echo $array_data_careers; ?>;
        var labels_careers = <?php echo $array_labels_careers; ?>;
        var colors_careers = [];
        for (let i = 0; i < data_careers.length; i++) { 
            var color = randomColor();
            colors_careers.push(color) ; 
        }




    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: labels_graduates,
      datasets: [
        {
          data: data_graduates,
          backgroundColor : colors_graduates,
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }


    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })



    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData  = {
      labels: labels_careers,
      datasets: [
        {
          data: data_careers,
          backgroundColor : colors_careers,
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>
@endsection

@endsection