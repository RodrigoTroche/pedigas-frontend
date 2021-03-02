@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <div class="mb-3 text-center">
                        <h4>{{ __('Register') }}</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 form-floating">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="{{ __('Name') }}">
                            <label for="name" class="">{{ __('Name') }}</label>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                id="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"
                                autofocus placeholder="{{ __('Last Name') }}">
                            <label for="last_name" class="text-md-right">{{ __('Last Name') }}</label>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="phone_number" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                id="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"
                                autofocus placeholder="Ej: 0981458483">
                            <label for="phone_number" class="text-md-right">{{ __('Phone Number') }}</label>

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="{{ __('E-Mail Address') }}">
                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                id="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                            <label for="password" class="text-md-right">{{ __('Password') }}</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" id="password_confirmation" required
                                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                            <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection