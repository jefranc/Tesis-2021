@extends('base')

@section('title', 'Coevaluacion')

@section('content')
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ciclos
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($ciclo as $ciclo)
        <a class="dropdown-item" href="{{route('coevaluacion_lista.show', $id)}}">{{ $ciclo->ciclo }}</a>
        @endforeach
    </div>
</div>
@if($ciclo->ciclo_actual == $ci)
<div role="tabpanel" id="tabla" class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
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
                    <button id="" type="button" disabled="false" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Evaluar</button>
                </td>
                @else
                <td class=" ">Por Evaluar</td>
                <td class=" ">
                    <button class="btncedula btn btn-info" data-id="{{ $docentes->cedula }}" data-toggle="modal" data-target=".bd-example-modal-lg">Evaluar</button>
                </td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
<!-- Large modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <header class="title">
                <div class="col-title">
                    <h1>
                        <center> COEVALUACION DOCENTE
                    </h1>
                </div>
            </header>

            <body>
                <form id="a" action="{{ route('coevaluacion_lista.update', $id) }}" class="form-label-left input_mask" method="POST">
                    @csrf
                    @method('put')

                    <section class="intro first">
                        <p>Buenos días,</p>
                        <p>por favor, dedique unos minutos de su tiempo para rellenar el siguiente cuestionario.</p>
                    </section>
                    <section class="intro first">
                        <H2>
                            <center> Tabla de Valoracion
                        </H2>
                    </section>
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Total desacuerdo: 1</th>
                                <th class="column-title">Desacuerdo: 2</th>
                                <th class="column-title">Medianamente de acuerdo: 3</th>
                                <th class="column-title">Acuerdo: 4</th>
                                <th class="column-title">Total de acuerdo: 5</th>
                            </tr>
                        </thead>
                    </table>
                    <?php
                    $cont = 1;
                    $radio = 1;
                    ?>
                    <section class="last">
                        @foreach ($preguntas as $preguntas)
                        <fieldset class="required">
                            <h2>
                                <div class="title-part">
                                    <span class="number">{{ $cont }}
                                    </span>{{ $preguntas->titulo }}
                                </div>
                            </h2>
                            <div class="special-padding-row">
                                <div class="label-cont">
                                    <label class="input-group input-group-radio row ">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas->id }}" value="1" />
                                        <span class="input-group-title">&nbsp; 1</span>
                                    </label>
                                    <label class="input-group input-group-radio row">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas->id }}" value="2" />
                                        <span class="input-group-title">&nbsp; 2</span>
                                    </label>
                                    <label class="input-group input-group-radio row">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas->id }}" value="3" />
                                        <span class="input-group-title">&nbsp; 3</span>
                                    </label>
                                    <label class="input-group input-group-radio row">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas->id }}" value="4" />
                                        <span class="input-group-title">&nbsp; 4</span>
                                    </label>
                                    <label class="input-group input-group-radio row">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas->id }}" value="5" />
                                        <span class="input-group-title">&nbsp; 5</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <span class="section"></span>
                        <?php
                        $cont = $cont + 1;
                        $radio = $radio + 1;
                        ?>
                        @endforeach
                        <input type="hidden" name="cedula" id="cedula" />
                        <button class="btn btn-info" style="float: right">Guardar</button>
                    </section>
                </form>
            </body>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
    $('.btncedula').on('click', function() {
        var cedu = $(this).attr("data-id");
        console.log(cedu);
        document.getElementById("cedula").value = cedu;
    });
</script>
@endsection