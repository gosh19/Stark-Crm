<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Ingrese los datos de usuario') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('User.store')}}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" wire:model="name" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" wire:model="email" readonly>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
    {{--
    <form action="{{route('User.store')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="inputName" class="col-form-label">Nombre completo:</label>
            <div class="col">
                <input type="text" class="form-control" name="name" wire:model="name" id="inputName" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-form-label">Correo electronico:</label>
            <div class="col">
                <input type="text" class="form-control" name="email" wire:model="email" id="email" readonly>
            </div>
        </div>
        <div class="form-group row">
          <label for="rol">Rol del usuario: </label>
          <div class="col">
              
              <select class="form-control" name="rol" id="rol">
                  <option value="operario">Operario</option>
                  <option value="admin">Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
                <button type="submit" class="btn btn-block btn-primary">Crear</button>
        </div>
    </form>
    --}}
