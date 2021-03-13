@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('images/hero.jpeg') }}" class="d-block m-auto" />
        </div>
    </div>
</div>

<section class="py-5 bg-orange mt-4">
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
</section>

@endsection