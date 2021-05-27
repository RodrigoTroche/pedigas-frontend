@extends('layouts.app')

@section('content')
<div class="hero bg-orange py-3">
    @include('partials.navigation')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="hero-title">
                    <h1 class="">Bienvenido a Pedigas</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('images/pedidoframe.svg') }}" />
        </div>
        <div class="col-md-4 text-center">
            <div class="d-grid gap-2">
                @guest
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary pedigas-btn-rounded" type="button">
                    Ir a mi cuenta
                </a>
                @endif
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary pedigas-btn-rounded">Registrarme</a>
                @endif
                @else
                <a href="{{ route('login') }}" class="btn btn-primary pedigas-btn-rounded" type="button">
                    Hacer pedido aquí
                </a>
                <a href="{{ route('login') }}" class="btn btn-primary pedigas-btn-rounded whatsapp-button"
                    type="button">
                    Pedir por WhatsApp
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>

<!-- <section class="py-5 bg-orange mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <p style="color: #fff">Ponte en contacto con <b>Pedigas</b> y recibe tu gas en la comodidad de tu
                    hogar.
                    Contamos con
                    entregas inmediatas
                    para atender su solicitud de la manera más eficiente.</p>
                @auth
                <a href="{{ route('pages.order') }}" class="btn btn-primary">Pedí on-line</a>
                @else
                <a href="{{ route('register') }}" class="btn btn-primary">Pedí on-line</a>
                @endauth
            </div>
        </div>
    </div>
</section> -->

@endsection