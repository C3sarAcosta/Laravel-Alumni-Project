<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('student.index', $user_id_encrypt) }}" class="nav-link">Tablero</a>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Encuestas</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li>
                    <a href="{{ route('survey.one.verified', $user_id_encrypt) }}" class="dropdown-item">
                        1.- Perfil del Egresado
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.two.verified', $user_id_encrypt) }}" class="dropdown-item">
                        2.- Pertinencia y Disponibilidad
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.three.verified', $user_id_encrypt) }}" class="dropdown-item">
                        3.- Ubicación Laboral
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.four.verified', $user_id_encrypt) }}" class="dropdown-item">
                        4.- Desempeño Profesional
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.five.verified', $user_id_encrypt) }}" class="dropdown-item">
                        5.- Expéctativas y actualización
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.six.verified', $user_id_encrypt) }}" class="dropdown-item">
                        6.- Participación social
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.seven.verified', $user_id_encrypt) }}" class="dropdown-item">
                        7.- Comentarios y sugerencias
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.seven.verified', $user_id_encrypt) }}" class="dropdown-item">
                        8.- Ocho
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('jobs.view') }}" class="nav-link">Ofertas de Trabajo</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('student.view') }}" class="nav-link">Perfil</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a title="Salir" class="nav-link" href="{{ route('student.logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>