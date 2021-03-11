@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-lg-12 text-center">
            <h2>Mis direcciones</h2>
        </div>
    </div>

    @include('partials.account.message')

    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @include('partials.account.sidebar', ['active' => 'address'])
        </div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                @forelse($addresses as $address)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $address->alias }}</h5>
                            <p class="card-text">
                                {{ $address->main_address . ($address->main_number ? ', ' .$address->main_number : '')  }}
                            </p>
                            <p>{{ $address->city ? $address->city->name : '' }}</p>
                            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-link">Eliminar</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <p>No hemos encontrado direcciones registradas</p>
                            <a class="btn btn-primary" href="{{ route('addresses.create') }}">Agregar dirección</a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection