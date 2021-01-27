@extends('base')

@section('title', 'Evaluacion')

@section('content')
<header class="title">
    <div class="col-title">
        <h1>
            <center> AUTOEVALUACION DOCENTE
        </h1>
    </div>
</header>
@csrf
<input id="idusuario" value="{{ $id }}" type="hidden">
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
<section class="last">
    <fieldset class="required">
        <h2>
            <div class="title-part">
                <span class="number">1
                </span>¿Pregunta 1?
            </div>
        </h2>
        <div class="special-padding-row">
            <div class="label-cont">
                <label class="input-group input-group-radio row ">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta1" value="1" />
                    <span class="input-group-title">&nbsp; 1</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta1" value="2" />
                    <span class="input-group-title">&nbsp; 2</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta1" value="3" />
                    <span class="input-group-title">&nbsp; 3</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta1" value="4" />
                    <span class="input-group-title">&nbsp; 4</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta1" value="5" />
                    <span class="input-group-title">&nbsp; 5</span>
                </label>
            </div>
        </div>
    </fieldset>
    <span class="section"></span>

    <fieldset class="required">
        <h2>
            <div class="title-part">
                <span class="number">2
                </span>¿Pregunta 2?
            </div>
        </h2>
        <div class="special-padding-row">
            <div class="label-cont">
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta2" value="1" />
                    <span class="input-group-title">&nbsp; 1</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta2" value="2" />
                    <span class="input-group-title">&nbsp; 2</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta2" value="3" />
                    <span class="input-group-title">&nbsp; 3</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta2" value="4" />
                    <span class="input-group-title">&nbsp; 4</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta2" value="5" />
                    <span class="input-group-title">&nbsp; 5</span>
                </label>
            </div>
        </div>
    </fieldset>
    <span class="section"></span>

    <fieldset class="required">
        <h2>
            <div class="title-part">
                <span class="number">3
                </span>¿Pregunta 3?
            </div>
        </h2>
        <div class="special-padding-row">
            <div class="label-cont">
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta3" value="1" />
                    <span class="input-group-title">&nbsp; 1</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta3" value="2" />
                    <span class="input-group-title">&nbsp; 2</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta3" value="3" />
                    <span class="input-group-title">&nbsp; 3</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta3" value="4" />
                    <span class="input-group-title">&nbsp; 4</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta3" value="5" />
                    <span class="input-group-title">&nbsp; 5</span>
                </label>
            </div>
        </div>
    </fieldset>
    <span class="section"></span>

    <fieldset class="required">
        <h2>
            <div class="title-part">
                <span class="number">4
                </span>¿Pregunta 4?
            </div>
        </h2>
        <div class="special-padding-row">
            <div class="label-cont">
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta4" value="1" />
                    <span class="input-group-title">&nbsp; 1</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta4" value="2" />
                    <span class="input-group-title">&nbsp; 2</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta4" value="3" />
                    <span class="input-group-title">&nbsp; 3</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta4" value="4" />
                    <span class="input-group-title">&nbsp; 4</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta4" value="5" />
                    <span class="input-group-title">&nbsp; 5</span>
                </label>
            </div>
        </div>
    </fieldset>
    <span class="section"></span>

    <fieldset class="required">
        <h2>
            <div class="title-part">
                <span class="number">5
                </span>¿Pregunta 5?
            </div>
        </h2>
        <div class="special-padding-row">
            <div class="label-cont">
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta5" value="1" />
                    <span class="input-group-title">&nbsp; 1</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta5" value="2" />
                    <span class="input-group-title">&nbsp; 2</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta5" value="3" />
                    <span class="input-group-title">&nbsp; 3</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta5" value="4" />
                    <span class="input-group-title">&nbsp; 4</span>
                </label>
                <label class="input-group input-group-radio row">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="radio" class="hidden-inputs" name="pregunta5" value="5" />
                    <span class="input-group-title">&nbsp; 5</span>
                </label>
            </div>
        </div>
    </fieldset>
    <span class="section"></span>
</section>
<div class="">
    <button onclick="guardar()" class="btn btn-primary" style="float: right">Guardar</button>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {});

    function guardar() {
        var btnguardar = $("#idusuario").val();
        var preguntas = $("input[name=pregunta1]:checked").val();
        console.log(preguntas);
        $.ajax({
            url: 'autoevaluacion/'+btnguardar,
            type: 'PUT',
            data: { 
                "_token": "{{ csrf_token() }}",
                preguntas: [
                    pregunta1
                ]
            },

            success: function(respuesta) {
                console.log(respuesta);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    }
</script>
@endsection