@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-lg-8 text-center">
            <h2>{{ $address->exists ? 'Editar dirección' : 'Nueva dirección' }}</h2>
            @if($address->exists)
            <p>Aquí puedes crear una dirección para facilitarnos<br> la entrega de tu garrafa :)</p>
            @endif
        </div>
    </div>

    @include('partials.account.message')

    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @include('partials.account.sidebar', ['active' => 'address'])
        </div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::model($address, [
                        'method' => $address->exists ? 'put' : 'post',
                        'route' => $address->exists ? ['addresses.update', $address->id] : ['addresses.store'],
                        'files' => false,
                        'class' => ''
                    ]) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 form-floating">
                                {{ Form::select('city_id', $cities, null, ['class' => 'form-select']) }}
                                <label for="city_id" class="">{{ __('Ciudad') }}</label>

                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                {{ Form::text('alias', null, [
                                        'class' => 'form-control', 
                                        'required' => true, 
                                        'autocomplete' => 'alias', 
                                        'placeholder' => 'Calle Secundaria']) 
                                    }}
                                <label for="alias" class="text-md-right">{{ __('Alias') }}</label>

                                @error('alias')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                {{ Form::text('main_address', null, ['class' => 'form-control', 'required' => true, 'autocomplete' => 'main_address', 'placeholder' => 'Calle Principal']) }}
                                <label for="main_address" class="text-md-right">{{ __('Dirección Principal') }}</label>
                                @error('main_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                {{ Form::text('main_number', null, [
                                        'class' => 'form-control', 
                                        'required' => true, 
                                        'autocomplete' => 'main_number', 
                                        'placeholder' => 'Calle Secundaria']) 
                                    }}
                                <label for="main_number" class="text-md-right">{{ __('Número de Casa') }}</label>

                                @error('main_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                {{ Form::text('contact', null, [
                                        'class' => 'form-control', 
                                        'required' => true, 
                                        'autocomplete' => 'contact', 
                                        'placeholder' => 'Calle Secundaria']) 
                                    }}
                                <label for="contact" class="text-md-right">{{ __('Person para Contacto') }}</label>

                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        {{ Form::textarea('reference', null, [
                                        'class' => 'form-control', 
                                        'required' => true, 
                                        'autocomplete' => 'reference', 
                                        'placeholder' => 'Calle Secundaria',
                                        'style' => 'height: 100px'
                                        ]) 
                            }}
                        <label for="reference" class="text-md-right">{{ __('Referencia') }}</label>

                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div>
                        <button
                            class="btn btn-primary w-100">{{ $address->exists ? 'Actualizar dirección' : 'Crear dirección' }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection