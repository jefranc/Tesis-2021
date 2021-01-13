<!DOCTYPE html>
<html lang="en">
@include('template.head')

<body class="nav-md">
    <div class="container body">
        <div class="main_container bg-primary">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view bg-primary">
                    <div class="navbar nav_title bg-primary" style="border: 0;">
                        <a href="{{route('index')}}" class="site_title"></i> <span>Evaluacion Docente</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu perfil quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src={{ URL::asset ($imagen) }} alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido</span>
                            <h2>{{ $name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <!-- sidebar menu -->
                    @include('template.sidebar')
                    <!-- /sidebar menu -->

                    <!-- /menu Pie de Pagina -->
                    <div class="sidebar-footer hidden-small bg-primary">
                        <a data-toggle="tooltip" data-placement="top" title="Editar Perfil" href="{{route('editar_perfil.index')}}">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Salir" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <!-- /menu Pie de Pagina -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ $imagen }}" alt="">{{ $name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('editar_perfil.index')}}">Editar Perfil
                                    </a>
                                    <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>

            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Todos los derechos reservados
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- script -->

    @include('template.scripts')

    <!-- /script -->

</body>



</html>