@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-lg-12 text-center">
            <h2>Mis pedidos</h2>
        </div>
    </div>

    @include('partials.account.message')

    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @include('partials.account.sidebar', ['active' => 'orders'])
        </div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                @forelse($orders as $order)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <span class="badge bg-success">Entregado</span>
                            <h5 class="card-title">Pedido: {{ $order->code }}</h5>
                            <div class="mb-3">
                                <span>{{ $order->created_at->format('Y-m-d') }}</span><br>
                                <span>Gs. {{ $order->amount }}</span><br>
                                <span>{{ $order->address->main_address }}</span>
                                <br>
                            </div>
                            <a href="{{ route('addresses.edit', $order->id) }}" class="btn btn-primary">Repetir
                                pedido</a>
                            <a href="#" class="btn btn-link">Ver detalles</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <p>No hemos encontrado pedidos</p>
                            <a class="btn btn-primary" href="{{ route('addresses.create') }}">Hacer pedido</a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection