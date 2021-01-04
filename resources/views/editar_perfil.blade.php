
@extends('base')

@section('title', 'Editar Perfil')

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil de Usuario</h3>
        </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del Usuario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <img class="img-responsive avatar-view" src={{ $imagen }} alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3>{{ $name }}</h3>
                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-id-card-o"></i> {{ $cedula }}
                            </li>
                            <li><i class="fa fa-envelope"></i> {{ $email }}
                            </li>
                        </ul> 
                    </div>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="profile_title">
                            <div class="col-md-6">
                                <a class="btn btn-success" href="{{route('evaluacion1')}}"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>                            </div>
                            <div class="col-md-6">
                                <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>{{
                                            $fechaActual
                                        }}
                                    </span> <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
@endsection