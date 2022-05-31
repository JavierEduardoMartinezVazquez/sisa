<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SISA</title>
        <link rel="shortcut icon" href="control/img/favicon.png">

        <!-- Fonts -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #FFFF;
                color: #9c9c9c;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #8f8f8f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <div class="col-md-12 border border-danger">
    </div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-brand" href="#"> 
        <b class="text-danger">SOCASA</b>
      </div>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg- navbar-nav-scroll"></ul>
        <form class="col-2">
          <a href="http://127.0.0.1:8000/register" class="btn btn-outline-secondary">REGISTRATE</a>
        </form>
      </div>
    </div>
  </nav>
  <br>
<br>
<br>
<header>
    <!-- Background image -->
    <div class="p-6 text-center bg-image" style="height: 467px;">
      <div class="mask">
        <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-center">
                    <div class="card-body">
                        <h1 class="card-title">
                            <div class="text">
                              SISTEMA DE ASISTENCIA</h1>
                        </div>
                        <h1 class="display-6">Soluciones Integrales para tu Camión <br> SOCASA S.A. C.V</h1>
                        <form class="col-row-12">
                            <br>
                            <br>
                            <br>
                            <a href="http://127.0.0.1:8000/login" class="btn btn-outline-secondary">INGRESAR</a>
                        </div>
                      </div>
                </div>
    </div>
  </header>

  <footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(206, 30, 30);">
        <div class="text-white">
      © 2022 Copyright 
    </div>
    <!-- Copyright -->
  </footer>
 
    </body>
</html>