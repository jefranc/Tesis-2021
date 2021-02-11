@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="form-group">
    <input type="text" class="form-control pull-right" style="width:20%" id="search" placeholder="Buscar Docente...">
</div>
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action" id="mytable">
        <thead>
            <tr class="headings">
                <th class="column-title">Apellido</th>
                <th class="column-title">Nombre</th>
                <th class="column-title">Cedula</th>
                <th class="column-title">Correo Institucional</th>
                <th class="column-title no-link last"><span class="nobr">Acciones</span>
                </th>
                <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docentes as $docentes)
            <tr class="even pointer">
                <td class=" ">{{ $docentes->apellido }}</td>
                <td class=" ">{{ $docentes->name }}</td>
                <td class=" ">{{ $docentes->cedula }}</td>
                <td class=" ">{{ $docentes->email }}</td>
                <td class=" last">
                    <button type="button" class="btncedula btn btn-primary" data-id="{{ $docentes->cedula }}" data-toggle="modal" data-target="#exampleModalCenter">
                        Modificar
                    </button>
                    <!-- Modal -->
                    <form method="POST" action="{{ route('permisos.update', $id) }}">
                        @csrf
                        @method('put')
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Inicio del Contenido-->
                                    <div class="modal-body">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Lista de Permisos </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="">
                                                    <ul class="to_do">
                                                        <li>
                                                            <p>
                                                                <input id="rol" type="radio" name="rol" class="flat" value="Administador"> Administrador
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <input id="rol" type="radio" name="rol" class="flat" value="Director"> Director
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <input id="rol" type="radio" name="rol" class="flat" value="CoEvaluador"> CoEvaluador
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <input id="rol" type="radio" name="rol" class="flat" value="Docente"> Docente
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-info">Guardar Cambios</button>
                                        <input type="hidden" name="cedula" id="cedula" value="{{ $docentes->cedula }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
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
    $('.btncedula').on('click', function() {
        var cedu = $(this).attr("data-id");
        console.log(cedu);
        document.getElementById("cedula").value = cedu;
    });
</script>
@endsection