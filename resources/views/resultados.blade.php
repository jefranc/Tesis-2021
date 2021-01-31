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
        @foreach ($ciclo as $ciclo)
        <a class="dropdown-item" href="{{route('resultados.show', $ciclo->ciclo)}}">{{ $ciclo->ciclo }}</a>
        @endforeach
    </div>
</div>
@if($ci == 1)
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>AUTOEVALUACION</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="title_right fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="">
                @foreach($res as $res)
                    {{ $res->pregunta_id }} - {{ $res->resultado }}</br>
                    {{ $res->ciclo }} </br>
                @endforeach
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-9 ">
                    <div id="graph_bar" style="width:100%; height:280px;"></div>

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
                                <ul class="messages">
                                    <li>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="didacticas1" aria-labelledby="profile-tab">
                                SS
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tics1" aria-labelledby="profile-tab">
                                <p>AAA </p>
                            </div>
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
                <h2>COEVALUACION</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="title_right fa fa-chevron-up"></i></a>
                    </li>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-9 ">

                    <div id="graph_bar" style="width:100%; height:280px;"></div>

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

                                <ul class="messages">
                                    <li>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="didacticas2" aria-labelledby="profile-tab">
                                SS
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tics2" aria-labelledby="profile-tab">
                                <p>AAA </p>
                            </div>
                        </div>
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
@endsection