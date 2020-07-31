@extends('base')

@section('title', 'Inicio 2')

@section('content')
<h1>hola mundo 2</h1>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        console.log("listo!");
    });
</script>
@endsection