@extends('base')

@section('title', 'Evaluacion')

@section('content')
@if($auto == 0)
<div class="">
    <header class="title">
        <div class="col-title">
            <h1>
                <center> AUTOEVALUACION DOCENTE
            </h1>
        </div>
    </header>

    <body>
        <form id="a" action="{{ route('autoevaluacion.update', $cedula) }}" class="form-label-left input_mask" method="POST">
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
                <input type="hidden" name="cedula" id="cedula" value="{{ $cedula }}" />
                <button class="btn btn-info" style="float: right">Guardar</button>
            </section>
        </form>
    </body>
</div>
@endif
@if($auto == 1)
<div class="x_panel">
    <div class="x_title">
        <h3>Ya has Realizado la Autoevaluacion</h3>
    </div>
</div>
@endif



@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
@endsection