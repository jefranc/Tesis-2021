@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="right_col" role="main">
    @foreach($productos as $producto)
    <h1> {{ $producto->descripcion }} </h1>
    <h2> {{ $producto->precio }} </h2>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
@endsection