<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{ route('graduate.index') }} " class="brand-link">
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
                <a href="{{ route('graduate.view') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href=" {{ route('graduate.index') }} " class="nav-link 
                    {!! Request::segment(2) == "index" ? "active" : "" !!}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>
                <li class="nav-item {!! str_contains(request()->route()->getPrefix(), "egresado/encuesta")
                    ? "menu-is-opening menu-open" : "" !!}">
                    <a href="#" class="nav-link 
                    {!! str_contains(request()->route()->getPrefix(), "egresado/encuesta") ? "active" : "" !!}">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Encuestas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('survey.one.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "perfil" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>1. Perfil del Egresado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.two.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "pertinencia" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>2. Pertinencia y Disponibilidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.three.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "ubicacion" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>3. Ubicación Laboral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.four.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "desempeno" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>4. Desempeño Profesional</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.five.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "expectativas" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>5. Expéctativas y actualización</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.six.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "partipacion" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>6. Participación social</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('survey.seven.verified') }}" class="nav-link 
                            {!! Request::segment(3) == "comentarios" ? "active" : "" !!}">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>7. Comentarios y sugerencias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jobs.view') }}" class="nav-link 
                    {!! Request::segment(2) == "trabajo" ? "active" : "" !!}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Ofertas de Trabajo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('graduate.pdf') }}" class="nav-link 
                    {!! Request::segment(2) == "pdf" ? "active" : "" !!}">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>Currículum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('graduate.view') }}" class="nav-link 
                    {!! Request::segment(2) == "perfil" ? "active" : "" !!}">
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
        <a href="{{ route('graduate.logout') }}" class="btn btn-link text-light"><i class="fas fa-sign-out-alt"></i></a>
        <a id="help_student" class="btn btn-secondary hide-on-collapse pos-right">Ayuda</a>
    </div>
</aside>