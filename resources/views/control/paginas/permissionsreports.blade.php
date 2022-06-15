@extends('plantilla')
@section('titulo')
    Reporte de Permisos
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
                                    <h4>Reporte de Permisos</h4>
                                </div>
                                <div class="col-md-1">
                                    <!---->
                                </div>
                                <div class="col-md-1">
                                    <!---->
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-danger" onclick="alta()">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="card-body table-responsive">
                            <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                        <th ><div style="width:90px !important;">Operación</div></th>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('control.modal.modal_alta')
    @include('control.modal.modal_baja')
@endsection
@section('additionals_js')
    <script>
    //detectar cuando en el input de buscar por codigo de producto el usuario presione la tecla enter, si es asi se realizara la busqueda con el codigo escrito
        $(document).ready(function(){
        $("#bus").addClass('active');
        });
    </script>
    <script>
        var obtener_ultimo_id_permissionsreports = '{!!URL::to('obtener_ultimo_id_permissionsreports')!!}';
        var guardar_permissionsreports = '{!!URL::to('guardar_permissionsreports')!!}';
        var listar_permissionsreports = '{!!URL::to('listar_permissionsreports')!!}';
        var obtener_permissionsreports = '{!!URL::to('obtener_permissionsreports')!!}';
        var modificar_permissionsreports = '{!!URL::to('modificar_permissionsreports')!!}';
        var verificar_baja_permissionsreports = '{!!URL::to('verificar_baja_permissionsreports')!!}';
        var baja_permissionsreports = '{!!URL::to('baja_permissionsreports')!!}';     
    </script> 
    <script src="scripts/permissionsreports.js"></script>
@endsection    