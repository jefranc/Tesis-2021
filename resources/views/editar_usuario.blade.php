@extends('base')

@section('title', 'Editar Perfil')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil Docente</h3>
        </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Docente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <div class="col-md-9 col-sm-9 ">
                        <div class="profile_title">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="autoevaluacion" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#informacion_perfil" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Informacion de Perfil</a>
                                    </li>
                                    @if($roles == 'CoEvaluador')
                                    <li role="presentation" class=""><a href="#area_conocimiento" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Area de Conocimiento</a>
                                    </li>
                                    @endif
                                    <li role="presentation" class=""><a href="#materias" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Materias</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="informacion_perfil" aria-labelledby="home-tab">
                                        <div class="x_content">
                                            <div class="profile_img">
                                                <div id="crop-avatar">
                                                    <img class="img-responsive avatar-view" src={{ $usuario1->imagen }} alt="Avatar" title="Change the avatar">
                                                </div>
                                            </div>
                                            <h3>{{ $usuario1->name }} {{ $usuario1->apellido }}</h3>
                                            <ul class="list-unstyled user_data">
                                                <li><i class="fa fa-id-card-o"></i> {{ $usuario1->cedula }}
                                                </li>
                                                <li><i class="fa fa-envelope"></i> {{ $usuario1->email }}
                                                </li>
                                                <li><i class="fa fa-font-awesome"></i> {{ $roles }}
                                                </li>
                                            </ul>
                                            @can('dar_permisos')
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Editar Información de Perfil
                                            </button>
                                            @endcan
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="area_conocimiento" aria-labelledby="profile-tab">
                                        <?php
                                        $tipo2 = 'area';
                                        ?>
                                        <form method="POST" action="{{ route('editar_usuario.update', $tipo2) }}">
                                            @csrf
                                            @method('put')
                                            <div class="x_content">
                                                <div class="">
                                                    <ul class="to_do">
                                                    @foreach($areas as $area)
                                                            @if($areacount >=1 )
                                                                @foreach($areas_user as $areas_use)
                                                                    @if($area->id == $areas_use->area_conocimiento_id )
                                                                        <input type="checkbox" name="areas[]" class="flat" value="{{ $area->area}}" checked> {{ $area->area }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                @if($area->id != $areas_use->area_conocimiento_id )
                                                                    <input type="checkbox" name="areas[]" class="flat" value="{{ $area->area }}"> {{ $area->area }}
                                                                @endif
                                                            @else
                                                                    <input type="checkbox" name="areas[]" class="flat" value="{{ $area->area }}"> {{ $area->area }}
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <input type="hidden" name="cedula" id="cedula" value="{{ $usuario1->cedula }}" />
                                                    <button type="submit" class="btn btn-primary" style="float: right">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="materias" aria-labelledby="profile-tab">
                                        <?php
                                        $tipo3 = 'materia';
                                        ?>
                                        <form method="POST" action="{{ route('editar_usuario.update', $tipo3) }}">
                                            @csrf
                                            @method('put')
                                            <div class="x_content">
                                                <div class="">
                                                    <ul class="to_do">
                                                        @foreach($materias as $materia)
                                                            @if($matecount >=1 )

                                                                @foreach($mate as $mat)
                                                                    @if($materia->id == $mat->materias_id )
                                                                        <input type="checkbox" name="materia[]" class="flat" value="{{ $materia->materia }}" checked> {{ $materia->materia }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                @if($materia->id != $mat->materias_id )
                                                                    <input type="checkbox" name="materia[]" class="flat" value="{{ $materia->materia }}"> {{ $materia->materia }}
                                                                @endif
                                                            @else
                                                                    <input type="checkbox" name="materia[]" class="flat" value="{{ $materia->materia }}"> {{ $materia->materia }}
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <input type="hidden" name="cedula" id="cedula" value="{{ $usuario1->cedula }}" />
                                                    <button type="submit" class="btn btn-primary" style="float: right">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Perfil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- Inicio del Contenido-->
                                        <div class="modal-body">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <br />
                                                    <?php
                                                    $tipo = 'informacion';
                                                    ?>
                                                    <form action="{{ route('editar_usuario.update', $tipo) }}" class="form-label-left input_mask" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Nombre</h2>
                                                            <input type="text" class="form-control" name="name" value="{{ $usuario1->name }}">
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Apellido</h2>
                                                            <input type="text" class="form-control" name="apellido" value="{{ $usuario1->apellido }}">
                                                            @error('apellido')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Email</h2>
                                                            <input type="email" class="form-control" name="email" value="{{ $usuario1->email }}">
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Cedula</h2>
                                                            <input type="cedula" class="form-control" name="cedula" value="{{ $usuario1->cedula }}">
                                                            @error('cedula')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Contraseña</h2>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Escriba su Contraseña Aqui">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            </br>
                                                            </br>
                                                            </br>
                                                            </br>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" style="float: right">Guardar</button>
                                                        <button type="button" class="btn btn-secondary" style="float: right" data-dismiss="modal">Cerrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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