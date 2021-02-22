<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu bg-primary">
    <div class="menu_section bg-info">
        </br>
        <h3>General</h3>
        <ul class="nav side-menu">
            @can('evaluar')
            <li><a> Evaluaciones <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('autoevaluacion.index')}}">Autoevaluacion</a></li>
                </ul>
            </li>
            @endcan
            @can('coevaluar')
            <li><a href="{{route('coevaluacion_lista.index')}}"> Co-Evaluación-Lista de Docentes</a></li>
            @endcan
            @can('resultados')
            <li><a> Resultados <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('misresultados')
                    <li><a href="{{ route('resultados.index') }}"> Mis Resultados</a></li>
                    @endcan
                    @can('todosresultados')
                    <li><a href="{{ route('resultados_todos.index') }}"> Resultados de los Docentes</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('ver_docentes')
            <li><a href="{{route('docentes')}}"> Lista de Docentes</a></li>
            @endcan
            @can('dar_permisos')
            <li><a href="{{route('docentes')}}"> Lista de Docentes</a></li>
            @endcan
            
            @can('areas')
            <li><a href="{{route('asignacion_coevaluador.index')}}"> Asignacion de Docentes</a></li>
            @endcan
            @can('areas')
            <li><a href="{{route('materias.index')}}"> Manejo de Información</a></li>
            @endcan
            <li><a href="{{route('recomendaciones')}}"> Recomendaciones </a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->