@extends('student.student_master')

@section('TopTitle')Tablero @endsection

@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{asset ('backend/css/project/style.css')}}">
@endsection

@section('title_section')Encuestas por contestar @endsection

@section('student_content')

@php

function CheckSurvey($userSurveyCheck){
$check = '<i class="fas fa-check-circle TecColor" style="font-size: 25px;"></i>';
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
                <a href="{{ ReturnRoute($studentSurvey['survey_two_done'], 'two') }}" title="Pertinencia y disponibilidad">
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
                <a href="{{ ReturnRoute($studentSurvey['survey_five_done'], 'five') }}" title="Expéctativas de desarrollo">
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
                <a href="{{ ReturnRoute($studentSurvey['survey_six_done'], 'six') }}" title="Participación social de los egresados">
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
                <a href="{{ ReturnRoute($studentSurvey['survey_seven_done'], 'seven') }}" title="Comentarios y sugerencias">
                    <img src="{{ asset('backend/img/school/sn7.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Comentarios y sugerencias.</h5>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="container-image">
                <div class="container-loader">
                    {!! CheckSurvey($studentSurvey['survey_eight_done']) !!}
                </div>
                <a href="" title="Ocho">
                    <img src="{{ asset('backend/img/school/sn8.png') }}" />
                </a>
                <div class="container-text">
                    <h5>Ocho</h5>
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