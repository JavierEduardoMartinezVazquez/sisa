@extends('plantilla')
@section('titulo')
    Home
@endsection
    @section('additionals_css')
@endsection
@section('content')
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
            </div>
        </section> 

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="card text-center"">
                            <div class="card-header" style="background-color: rgb(71, 71, 71)">
                              <h4 class="text-light"><br> ¡Bienvenido <br> {{ Auth::user()->name }}! <section class="content"><br>
                               </h4>
                            </div>
                          </div>
                    </div>
                    <div class="col-7">  
                            <div class="card-body" style="background-color: rgb(205, 205, 205)">
                                <div class="sm-6">
                                    <h6>      
                                    Usuario: {{ Auth::user()->name }}
                                    <br>Email: {{ Auth::user()->email }}
                                    <br>Rol: {{ Auth::user()->rol }}
                                    <br>Empresa: {{ Auth::user()->sucursal }}
                                    <br>Area: {{ Auth::user()->area }}
                                    </h6>
                            </div>
                            </div>
                    </div>
                    <div class="col-1">
                        <div class="card-body" style="background-color: rgb(201, 0, 0)">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-danger">Antes de solicitar vacaciones recuerda….</h3>
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
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-color">
                            <h3 class="card-title text-danger">¿Quienes somos?</h3>
                            <div class="card-tools">
                             </div>
                             <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <br>    
                                        <span>Somos una empresa integral 100% mexicana, nos encontramos fuertemente consolidada en el Estado de México, con 18 años de experiencia en el ramo de mantenimiento y reparación de unidades colisionadas, restauración, modificación y adaptaciones a tracto camiones, autobuses, pipas, cajas , remolques y equipo aliado.
                                        </span>
                                           </div>



                </div>
            </section>
                
            
            <section class="content">
                <div class="card">
                    <div class="card-header">
                         
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="card" style="width: 10rem;">
                                                <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                </div>
                                              </div>
                                        <div class="col-2">
                                            <div class="card" style="width: 10rem;">
                                                <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                </div>
                                              </div>
                                        <div class="col-2">
                                                <div class="card" style="width: 10rem;">
                                                    <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                    </div>
                                                  </div>
                                        <div class="col-2">
                                                    <div class="card" style="width: 10rem;">
                                                        <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                        </div>
                                                      </div>
                                        <div class="col-2">
                                                        <div class="card" style="width: 10rem;">
                                                            <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                            </div>
                                                          </div>
                                        <div class="col-2">
                                            <div class="card" style="width: 10rem;">
                                                <img src="http://www.socasa.com.mx/images/logo_socasa.png" class="card-img-top" alt="...">
                                                </div>
                                              </div>  
            </section>
    </div>
    @endsection