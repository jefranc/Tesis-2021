@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu Correo Personal') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificacion a sido enviado a tu correo personal.') }}
                        </div>
                    @endif

                    {{ __('Antes de Continuar, verefica tu correo personal') }}
                    {{ __('Si no has recibido un link en tu correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click para alguna solicitud') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
