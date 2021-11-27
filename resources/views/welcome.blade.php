<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Seguimiento de Egresados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset ('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="icon" href="{{asset ('backend/img/school/favicon.ico')}}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-light" href="#">
                    <h5>Sistema de Seguimiento de Egresados</h5>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.delicias.tecnm.mx/">Tecnológico de Delicias</a>
                        </li>

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('graduate.register') }}">Registro Egresado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero section -->
    <section id="hero">
        <div class="container">
            <div class="row main-hero-content">
                <div class="col-md-6">
                    <h1 class="title-h1">Sistema Seguimiento de Egresados</h1>
                    <p>El SSE es el sistema que permite el análisis del desempeño e impacto de los egresados en el
                        sector productivo.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-outline-primary btn-white">Conocer más!</a>
                    </div>
                </div>
                <div class="col-md-6" style="display: flex; justify-content:center; flex-wrap:wrap; text-align:center;">
                    <a href="https://www.freepik.com/vectorjuice" class="text-light"><img
                            src="{{asset('backend/img/school/students.png')}}" class="img-fluid" alt=""><br /> Designed
                        by vectorjuice / Freepik</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section id="about">
        <div class="container">
            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">¿Por qué es importante?</h2>
            </div>
            <div class="row justify-content-center text-center mt-5">
                <div class="col-md-4">
                    <i class="lni lni-bar-chart mb-2"></i>
                    <h3>Recabar Información</h3>
                    <p class="text-justify">Producir indicadores que permitan a la universidad conocer la situación del
                        egresado ITD.</p>
                </div>
                <div class="col-md-4">
                    <i class="lni lni-certificate mb-2"></i>
                    <h3>Titulación</h3>
                    <p class="text-justify">Tener las encuestas registradas es un requisito para que los alumnos puede
                        continuar con su proceso de titulación.</p>
                </div>
                <div class="col-md-4">
                    <i class="lni lni-support mb-2"></i>
                    <h3>Ofrecer Soporte</h3>
                    <p class="text-justify">Recabar y actualizar la información ayuda para proveer de elementos para la
                        mejora continua y el
                        desarrollo profesional de nuestros egresados en el sector productivo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature section -->
    <section id="features">
        <div class="container">
            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">Información Importante</h2>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="feature-block">
                        <i class="lni lni-graduation"></i>
                        <h3 class="text-center">Pefil de Egreso</h3>
                        <p class="text-justify">El perfil del egresado incluye un componente estable, es decir, la información demográfica básica de cada individuo como
                        es, género, lugar de nacimiento, fecha de nacimiento, formación, antecedentes académicos, estado civil, lugar de
                        residencia, etc. Y un componente dinámico, que es susceptible de cambiar a lo largo del tiempo (lugar de residencia,
                        nivel de ingresos, estado civil, puestos de trabajo, otros estudios, etc.).</p>
                    </div>
                    <div class="feature-block mt-5">
                        <i class="lni lni-apartment"></i>
                        <h3 class="text-center">Datos de empresas</h3>
                        <p class="text-justify">Los empleadores y las organizaciones a las que representan, son una parte importante al que sirven las instituciones de
                        educación superior tecnológica y, en consecuencia, la información que se deriva de estos debe ser analizada y utilizada
                        para emprender acciones de mejora de los planes y programas de estudio y de la calidad académica en general.</p>
                    </div>
                </div>
                <div class="col-md-4 device" style="display:flex; justify-content:center; align-items:center;">
                    <img style="width:200px; height:300px;" src="{{asset('backend/img/school/survey.png')}}" alt="">
                </div>
                <div class="col-md-4">
                    <div class="feature-block">
                        <i class="lni lni-handshake"></i>
                        <h3 class="text-center">Desempeño del egresado</h3>
                        <p class="text-justify">Las encuestas de egresados son útiles para recopilar datos sobre la situación laboral de los egresados más recientes,
                        con el fin de obtener indicadores del desempeño profesional. Las encuestas también están diseñadas para contribuir a las
                        explicaciones causales de la pertinencia de las condiciones de estudio y los servicios proporcionados por las
                        instituciones de educación superior, así como del desempeño de los egresados en el mercado laboral.</p>
                    </div>
                    <div class="feature-block mt-5">
                        <i class="lni lni-thumbs-up"></i> <i class="lni lni-thumbs-down"></i>
                        <h3 class="text-center">Expectativas del egresado</h3>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae illum
                            asperiores deleniti.
                            Facere, possimus
                            architecto necessitatibus alias veritatis aperiam eius quibusdam vel ducimus fuga
                            delectus, velit, temporibus consequatur voluptatibus a.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex flex-column align-items-center">
                <div class="social-icons text-light">
                    <a href="https://www.facebook.com/tecnologico.delicias/"><i
                            class="lni lni-facebook-original"></i></a>
                    <a href="https://www.delicias.tecnm.mx/"><i class="lni lni-website"></i></a>
                    <a href="https://www.linkedin.com/school/itdelicias/"><i class="lni lni-linkedin-original"></i></a>
                </div>
                <div class="copyright text-center">
                    <p>Copyright 2021</p>
                </div>
            </div>
        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
</body>

</html>