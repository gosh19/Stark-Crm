@extends('layouts.app')

@section('content')
<div class="container-fluid pt-5" style="background: rgba(32,124,229,1);
background: -moz-linear-gradient(top, rgba(32,124,229,1) 0%, rgba(250,250,250,0) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(32,124,229,1)), color-stop(100%, rgba(250,250,250,0)));
background: -webkit-linear-gradient(top, rgba(32,124,229,1) 0%, rgba(250,250,250,0) 100%);
background: -o-linear-gradient(top, rgba(32,124,229,1) 0%, rgba(250,250,250,0) 100%);
background: -ms-linear-gradient(top, rgba(32,124,229,1) 0%, rgba(250,250,250,0) 100%);
background: linear-gradient(to bottom, rgba(32,124,229,1) 0%, rgba(250,250,250,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#207ce5', endColorstr='#fafafa', GradientType=0 );">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border border-primary">
                <div class="card-header bg-info font-weight-bolder text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
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
