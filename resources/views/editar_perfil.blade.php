
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
                        <h3>{{ $name }} {{ $apellido }}</h3>
                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-id-card-o"></i> {{ $cedula }}
                            </li>
                            <li><i class="fa fa-envelope"></i> {{ $email }}
                            </li>
                            <li><i class="fa fa-font-awesome"></i> {{ $roles }}
                            </li>
                            <form action="{{ route('editar_perfil.store' )}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                    <div class="form-group">
                                    <input type="file" class="btn btn-success" name="file" id={{ $id }} accept="image/*">
                                    @error('file')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div> 
                                <button type="submit" class="btn btn-primary">Subir Imagen</button>
                            </form> 
                        </ul> 
                    </div>
                    <div class="col-md-9 col-sm-9 ">    
                        <div class="profile_title">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Editar Informacion de Perfil
                            </button>
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
                                                    <form action="{{ route('editar_perfil.update', $id) }}" class="form-label-left input_mask"  method="POST">
                                                        @csrf 
                                                        @method('put')
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Nombre</h2>
                                                            <input type="text" class="form-control" name = "name" value= "{{ $name }}"> 
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror           
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Apellido</h2>
                                                            <input type="text" class="form-control" name = "apellido" value= "{{ $apellido }}">
                                                            @error('apellido')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror  
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Email</h2>
                                                            <input type="email" class="form-control" name = "email" value= "{{ $email }}">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror  
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">    
                                                            <h2>Cedula</h2>
                                                            <input type="cedula" class="form-control" name = "cedula" value= "{{ $cedula }}">
                                                            @error('cedula')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                            <h2>Contraseña</h2>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                                            name="password" required autocomplete="new-password" placeholder="Escriba su Contraseña Aqui">
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