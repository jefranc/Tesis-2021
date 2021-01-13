@extends('base')

@section('title', 'Inicio')

@section('content')
<div class="">
    <div class="product-image" align="center">
            <img src="{{ asset('Imagenes/Universidad.png') }}" >
    </div>
    <div class="x_panel" style="height:600px;">
        <div class="col-md-3 col-sm-6  ">
            <div class="pricing">
                <div class="title bg-primary">
                    <h2>Universidad de Guayaquil</h2>
                </div>
                <div class="x_content">
                    <div class="">
                    </div>
                    <div class="pricing_footer">
                        <a href= "http://www.ug.edu.ec/" target="_blank"
                        class="btn btn-success btn-block" role="button">IR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6  ">
            <div class="pricing">
                <div class="title bg-primary">
                    <h2>Sistema integrado de la Universidad de Guayaquil (SIUG)</h2>
                </div>
                <div class="x_content">
                    <div class="">
                    </div>
                    <div class="pricing_footer">
                        <a href= "https://servicioenlinea.ug.edu.ec/SIUG/Account/Login.aspx" target="_blank"
                        class="btn btn-success btn-block" role="button">IR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <table class="table">
            <thead class="thead-blue">
                <tr>
                    <th>MISIÓN</th>
                    <th>VISIÓN</th>
                </tr>
                </thead>
                <tr>
                    <td>Generar, difundir y preservar conocimientos científicos, <br>   
                        tecnológicos, humanísticos y saberes culturales de forma <br>
                        crítica, creativa y para la innovación social, a través de las <br>
                        funciones de formación, investigación y vinculación con la <br>
                        sociedad, fortaleciendo profesional y éticamente el talento de la <br>
                        nación y la promoción del desarrollo, en el marco de la <br>
                        sustentabilidad, la justicia y la paz.​​
                    </td>
                    <td>Ser una Universidad reconocida nacional e internacionalmente por su <br>
                        calidad académica, de emprendimiento, producción científica y tecnológica, <br>
                        con enfoque de responsabilidad social sustentable.
                    </td>
                </tr>
            </table>
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