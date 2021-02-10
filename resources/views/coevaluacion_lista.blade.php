@extends('base')

@section('title', 'Coevaluacion')

@section('content')

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ciclos
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if($ciclo != null)
        @foreach ($ciclo as $ciclo)
        <a class="dropdown-item" href="{{route('coevaluacion_lista.show', $id)}}">{{ $ciclo->ciclo }}</a>
        @endforeach
        @endif
    </div>
</div>
@if($ciclo != null)
@if($ciclo->ciclo_actual == $ci)
<div class="form-group">
    <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="Buscar Docente...">
</div>
<div role="tabpanel" id="tabla" class="table-responsive">

    <table class="table table-striped jambo_table bulk_action" id="mytable">
        <thead>
            <tr class="headings">
                <th class="column-title">Apellidos</th>
                <th class="column-title">Nombre</th>
                <th class="column-title">Cedula</th>
                <th class="column-title">Correo Institucional</th>
                <th class="column-title">Status</th>
                <th class="column-title no-link last"><span class="nobr">Acciones</span>
                </th>
                <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $tipo='mostrar';
        ?>
            <form action="{{ route('coevaluacion.update', $tipo) }}" method="POST">
                @csrf
                @method('put')
                @foreach ($docentes as $docentes)
                <tr class="even pointer">
                    <td class=" ">{{ $docentes->apellido }}</td>
                    <td class=" ">{{ $docentes->name }}</td>
                    <td class=" ">{{ $docentes->cedula }} </td>
                    <td class=" ">{{ $docentes->email }}</td>
                    <?php
                    $ced = $docentes->cedula;
                    ?>
                    @if($docentes->status==1)
                    <td class=" ">Ya Evaluado</td>
                    <td class=" last">
                    <button class="btncedula btn btn-info" disabled="false" data-id="{{ $docentes->cedula }}" value="Evaluar">Evaluar</button>
                    </td>
                    @else
                    <td class=" ">Por Evaluar</td>
                    <td class=" ">                    
                        <button  class="btncedula btn btn-info" data-id="{{ $docentes->cedula }}" value="Evaluar">Evaluar</button>                        
                    </td>

                    @endif
                </tr>
                @endforeach
                <input type="hidden" name="ciclo" id="ciclo" value="{{ $ciclo->ciclo }}">
                <input type="hidden" name="cedula" id="cedula" value="{{ $docentes->cedula }}" />
        </tbody>
    </table>
</div>
@endif
@endif
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
        $("#search").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#mytable tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
    $('.btncedula').on('click', function() {
        var cedu = $(this).attr("data-id");
        console.log(cedu);
        document.getElementById("cedula").value = cedu;
    });
</script>
@endsection