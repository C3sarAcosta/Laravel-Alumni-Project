<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{ route('student.index', $user_id_encrypt) }} " class="brand-link">
        <img src="{{asset('backend/img/school/schoolicon.png')}}" alt="SSE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tecnológico Delicias</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ empty(Auth::user()->profile_photo_path) ? Auth::user()->profile_photo_url : url("storage/".Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('student.view') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href=" {{ route('student.index', $user_id_encrypt) }} " class="nav-link">
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
                            <a href="{{ route('survey.one.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>1. Perfil del Egresado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.two.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>2. Pertinencia y Disponibilidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.three.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>3. Ubicación Laboral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.four.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>4. Desempeño Profesional</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.five.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>5. Expéctativas y actualización</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.six.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>6. Participación social</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.seven.verified', $user_id_encrypt) }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>7. Comentarios y sugerencias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.seven.index') }}" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>8. Ocho</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jobs.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Ofertas de Trabajo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.view') }}" class="nav-link">
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
        <a href="{{ route('student.logout') }}" class="btn btn-link text-light"><i class="fas fa-sign-out-alt"></i></a>
        <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>