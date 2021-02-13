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
                <h2>AUTOEVALUACION</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_panel">
                <div class="">
                    <p>{{ $resultado_auto_peda }}</p>
                    <p>{{ $resultado_auto_dida }}</p>
                    <p>{{ $resultado_auto_tic }}</p>
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
                        {{ $resultado_auto_peda }}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="didacticas1" aria-labelledby="profile-tab">
                        {{ $resultado_auto_dida }}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tics1" aria-labelledby="profile-tab">
                        <div>
                            {{ $resultado_auto_tic }}
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
                <div class="clearfix"></div>
            </div>
            <div class="">
                <div class="">
                    <p>{{ $resultado_coe_peda }}</p>
                    <p>{{ $resultado_coe_dida }}</p>
                    <p>{{ $resultado_coe_tic }}</p>
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
                        {{ $resultado_coe_peda }}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="didacticas2" aria-labelledby="profile-tab">
                        {{ $resultado_coe_dida }}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tics2" aria-labelledby="profile-tab">
                        {{ $resultado_coe_tic }}
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