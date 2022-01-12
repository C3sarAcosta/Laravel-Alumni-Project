@extends('company.company_master')

@section('TopTitle')Tablero @endsection

@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset ('backend/css/project/style.css')}}">
@endsection

@section('title_section')Tablero para empresas @endsection

@php
    function CheckSurvey($userSurveyCheck){
        $check = '<i class="fas fa-check-circle text-success" style="font-size: 25px;"></i>';
        $loader = '<div class="loaderSquare"> <span></span><span></span><span></span> </div>';
        $value = $userSurveyCheck == 1 ? $check : $loader;
        return $value;
    }

    function ReturnRoute($userSurveyCheck, $number){
        $route_index = 'survey.' . $number . '.company.index';
        $route_edit = 'survey.' . $number . '.company.edit';
        $route = $userSurveyCheck == 1
        ? route($route_edit)
        : route($route_index);
        return $route;
    }
@endphp

@section('company_content')
@if (Auth::user()->is_new_user == null)
<div class="row d-flex justify-content-sm-center">
    <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="{{asset('backend/img/school/itdelicias.png')}}" alt="User Image">
                    <span class="username">Bienvenido</span>
                    <span class="description">Comunicado oficial</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- post text -->
                <p class="text-justify">El Seguimiento de Egresados es "el conjunto de acciones realizadas” por la institución tendientes a mantener una
                comunicación constante con los sectores de empleadores, con el propósito de conocer la pertinencia y la formación
                obtenida por nuestros egresados en su formación académica y su competencia laboral, para que a partir de ello se
                instrumenten las estrategias de mejora continua. Por lo antes expuesto agradecemos de antemano su valioso apoyo al
                respecto y le solicitamos de la manera más atenta, tenga a bien contestar el cuestionario adjunto, lo que nos permitirá
                retroalimentar la pertinencia de las carreras que se ofrecen y coadyuvar a constituir una estrategia que logre, con base
                en la situación laboral de los egresados adecuar los planes y programas de estudio que ofertamos. La información que nos
                proporcione será estrictamente confidencial y con fines únicamente estadísticos.
                </p>

                <!-- Attachment -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jobs }}</h3>
                <p>Empleos publicados</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
            <a href="{{ route('company.jobs.view') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $postulates }}</h3>
                <p>Postulados</p>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="{{ route('company.jobs.postulate') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box {!! !$survey_done ? " bg-success": "bg-danger" !!}">
            <div class="inner">
                <h3>{{ !$survey_done ? "Completadas": "Sin completar" }}</h3>
                <p>Encuestas completadas</p>
            </div>
            <div class="icon">
                <i class="ion {!! !$survey_done ? " ion-checkmark": "ion-close-circled" !!} "></i>
            </div>
            <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! CheckSurvey($companySurvey['survey_one_company_done']) !!}
                    </div>
                    <a href="{{ ReturnRoute($companySurvey['survey_one_company_done'], 'one') }}"
                        title="Datos generales">
                        <img src="{{ asset('backend/img/school/sn1.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Datos generales de la empresa u organismo.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! CheckSurvey($companySurvey['survey_two_company_done']) !!}
                    </div>
                    <a href="{{ ReturnRoute($companySurvey['survey_two_company_done'], 'two') }}"
                        title="Ubicación laboral de los egresados">
                        <img src="{{ asset('backend/img/school/sn2.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Ubicación laboral de los egresados.</h5>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container-image">
                    <div class="container-loader">
                        {!! CheckSurvey($companySurvey['survey_three_company_done']) !!}
                    </div>
                    <a href="{{ ReturnRoute($companySurvey['survey_three_company_done'], 'three') }}"
                        title="Competencias laborales">
                        <img src="{{ asset('backend/img/school/sn3.png') }}" />
                    </a>
                    <div class="container-text">
                        <h5>Competencias laborales.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script type="text/javascript">
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows: false,
            },
            pagination: {
              el: ".swiper-pagination",
            },
          });
    </script>
    @endsection