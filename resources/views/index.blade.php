@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="right_col" role="main">
    <div class="product-image">
        <img src="{{ asset('Imagenes/Universidad.png') }}">
    </div>
    <div >
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