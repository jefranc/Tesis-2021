@extends('base')
@section('title', 'Evaluacion')
@section('content')

@if($comprobacion == null)
<header class="title">
    <div class="col-title">
        <h1>
            <center> COEVALUACION DOCENTE
        </h1>
        <h4>
            <center>Ciclo: {{ $ciclo }}
        </h4>
    </div>
</header>

<body>
    <?php
    $tipo = 'coe';
    ?>
    <form id="a" name="formulario" action="{{ route('coevaluacion.update', $tipo) }}" class="form-label-left input_mask" method="POST">
        @csrf
        @method('put')


        <section class="intro first">
            </br>
            <p>&nbsp;&nbsp;Buenos días,</p>
            <p>&nbsp;&nbsp;Por favor, dedique unos minutos de su tiempo para rellenar el siguiente cuestionario.</p>
        </section>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect02">Area de Conocimiento</label>
            <select name="area" class="form-select" id="inputGroupSelect02">
                <option selected></option>
                @foreach($areas as $area)
                <option name="{{ $area->area }}" value="{{ $area->area }}">{{ $area->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Materias</label>
            <select name="materia" class="form-select" id="inputGroupSelect01" required>
                <option selected></option>
                @foreach($materias as $materia)
                <option name="{{ $materia->materia }}" value="{{ $materia->materia }}">{{ $materia->materia }}</option>
                @endforeach
            </select>
        </div>

        <section class="intro first">
            <H2>
                <center> Tabla de Valoración
            </H2>
        </section>
        <div class=" ">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">No cumple: 1</th>
                        <th class="column-title">En proceso: 2</th>
                        <th class="column-title">Satisfactorio: 3</th>
                        <th class="column-title">Destacado: 1</th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php
        $cont = 1;
        $radio = 1;
        ?>
        <table class="table table-bordered ">
            <tbody>
                <colgroup>
                    <colgroup span="1"></colgroup>
                <tr class="table-active" style="text-align:center;">
                    <th rowspan="2">
                        <h3>INDICADORES</h3>
                    </th>
                    <th colspan="4">OPCIONES</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>

                <tr>
                    <td colspan="5">
                        <h5><center>Pedagógica</h5>
                    </td>
                </tr>
                @foreach ($preguntas_peda as $preguntas_ped)
                <tr>
                    <td max-width: 100%> {{ $cont }}:) {{ $preguntas_ped->titulo }} </td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_ped->id }}" value="1" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_ped->id }}" value="2" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_ped->id }}" value="3" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_ped->id }}" value="4" required /></td>
                </tr>
                <?php
                $cont = $cont + 1;
                $radio = $radio + 1;
                ?>
                @endforeach

                <tr>
                    <td colspan="5">
                        <h5><center>Didáctica</h5>
                    </td>
                </tr>
                @foreach ($preguntas_dida as $preguntas_did)
                <tr>
                    <td max-width: 100%> {{ $cont }}:) {{ $preguntas_did->titulo }} </td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_did->id }}" value="1" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_did->id }}" value="2" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_did->id }}" value="3" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_did->id }}" value="4" required /></td>
                </tr>
                <?php
                $cont = $cont + 1;
                $radio = $radio + 1;
                ?>
                @endforeach

                <tr>
                    <td colspan="5">
                        <h5><center>TICS</h5>
                    </td>
                </tr>
                @foreach ($preguntas_tics as $preguntas_tic)
                <tr>
                    <td max-width: 100%> {{ $cont }}:) {{ $preguntas_tic->titulo }} </td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_tic->id }}" value="1" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_tic->id }}" value="2" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_tic->id }}" value="3" required /></td>
                    <td> <input id="{{ $radio }}" type="radio" class="hidden-inputs" name="{{ $preguntas_tic->id }}" value="4" required /></td>
                </tr>
                <?php
                $cont = $cont + 1;
                $radio = $radio + 1;
                ?>
                @endforeach

                

                
            </tbody>
        </table>
        <div class="input-group input-group-lg">
            <h2>Observaciones:</h2>
            <div class="input-group input-group-lg">
                <textarea name="observaciones" rows="5" cols="40" placeholder="Escriba sus observaciones aqui..."></textarea>
            </div>
        </div>
        <input type="hidden" name="cedula" id="cedula" value="{{ $cedula }}" />
        <button class="btn btn-info" id="boton" style="float: right">Guardar</button>
    </form>
</body>
@else
<div class="x_panel">
    <div class="x_title">
        <h3>Ya has realizado esta evaluación</h3>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
    $('.btnmate').on('click', function() {
        var mate = $(this).attr("data-id");
        console.log(mate);
        document.getElementById("mate").value = mate;
    });
</script>
@endsection