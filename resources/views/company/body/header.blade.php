<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('company.index') }}" class="nav-link">Tablero</a>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Encuestas</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li>
                    <a href="{{ route('survey.one.company.verified') }}" class="dropdown-item">
                        1.- Datos generales de la empresa u organismo
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.two.company.verified') }}" class="dropdown-item">
                        2.- Ubicación Laboral del Egresado
                    </a>
                </li>
                <li>
                    <a href="{{ route('survey.three.company.verified') }}" class="dropdown-item">
                        3.- Competencias Laborales
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Empleos</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                <li>
                    <a href="{{ route('company.jobs.view') }}" class="dropdown-item">
                        Lista Empleos
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.jobs.postulate') }}" class="dropdown-item">
                        Ver postulados
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('company.view') }}" class="nav-link">Perfil</a>
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
            <a title="Salir" class="nav-link" href="{{ route('company.logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>