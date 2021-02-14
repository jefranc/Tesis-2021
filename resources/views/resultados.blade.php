@extends('base')

@section('title', 'Resultados')

@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>Resultados</h3>
    </div>
</div>
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ciclos
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($ciclo as $cicl)
        <a class="dropdown-item" href="{{ route('resultados.show', $cicl->ciclo)}}">{{ $cicl->ciclo }}</a>
        @endforeach
    </div>
</div>
@if($ci == 1)
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Autoevaluacion</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_panel">
                <div class="">

                    <body>
                        <div class="pull-right">

                        </div>
                        <div style="width:50%;">
                            <canvas id="chartauto"></canvas>
                        </div>

                    </body>
                </div>
            </div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="autoevaluacion" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#pedagogicos1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pedagogicos</a>
                    </li>
                    <li role="presentation" class=""><a href="#didacticas1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Didacticas</a>
                    </li>
                    <li role="presentation" class=""><a href="#tics1" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">TICS</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane active " id="pedagogicos1" aria-labelledby="home-tab">

                        <body>
                            <div style="width:50%;">
                                <canvas id="chartautopeda"></canvas>
                            </div>
                        </body>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="didacticas1" aria-labelledby="profile-tab">

                        <body>
                            <div style="width:50%;">
                                <canvas id="chartautodida"></canvas>
                            </div>
                        </body>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tics1" aria-labelledby="profile-tab">
                        <div>

                            <body>
                                <div style="width:50%;">
                                    <canvas id="chartautotics"></canvas>
                                </div>
                            </body>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>CoEvaluacion</h2>
                <div class="clearfix"></div>
            </div>
            <div class="">
                <div class="">

                    <body>
                        <div style="width:50%;">
                            <canvas id="chartcoe"></canvas>
                        </div>
                    </body>
                </div>
            </div>
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="autoevaluacion" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#pedagogicos2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pedagogicos</a>
                    </li>
                    <li role="presentation" class=""><a href="#didacticas2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Didacticas</a>
                    </li>
                    <li role="presentation" class=""><a href="#tics2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">TICS</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane active " id="pedagogicos2" aria-labelledby="home-tab">

                        <body>
                            <div style="width:50%;">
                                <canvas id="chartcoepeda"></canvas>
                            </div>
                        </body>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="didacticas2" aria-labelledby="profile-tab">

                        <body>
                            <div style="width:50%;">
                                <canvas id="chartcoedida"></canvas>
                            </div>
                        </body>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tics2" aria-labelledby="profile-tab">

                        <body>
                            <div style="width:50%;">
                                <canvas id="chartcoetics"></canvas>
                            </div>
                        </body>
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript">
    //GRAFICA TOTAL DE AUTOEVALUACION
    var tics = "<?php echo $resultado_auto_tic; ?>";
    var peda = "<?php echo $resultado_auto_peda; ?>";
    var dida = "<?php echo $resultado_auto_dida; ?>";
    var ctx = document.getElementById("chartauto");
    var chartauto = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['TICS', 'PEDAGOGICOS', 'DIDACTICAS'],
            datasets: [{
                label: '# of Votes',
                data: [tics, peda, dida],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Resultados Autoevaluacion Docente'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA TOTAL DE COEVALUACION
    var tics = "<?php echo $resultado_coe_tic; ?>";
    var peda = "<?php echo $resultado_coe_peda; ?>";
    var dida = "<?php echo $resultado_coe_dida; ?>";
    var ctx = document.getElementById("chartcoe");
    var chartcoe = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['TICS', 'PEDAGOGICOS', 'DIDACTICAS'],
            datasets: [{
                label: '# of Votes',
                data: [tics, peda, dida],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Resultados CoEvaluacion Docente'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO AUTOEVALUACION-PEDAGOGIA
    var peda = <?php echo json_encode($pedagogico); ?>;
    var pregunta = <?php echo json_encode($pregunta_peda); ?>;
    console.log(peda);
    var ctx = document.getElementById("chartautopeda");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas Pedagogicas',
                data: peda,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO AUTOEVALUACION-DIDACTICA
    var dida = <?php echo json_encode($didactica); ?>;
    var pregunta = <?php echo json_encode($pregunta_dida); ?>;
    console.log(dida);
    var ctx = document.getElementById("chartautodida");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas Didacticas',
                data: dida,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO AUTOEVALUACION-TICS
    var tics = <?php echo json_encode($tics); ?>;
    var pregunta = <?php echo json_encode($pregunta_tics); ?>;
    console.log(tics);
    var ctx = document.getElementById("chartautotics");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas TICS',
                data: tics,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO COEVALUACION-PEDAGOGIA
    var peda = <?php echo json_encode($pedagogico_coe); ?>;
    var pregunta = <?php echo json_encode($pregunta_peda_coe); ?>;
    console.log(peda);
    var ctx = document.getElementById("chartcoepeda");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas Pedagogicas',
                data: peda,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO COEVALUACION-DIDACTICA
    var dida = <?php echo json_encode($didactica_coe); ?>;
    var pregunta = <?php echo json_encode($pregunta_dida_coe); ?>;
    console.log(dida);
    var ctx = document.getElementById("chartcoedida");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas Didacticas',
                data: dida,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    //GRAFICA SOLO COEVALUACION-TICS
    var tics = <?php echo json_encode($tics_coe); ?>;
    var pregunta = <?php echo json_encode($pregunta_tics_coe); ?>;
    console.log(tics);
    var ctx = document.getElementById("chartcoetics");
    var chartcoe = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pregunta,
            datasets: [{
                label: 'Respuestas TICS',
                data: tics,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection