<link rel="shortcut icon" href="control/img/favicon.png">
@section('content')

@extends('layouts.app')
@section('titulo')
    Login
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="col-md-12 border border-danger">
</div>
<div class="col-md-12 border border-danger">
</div>


<nav class="navbar navbar-expand-lg navbar-secondary bg-light">
<div class="container">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
      </div>
    </div>
  </nav>
 <nav class="navbar navbar-expand-lg navbar-light bg-ligth">
    <div class="container">        
        <form class="col-2">
            <a href="http://127.0.0.1:8000/" class="btn btn-outline-secondary">Salir</a>
          </form>
      </div>
    </div>
  </nav>

<div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-navbar-nav-scroll"></ul> 
  </div>
</div>
</nav>

<br>

<header>
<br>
  <center>
    <h2>
        <strong>
<p class="text-secondary">
L O G I N  </p>
</strong>
    </h2>
  <div class="col-md-1 border border-danger">
</div>
<br>
<br>
</center>


<div class="card-body">
<div class="container">
<div class="row justify-content-md-center">

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <br>
            <br>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('E-Mail') }}</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-center">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Recuerdame') }}
                        </label>
                    </div>
                </div>
            </div>
<br>    
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Entrar') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </center>

<br>
<br>
</header>
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
