@extends('company.company_master')

@section('TopTitle')Tablero @endsection

@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset ('backend/css/project/style.css')}}">
@endsection

@section('title_section')Dashboard para empresas @endsection

@php

function CheckSurvey($userSurveyCheck){
$check = '<i class="fas fa-check-circle TecColor" style="font-size: 25px;"></i>';
$loader = '<div class="loaderSquare"> <span></span><span></span><span></span> </div>';
$value = $userSurveyCheck == 1 ? $check : $loader;
return $value;
}

function ReturnRoute($userSurveyCheck, $number){
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$route_index = 'survey.' . $number . '.company.index';
$route_edit = 'survey.' . $number . '.company.edit';
$route = $userSurveyCheck == 1
? route($route_edit, $user_id_encrypt)
: route($route_index);
return $route;
}

@endphp

@section('company_content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Empleos Activos</span>
                <span class="info-box-number">10</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-pdf"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Postulados</span>
                <span class="info-box-number">10</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Egresados disponibles</span>
                <span class="info-box-number">10</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-{{$survey_done == false ? "success": "info" }} elevation-1"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Encuestas completadas</span>
                <span class="info-box-number">{{$survey_done == false ? "Completadas": "Sin completar" }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($companySurvey['survey_one_company_done']) !!}
                </div>
                <a href="{{ ReturnRoute($companySurvey['survey_one_company_done'], 'one') }}" title="Datos generales">
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
<script>
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