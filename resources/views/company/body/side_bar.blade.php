<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{ route('company.index') }} " class="brand-link">
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
                <a href="{{ route('company.view') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('company.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Encuestas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('survey.one.company.verified') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>1. Datos generales de la empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.two.company.verified') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>2. Ubicación Laboral del Egresado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.three.company.verified') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>3. Competencias Laborales</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Empleos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('company.jobs.view') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Lista Empleos</p><br>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.jobs.postulate') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Ver postulados</p><br>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.view') }}" class="nav-link">
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
        <a href="{{ route('company.logout') }}" class="btn btn-link text-light"><i class="fas fa-sign-out-alt"></i></a>
        <a id="help_company" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>