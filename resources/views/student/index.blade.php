@extends('student.student_master')

@section('TopTitle')Tablero @endsection

@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset ('backend/css/project/style.css')}}">
@endsection

@php

function CheckSurvey($userSurveyCheck){
$check = '<i class="fas fa-check-circle text-success" style="font-size: 25px;"></i>';
$loader = '<div class="loaderSquare"> <span></span><span></span><span></span> </div>';
$value = $userSurveyCheck == 1 ? $check : $loader;
return $value;
}

function ReturnRoute($userSurveyCheck, $number){
$user_id_encrypt = Crypt::encrypt(Auth::user()->id);
$route_index = 'survey.' . $number . '.index';
$route_edit = 'survey.' . $number . '.edit';
$route = $userSurveyCheck == 1
? route($route_edit, $user_id_encrypt)
: route($route_index);
return $route;
}

@endphp

@section('title_section')Tablero Egresado @endsection

@section('student_content')

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
                <p class="text-justify">Estimado Egresado:<br />
                    Los servicios educativos de este Instituto Tecnológico deben estar en mejora continua para asegurar la pertinencia de
                    los conocimientos adquiridos y mejorar sistemáticamente, para colaborar en la formación integral de nuestros alumnos. <br />
                    Para esto es indispensable tomarte en cuenta como factor de cambios y reformas, por lo que por este medio solicitamos tu
                    valiosa participación y cooperación en esta investigación del Seguimiento de Egresados, que nos permitirá obtener
                    información valiosa para analizar la problemática del mercado laboral y sus características, así como las competencias
                    laborales de nuestros egresados.<br/>
                    Las respuestas del cuestionario anexo serán tratadas con absoluta confidencialidad y con fines meramente estadísticos.
                </p>
                <!-- Attachment -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endif
<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_one_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_one_done'], 'one') }}" title="Perfil del egresado">
                    <img src="{{ asset('backend/img/school/sn1.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Perfil del egresado.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_two_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_two_done'], 'two') }}"
                    title="Pertinencia y disponibilidad">
                    <img src="{{ asset('backend/img/school/sn2.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Pertinencia y disponibilidad de medio y recursos para el aprendizaje.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_three_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_three_done'], 'three') }}"
                    title="Ubicación laboral de los egresados">
                    <img src="{{ asset('backend/img/school/sn3.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Ubicación laboral de los egresados.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_four_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_four_done'], 'four') }}"
                    title="Desempeño profesional de los egresados">
                    <img src="{{ asset('backend/img/school/sn4.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Desempeño profesional de los egresados.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_five_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_five_done'], 'five') }}"
                    title="Expéctativas de desarrollo">
                    <img src="{{ asset('backend/img/school/sn5.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Expéctativas de desarrollo, superación profesional y de actualización.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_six_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_six_done'], 'six') }}"
                    title="Participación social de los egresados">
                    <img src="{{ asset('backend/img/school/sn6.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Participación social de los egresados.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_seven_done']) !!}
                </div>
                <a href="{{ ReturnRoute($studentSurvey['survey_seven_done'], 'seven') }}"
                    title="Comentarios y sugerencias">
                    <img src="{{ asset('backend/img/school/sn7.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Comentarios y sugerencias.</h5>
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