@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div class="col-md-10">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="{{ __('Name') }}">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>

                                        <div class="col-md-10">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="{{ __('Email') }}">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password"
                                            class="col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-10">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password-confirm"
                                            class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-10">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group mb-3">
                                                <label for="zipcode"
                                                    class="col-form-label text-md-end">{{ __('Zipcode') }}</label>

                                                <div id="ziperror" class="col-md-12">
                                                    <input id="zipcode" type="text"
                                                        class="form-control @error('adresses.zipcode') is-invalid @enderror"
                                                        name="adresses[zipcode]" value="{{ old('adresses.zipcode') }}" required
                                                        autocomplete="zipcode" placeholder="{{ __('Zipcode') }}" maxlength="8">

                                                    @error('adresses.zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="street"
                                            class="col-form-label text-md-end">{{ __('Street') }}</label>

                                        <div class="col-md-12">
                                            <input id="street" type="text"
                                                class="form-control @error('adresses.street') is-invalid @enderror"
                                                name="adresses[street]" value="{{ old('adresses.street') }}" required
                                                autocomplete="street" placeholder="{{ __('Street') }}">

                                            @error('adresses.street')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <label for="complement"
                                                    class="col-form-label text-md-end">{{ __('Complement') }}</label>

                                                <div class="col-md-12">
                                                    <input id="complement" type="text"
                                                        class="form-control @error('adresses.complement') is-invalid @enderror"
                                                        name="adresses[complement]" value="{{ old('adresses.complement') }}"
                                                        autocomplete="complement" placeholder="{{ __('Complement') }}">

                                                    @error('adresses.complement')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="number"
                                                    class="col-form-label text-md-end">{{ __('Number') }}</label>

                                                <div class="col-md-12">
                                                    <input id="number" type="text"
                                                        class="form-control @error('adresses.number') is-invalid @enderror"
                                                        name="adresses[number]" value="{{ old('adresses.number') }}"
                                                        autocomplete="number" placeholder="{{ __('Number') }}">

                                                    @error('adresses.number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="state"
                                                        class="col-form-label text-md-end">{{ __('State') }}</label>

                                                    <div class="col-md-12">
                                                        <input id="state" type="text"
                                                            class="form-control @error('adresses.state') is-invalid @enderror"
                                                            name="adresses[state]" value="{{ old('adresses.state') }}" required
                                                            autocomplete="state" placeholder="{{ __('State') }}">

                                                        @error('adresses.state')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="city"
                                                    class="col-form-label text-md-end">{{ __('City') }}</label>

                                                <div class="col-md-12">
                                                    <input id="city" type="text"
                                                        class="form-control @error('adresses.city') is-invalid @enderror"
                                                        name="adresses[city]" value="{{ old('adresses.city') }}" required
                                                        autocomplete="city" placeholder="{{ __('City') }}">

                                                    @error('adresses.city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label for="neighborhood"
                                                class="col-form-label text-md-end">{{ __('Neighborhood') }}</label>

                                            <div class="col-md-12">
                                                <input id="neighborhood" type="text"
                                                    class="form-control @error('adresses.neighborhood') is-invalid @enderror"
                                                    name="adresses[neighborhood]" value="{{ old('adresses.neighborhood') }}"
                                                    required autocomplete="neighborhood" placeholder="{{ __('Neighborhood') }}">

                                                @error('adresses.neighborhood')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <button type="submit" class="btn btn-primary">
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
