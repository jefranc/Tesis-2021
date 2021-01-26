<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu bg-primary">
    <div class="menu_section bg-primary">
        </br>
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a> Evaluaciones <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('evaluacion1')}}">Evaluacion 1</a></li>
                    <li><a href="{{route('evaluacion2')}}">Evaluacion 2</a></li>
                    <li><a href="index2.html">Dashboard2</a></li>
                    <li><a href="index3.html">Dashboard3</a></li>
                </ul>
            </li>
            @can('coevaluar')
                <li><a href="{{route('coevaluacion_lista')}}"> Co-Evaluacion-Lista de Docentes</a></li>
            @endcan
            <li><a href=''> Resultado de Evaluaciones</a></li>
            @can('ver_docentes')
                <li><a href="{{route('docentes')}}"> Lista de Docentes</a></li>
            @endcan
            <li><a href=''> Recomendaciones </a></li>
            @can('dar_permisos')
                <li><a href="{{ route('permisos.index') }}"> Administracion de Permisos</a></li>
            @endcan
        </ul>
    </div>
</div>
<!-- /sidebar menu -->