@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="">
    <div class="product-image" align="center">
            <img src="{{ asset('Imagenes/Universidad.png') }}" >
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