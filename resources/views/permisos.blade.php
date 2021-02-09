@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">Apellido</th>
                <th class="column-title">Nombre</th>
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
                <td class=" ">{{ $docentes->apellido }}</td>
                <td class=" ">{{ $docentes->name }}</td>
                <td class=" ">{{ $docentes->cedula }}</td>
                <td class=" ">{{ $docentes->email }}</td>
                <td class=" last">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Modificar
                    </button>
                    <!-- Modal -->
                    <script >       
                        
                    </script>
                    <form method="POST" action="{{ route('permisos.update', $id) }}">
                        @csrf 
                         @method('put')
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                @csrf 
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
                                                <h2>Lista de Permisos </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="">
                                                    <ul class="to_do">
                                                        <li>
                                                            <p>
                                                            <input type="checkbox" name="permiso[]" class="flat" value="Administador" > Administrador </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                            <input type="checkbox" name="permiso[]" class="flat" value="Director"> Director</p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                            <input type="checkbox" name="permiso[]" class="flat" value="CoEvaluador"> CoEvaluador</p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                            <input type="checkbox" name="permiso[]" class="flat" value="Docente"> Docente</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-info">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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