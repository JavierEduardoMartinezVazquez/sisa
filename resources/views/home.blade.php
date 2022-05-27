@extends('plantilla')
@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


@section('titulo')
    Home
@endsection
 @section('additionals_css')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper"> 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!--<div class="col-sm-6">
            <h1>Boxed Layout</h1>
          </div>-->
          <div class="col-sm-6">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Boxed Layout</li>
            </ol>-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>   
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center"">
                        <div class="card-header">
                          <h5 class="text-danger">B I E N V E N I D O</h5>
                        </div>
                      </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Antes de solicitar vacaciones recuerda….</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">                            
                                    <span class="fa fa-check mr-3"></span>Debes de hacer la solicitud con un mínimo de 6 días  de anticipación a la fecha de inicio de vacaciones.
                                </div>
                                <div class="col-12 col-sm-12">                            
                                    <span class="fa fa-check mr-3"></span>Etc... 
                                </div>
                                <div class="col-12 col-sm-12">                            
                                    <span class="fa fa-check mr-3"></span>Etc... 
                                </div>
                                <div class="col-12 col-sm-12">                            
                                    <span class="fa fa-check mr-3"></span>Etc... 
                                </div>										
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            Gracias
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
