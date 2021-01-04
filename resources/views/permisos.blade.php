@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th>
                    <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">Nombre</th>
                <th class="column-title">Apellido</th>
                <th class="column-title">Cedula</th>
                <th class="column-title">Correo Institucional</th>
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
                <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">{{ $docentes->name }}</td>
                <td class=" ">{{ $docentes->apellido }}</td>
                <td class=" ">{{ $docentes->cedula }}</td>
                <td class=" ">{{ $docentes->email }}</td>
                <td class=" last">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Modificar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>      
                                <!-- Inicio del Contenido-->            
                                <div class="modal-body">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>To Do List <small>Sample tasks</small></h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="">
                                                <ul class="to_do">
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Create email address for new intern</p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
@endsection