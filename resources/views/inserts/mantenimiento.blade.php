@extends('base')

@section('title', 'Manejo de Informacion')

@section('content')
<div class="x_panel">
    <div class="col-md-6 col-sm-6">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class=""></i>Limpiar tablas</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                $tipo = 'limpiar_base';
                ?>
                <form action="{{ route('mantenimiento.update',$tipo) }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-danger">Limpiar tablas temporales para nuevo ciclo</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
ciclo_eliminar
@endsection