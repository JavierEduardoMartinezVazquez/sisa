<div class="col-md-12 border border-danger">
</div>
<div class="col-md-12 border border-danger">
</div>
<link rel="shortcut icon" href="control/img/favicon.png">
@extends('layouts.app')

@section('titulo')
    Registro
@endsection 

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <header>
      <center>
        <h2>
            <strong>
    <p class="text-secondary">
    R E G I S T R A T E  </p>
    </strong>
        </h2>
      <div class="col-md-1 border border-danger">
    </div>
    <br>
    </center>
    <br>
    </strong>
    
      <div class="container">
        <div class="row justify-content-md-center">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <br>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-center">{{ __('Nombre') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-center">{{ __('E-Mail') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>
                                    
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-center">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <br>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-center">{{ __('Confirmar Pass') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <br>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-6">
                                            <center>
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Listo') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            
    </header>
    <div class="col-md-2 offset-md-10">
        <div class="container">  
                <a href="http://127.0.0.1:8000/" class="btn btn-outline-secondary">Volver</a>
          </div>
        </div>
    </div>
        <br>
        <br>
    <footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(206, 30, 30);">
        <div class="text-white">
      © 2022 Copyright 
    </div>
    <!-- Copyright -->
    </footer>   
@endsection