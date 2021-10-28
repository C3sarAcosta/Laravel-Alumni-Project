<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('student.index', $user_id_encrypt) }}" class="nav-link">Tablero</a>
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