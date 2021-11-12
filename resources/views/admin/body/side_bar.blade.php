<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{ route('admin.index') }} " class="brand-link">
        <img src="{{asset('backend/img/school/schoolicon.png')}}" alt="SSE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tecnológico Delicias</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ empty(Auth::user()->profile_photo_path) 
                ? Auth::user()->profile_photo_url 
                : url("storage/".Auth::user()->profile_photo_path) }}"
                class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.view') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href=" {{ route('admin.index') }} " class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Configuración
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('career.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon ml-3"></i>
                                <p>Carreras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('specialty.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon ml-3"></i>
                                <p>Especialidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon ml-3"></i>
                                <p>Egresados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('graduate.survey.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon ml-3"></i>
                                <p>Egresados encuestas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.config.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon ml-3"></i>
                                <p>Empresas</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Estadísticas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon ml-3"></i>
                                <p class="ml-1">
                                    Egresado
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('survey.one.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.two.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.three.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.four.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.five.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>5. Expéctativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.six.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>6. Participación</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-building nav-icon ml-3"></i>
                                <p class="ml-1">
                                    Empresas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.one.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.two.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.three.statistic.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>3. Competencias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Reportes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon ml-3"></i>
                                <p class="ml-1">
                                    Egresado
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('survey.one.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>1. Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.two.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>2. Pertinencia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.three.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>3. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.four.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>4. Desempeño</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.five.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>5. Expéctativas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.six.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>6. Participación</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.seven.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>7. Comentarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('survey.seven.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>8. Ocho</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-building nav-icon ml-3"></i>
                                <p class="ml-1">
                                    Empresas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.one.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>1. Datos generales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.two.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>2. Ubicación laboral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.survey.three.report.view') }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon ml-3"></i>
                                        <p>3. Competencias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        <a href="{{ route('admin.logout') }}" class="btn btn-link text-light"><i class="fas fa-sign-out-alt"></i></a>
        <a id="help_admin" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>