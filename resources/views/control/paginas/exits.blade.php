@extends('plantilla')
@section('titulo')
    Exit
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h4>Exit</h4>
                                </div>
                                <div class="col-md-1">
                                    <!---->
                                </div>
                                <div class="col-md-1">
                                    <!---->
                                </div>
                                <center>
                                <div class="col-8">
                                    <div class="col-sm-6">
                                      <div class="card">
                                        <div class="card-body">
                                          <h3 class="card-text">¿Desea salir del sistema?</h3>
                                          <a href="#" class="btn btn-primary">Salir</a>
                                        </div>
                                      </div>
                                    </div>
                        <div class="card-body table-responsive">
                            <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                               
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        </section>
    </div>
    @include('control.modal.modal_alta')
    @include('control.modal.modal_baja')
@endsection
@section('additionals_js')
@endsection    