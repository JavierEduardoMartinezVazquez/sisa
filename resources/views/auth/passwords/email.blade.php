<link rel="shortcut icon" href="control/img/favicon.png">

@extends('layouts.app')

@section('titulo')
    Email
@endsection 

@section('content')
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
I N G R E S A R <br> E M A I L</p>
</strong>
    </h2>
  <div class="col-md-1 border border-danger">
</div>
<br>
<br>
</center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
