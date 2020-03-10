<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Reserva LDC</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="/dist/js/adminlte.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="/dist/img/LDCLogo1.png" alt="LDC Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">LDC</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">

                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                                @else

                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                {{ Auth::user()->name }}
                                            </a>

                                @endguest

                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/home" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        <li class="nav-item has-treeview">
                                            <a href="/preparadores"
                                                class="{{ Request::path() === 'preparadores' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>
                                                    Preparadores
                                                    <?php use App\Preparador; $preparadores_count = Preparador::all()->count(); ?>
                                                    <span class="right badge badge-danger">{{ $preparadores_count ?? '0' }}</span>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{route('preparadores.index')}}"
                                                        class="{{ Request::path() === 'perfil/todas' ? 'nav-link active' : 'nav-link' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Perfiles</p>

                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/horarios"
                                                        class="{{ Request::path() === 'perfil/todas' ? 'nav-link active' : 'nav-link' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Horarios</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </li>

                            <li class="nav-item">
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        <li class="nav-item has-treeview">
                                            <a href="{{route('salas.index')}}"
                                                class="{{ Request::path() === 'salas' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>Salas</p>
                                            </a>

                                        </li>
                                    </ul>
                                </nav>
                            </li>

                            <li class="nav-item">
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        <li class="nav-item has-treeview">
                                            <a href="salas"
                                                class="{{ Request::path() === 'salas' ? 'nav-link active' : 'nav-link' }}">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>Reservas</p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{route('reservas.create')}}"
                                                        class="{{ Request::path() === 'salas/todas' ? 'nav-link active' : 'nav-link' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Reservas Sala</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('maq.create')}}"
                                                        class="{{ Request::path() === 'salas/todas' ? 'nav-link active' : 'nav-link' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Reservas Maquinas</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('reservas.index')}}"
                                                        class="{{ Request::path() === 'salas/todas' ? 'nav-link active' : 'nav-link' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Mostrar Reservas</p>

                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </li>





                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>
