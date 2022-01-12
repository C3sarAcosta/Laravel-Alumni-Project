<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.index') }}" class="nav-link">Tablero</a>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Configuración</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li>
                    <a href="{{ route('career.view') }}" class="dropdown-item">
                        Carreras
                    </a>
                </li>
                <li>
                    <a href="{{ route('specialty.view') }}" class="dropdown-item">
                        Especialidad
                    </a>
                </li>
                <li>
                    <a href="{{ route('graduate.configuration.view') }}" class="dropdown-item">
                        Egresados
                    </a>
                </li>
                <li>
                    <a href="{{ route('graduate.survey.view') }}" class="dropdown-item">
                        Egresados encuestas
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.config.view') }}" class="dropdown-item">
                        Empresas
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Estadísticas</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Egresados</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="{{ route('survey.one.statistic.view') }}" class="dropdown-item">1.
                                Perfil</a>
                        </li>

                        <li><a href="{{ route('survey.two.statistic.view') }}" class="dropdown-item">2. Pertinencia</a>
                        </li>
                        <li><a href="{{ route('survey.three.statistic.view') }}" class="dropdown-item">3. Ubicación
                                laboral</a></li>
                        <li><a href="{{ route('survey.four.statistic.view') }}" class="dropdown-item">4. Desempeño</a>
                        </li>
                        <li><a href="{{ route('survey.five.statistic.view') }}" class="dropdown-item">5.
                                Expéctativas</a></li>
                        <li><a href="{{ route('survey.six.statistic.view') }}" class="dropdown-item">6.
                                Participación</a></li>
                    </ul>
                </li>
                <!-- End Level two -->

                <li class="dropdown-divider"></li>

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Empresas</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="{{ route('company.survey.one.statistic.view') }}"
                                class="dropdown-item">1. Datos generales</a>
                        </li>

                        <li><a href="{{ route('company.survey.two.statistic.view') }}" class="dropdown-item">2.
                                Ubicación laboral</a></li>
                        <li><a href="{{ route('company.survey.three.statistic.view') }}" class="dropdown-item">3.
                                Competencias</a></li>
                    </ul>
                </li>
                <!-- End Level two -->
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Reportes</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Egresados</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="{{ route('survey.one.report.view') }}" class="dropdown-item">1.
                                Perfil</a>
                        </li>

                        <li><a href="{{ route('survey.two.report.view') }}" class="dropdown-item">2. Pertinencia</a>
                        </li>
                        <li><a href="{{ route('survey.three.report.view') }}" class="dropdown-item">3. Ubicación
                                laboral</a>
                        </li>
                        <li><a href="{{ route('survey.four.report.view') }}" class="dropdown-item">4. Desempeño</a></li>
                        <li><a href="{{ route('survey.five.report.view') }}" class="dropdown-item">5. Expéctativas</a>
                        </li>
                        <li><a href="{{ route('survey.six.report.view') }}" class="dropdown-item">6. Participación</a>
                        </li>
                        <li><a href="{{ route('survey.seven.report.view') }}" class="dropdown-item">7. Comentarios</a>
                        </li>
                    </ul>
                </li>
                <!-- End Level two -->

                <li class="dropdown-divider"></li>

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Empresas</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="{{ route('company.survey.one.report.view') }}"
                                class="dropdown-item">1. Datos generales</a>
                        </li>

                        <li><a href="{{ route('company.survey.two.report.view') }}" class="dropdown-item">2. Ubicación
                                laboral</a></li>
                        <li><a href="{{ route('company.survey.three.report.view') }}" class="dropdown-item">3.
                                Competencias</a></li>
                    </ul>
                </li>
                <!-- End Level two -->
            </ul>
        </li>


        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.view') }}" class="nav-link">Perfil</a>
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
            <a title="Salir" class="nav-link" href="{{ route('admin.logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>