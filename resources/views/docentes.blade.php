@extends('base')

@section('title', 'Lista de Docentes')

@section('content')
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">   
                <th class="column-title">Apellido</th>
                <th class="column-title">Nombre</th>
                <th class="column-title">Cedula</th>
                <th class="column-title">Correo Institucional</th>
                <th class="column-title">Status</th>
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
                @if ($docentes->status == 1)
                    <td class=" ">Ya Evaluado</td>
                @else 
                    <td class=" ">Por Evaluar</td>
                @endif
                <td class=" last">
                    <a href="#">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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