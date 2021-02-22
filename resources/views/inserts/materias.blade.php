@extends('base')

@section('title', 'Manejo de Informacion')

@section('content')
<div class="x_panel">
    <div class="col-md-6 col-sm-6">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class=""></i>Ciclos</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="x-panel">
                    <h4>Ciclo Activo: {{ $ciclo_actual }}</h4>
                    <div class="pull-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ciclo_actu">
                            Asignar ciclo actual
                        </button>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ciclos">
                        Agregar un nuevo ciclo
                    </button>
                </div>
                <div class="table" style="width:50%">
                    <table class="table table-bordered" id="areas">
                        <thead>
                            <tr class="bg-info">
                                <th scope="col">Tabla de Ciclos</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ciclos as $ciclo)
                            <tr>
                                <td>{{ $ciclo->ciclo }}</td>
                                <td><button class="btnciclo btn-outline-danger" data-id="{{ $ciclo->ciclo }}">Eliminar</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class=""></i>Areas del Conocimiento</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#area_conocimiento">
                    Agregar una nueva aréa
                </button>
                <div class="form-group">
                    <input type="text" class="form-control" style="width:70%" id="search_area" placeholder="Buscar...">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="areas">
                        <thead>
                            <tr class="bg-info">
                                <th scope="col">#</th>
                                <th scope="col">Areas del conocimiento disponibles</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tipo = 'eliminar_area';
                            $num = 1;
                            ?>
                            <form action="{{ route('materias.update',$tipo) }}" method="POST">
                                @csrf
                                @method('put')
                                @foreach($areas as $areas1)
                                <tr>
                                    <th scope="row">{{ $num }}</th>
                                    <td>{{ $areas1->area }}</td>
                                    <td><button class="btnarea btn-outline-danger" data-id="{{ $areas1->area }}">Eliminar</button></td>
                                </tr>
                                <?php
                                $num = $num + 1;
                                ?>
                                @endforeach
                                <input type="hidden" name="areain" id="areain" value="" />
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                <form action="{{ route('materias.update',$tipo) }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-danger">Limpiar tablas temporales para nuevo ciclo</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6  ">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class=""></i>Materias</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#materia">
                    Agregar una nueva materia
                </button>
                <div class="form-group">
                    <input type="text" class="form-control" style="width:50%" id="search_mate" placeholder="Buscar...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="materias">
                        <thead>
                            <tr class="bg-info">
                                <th scope="col">#</th>
                                <th scope="col">Materias disponibles</th>
                                <th scope="col">Aréa del Conocimiento</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tipo = 'eliminar_mate';
                            $num = 1;
                            ?>
                            <form action="{{ route('materias.update',$tipo) }}" method="POST">
                                @csrf
                                @method('put')
                                @foreach($materias as $materias1)
                                <tr>
                                    <th scope="row">{{ $num }}</th>
                                    <td>{{ $materias1->materia }}</td>
                                    <td>{{ $materias1->area }}</td>
                                    <td><button class="btnmate btn-outline-danger" data-id="{{ $materias1->materia }}">Eliminar</button></td>
                                </tr>
                                <?php
                                $num = $num + 1;
                                ?>
                                @endforeach
                                <input type="hidden" name="matein" id="matein" value="" />
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Area de Conocimiento -->
<div class="modal fade" id="area_conocimiento" tabindex="-1" role="dialog" aria-labelledby="area_conocimientoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="area_conocimientoLabel">Agregar una nueva aréa de conocimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $tipo = 'agregar_area';
            ?>
            <form action="{{ route('materias.update', $tipo) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="area" placeholder="Ingrese un area de conocimiento" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Materias-->
<div class="modal fade" id="materia" tabindex="-1" role="dialog" aria-labelledby="materiaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="materiaLabel">Agregar una nueva materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $tipo = 'agregar_materia';
            ?>
            <form action="{{ route('materias.update', $tipo) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="mate" placeholder="Ingrese una materia" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Area de Conocimiento</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="area" required>
                            @foreach($areas as $area)
                            <option value="{{ $area->area }}">{{ $area->area }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ciclos -->
<div class="modal fade" id="ciclos" tabindex="-1" role="dialog" aria-labelledby="ciclosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ciclosLabel">Agregar un nuevo ciclo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $tipo = 'nuevo_ciclo';
            ?>
            <form action="{{ route('materias.update',$tipo) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ci" placeholder="Ingrese un ciclo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ciclos actual-->
<div class="modal fade" id="ciclo_actu" tabindex="-1" role="dialog" aria-labelledby="ciclo_actuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ciclo_actuLabel">Agregar un nuevo ciclo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $tipo = 'ciclo_actual';
            ?>
            <form action="{{ route('materias.update',$tipo) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Ciclos Disponibles</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="cic" required>
                            @foreach($ciclos as $ciclo)
                            <option value="{{ $ciclo->ciclo }}">{{ $ciclo->ciclo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
        $("#search_area").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#areas tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
    $("#search_mate").keyup(function() {
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#materias tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });
    $('.btnarea').on('click', function() {
        var area = $(this).attr("data-id");
        console.log(area);
        document.getElementById("areain").value = area;
    });
    $('.btnmate').on('click', function() {
        var mate = $(this).attr("data-id");
        console.log(mate);
        document.getElementById("matein").value = mate;
    });
</script>
@endsection