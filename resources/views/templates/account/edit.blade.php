@extends('layouts.app')

@section('header-title', 'Editar mis datos')

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
                    <form action="{{ route('account.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-floating">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                        value="{{ old('name') ?? Auth::user()->name }}" required autocomplete="name"
                                        autofocus placeholder="{{ __('Name') }}">
                                    <label for="name" class="">{{ __('Name') }}</label>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        id="last_name" value="{{ old('last_name') ?? Auth::user()->last_name }}"
                                        required autocomplete="last_name" autofocus placeholder="{{ __('Last Name') }}">
                                    <label for="last_name" class="text-md-right">{{ __('Last Name') }}</label>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="phone_number" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                id="phone_number" value="{{ old('phone_number') ?? Auth::user()->phone_number }}"
                                required autocomplete="phone_number" autofocus placeholder="Ej: 0981458483">
                            <label for="phone_number" class="text-md-right">{{ __('Phone Number') }}</label>

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="document_number" type="text"
                                class="form-control @error('document_number') is-invalid @enderror"
                                name="document_number" id="document_number"
                                value="{{ old('document_number') ?? Auth::user()->document_number }}" required
                                autocomplete="document_number" autofocus placeholder="Ej: 0981458483">
                            <label for="document_number" class="text-md-right">{{ __('CI') }}</label>

                            @error('document_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input id="business_name" type="text"
                                        class="form-control @error('business_name') is-invalid @enderror"
                                        name="business_name" id="business_name"
                                        value="{{ old('business_name') ?? Auth::user()->business_name }}" required
                                        autocomplete="business_name" autofocus placeholder="Ej: 0981458483">
                                    <label for="business_name" class="text-md-right">{{ __('Razón Social') }}</label>

                                    @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input id="ruc" type="text" class="form-control @error('ruc') is-invalid @enderror"
                                        name="ruc" id="ruc" value="{{ old('ruc') ?? Auth::user()->ruc }}" required
                                        autocomplete="ruc" autofocus placeholder="Ej: 0981458483">
                                    <label for="ruc" class="text-md-right">{{ __('RUC') }}</label>

                                    @error('ruc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" value="{{ old('email') ?? Auth::user()->email }}" required
                                autocomplete="email" placeholder="{{ __('E-Mail Address') }}" readonly>
                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary w-100">Actualizar datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection