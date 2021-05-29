@extends('layouts.app')

@section('header-title', 'Mi cuenta')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-lg-9 text-center">
            @if(Session::has('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @include('partials.account.sidebar', ['active' => 'account'])
        </div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b>Nombre completo</b><br>{{ Auth::user()->full_name }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Email</b><br>{{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Número de Teléfono</b><br>{{ Auth::user()->phone_number }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Nro. Documento</b><br>{{ Auth::user()->document_number }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Razón Social</b><br>{{ Auth::user()->business_name }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>RUC</b><br>{{ Auth::user()->ruc }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>Fecha de Registro</b><br>{{ Auth::user()->created_at }}</p>
                                </div>
                                <div class="col-lg-12">
                                    <a class="btn btn-primary" href="{{ route('account.edit') }}">Editar mis datos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection