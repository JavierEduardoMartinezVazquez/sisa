'use strict'
    var tabla;
    var form;

    function init(){
        listaruser();
     }

    function mostrarmodalformulario(movimiento, permitirmodificacion){
        $("#Form_Modal").modal('show');
        if(movimiento=='ALTA'){
            $('#btnGuardar').show();
            $('#btnGuardarModificacion').hide();
        }else if(movimiento == 'MODIFICACION'){
            if(permitirmodificacion == 1){
                $('#btnGuardar').hide();
                $('#btnGuardarModificacion').show();
            }else{
                $("#btnGuardar").hide();
                $("#btnGuardarModificacion").hide();
            }    
        }
    }
    //mostrar formulario en modal y ocultar tabla de seleccion
    function mostrarformulario(){
        $("#formulario").show();// $("#formulario") es el ID del DIV del formulario del modal <1> 
        $("#contenidomodaltablas").hide();
    }

    //mostrar tabla de seleccion y ocultar formulario en modal
    function ocultarformulario(){
        $("#formulario").hide();
        $("#contenidomodaltablas").show();
    }
    function obtenerultimoiduser(){
        $.get(obtener_ultimo_id_user, function(numero){
          $("#txtnumero").val(numero);
        })
    }
    //limpiar todos los inputs del formulario alta
    function limpiar(){
        $("#form_Modal_pricipal")[0].reset();   
        //Resetear las validaciones del formulario alta
        form = $("#form_Modal_pricipal");
        form.parsley().reset();
    }
    function ocultarmodalformulario(){
        $("#Form_Modal").modal('hide');
    }
    function limpiarmodales(){
        $("#tabsform").empty();
    }
    function obtenerempresa(){
        ocultarformulario();
        var tablaempresas= '<div class="modal-header ">'+
                                '<h4 class="modal-title">Empresa</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="table-responsive">'+
                                            '<table id="tbllistadoempresas" class="tbllistadoempresas table table-bordered table-striped table-hover" style="width:100% !important;">'+
                                                '<thead >'+
                                                    '<tr>'+
                                                        '<th>Operaciones</th>'+
                                                        '<th>#</th>'+
                                                        '<th>Nombre</th>'+
                                                        '<th>status</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+   
                                '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger btn-sm" onclick="mostrarformulario();">Regresar</button>'+
                            '</div>';
          $("#contenidomodaltablas").html(tablaempresas);
          var tagen = $('#tbllistadoempresas').DataTable({
              "lengthMenu": [ 10, 50, 100, 250, 500 ],
              "pageLength": 250,
              "sScrollX": "110%",
              "sScrollY": "370px",
              "bScrollCollapse": true,  
              processing: true,
              'language': {
                "url": "control/plugins/datatables/es_es.json",
              },
              serverSide: true,
              ajax: {
                  url: obtener_empresa,
              },
              columns: [
                  { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
                  { data: 'id', name: 'id' },
                  { data: 'nombre', name: 'nombre' },
                  { data: 'status', name: 'status' }
              ],
              "initComplete": function() {
                  var $buscar = $('div.dataTables_filter input');
                  $buscar.unbind();
                  $buscar.bind('keyup change', function(e) {
                      if(e.keyCode == 13 || this.value == "") {
                      $('#tbllistadoempresas').DataTable().search( this.value ).draw();
                      }
                  });
              },
          });  
          //seleccionar registro al dar doble click
          $('#tbllistadoempresas tbody').on('dblclick', 'tr', function () {
              var data = tagen.row( this ).data();
              seleccionarempresa(data.id, data.nombre);
          }); 
    }
    function seleccionarempresa(id, nombre){
    
        $("#txtempresa").val(id);
        $("#txtnom").html(nombre);
        $("#txtnamee").val(nombre);
        //if(nombre != null){
         // $("#txtcliente").html(nombre.substring(0, 40));
        //}
        mostrarformulario();
      }

      function obtenerhorario(){
        ocultarformulario();
        var tablahorarios= '<div class="modal-header ">'+
                                '<h4 class="modal-title">Horario</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="table-responsive">'+
                                            '<table id="tbllistadohorario" class="tbllistadohorario table table-bordered table-striped table-hover" style="width:100% !important;">'+
                                                '<thead >'+
                                                    '<tr>'+
                                                        '<th>Operaciones</th>'+
                                                        '<th>#</th>'+
                                                        '<th>Entrada</th>'+
                                                        '<th>Salida</th>'+
                                                        '<th>status</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+   
                                '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger btn-sm" onclick="mostrarformulario();">Regresar</button>'+
                            '</div>';
          $("#contenidomodaltablas").html(tablahorarios);
          var tagen = $('#tbllistadohorario').DataTable({
              "lengthMenu": [ 10, 50, 100, 250, 500 ],
              "pageLength": 250,
              "sScrollX": "110%",
              "sScrollY": "370px",
              "bScrollCollapse": true,  
              processing: true,
              'language': {
                "url": "control/plugins/datatables/es_es.json",
              },
              serverSide: true,
              ajax: {
                  url: obtener_horario,
              },
              columns: [
                  { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
                  { data: 'id', name: 'id' },
                  { data: 'entrada', name: 'entrada' },
                  { data: 'salida', name: 'salida' },
                  { data: 'status', name: 'status' }
              ],
              "initComplete": function() {
                  var $buscar = $('div.dataTables_filter input');
                  $buscar.unbind();
                  $buscar.bind('keyup change', function(e) {
                      if(e.keyCode == 13 || this.value == "") {
                      $('#tbllistadohorario').DataTable().search( this.value ).draw();
                      }
                  });
              },
          });  
          //seleccionar registro al dar doble click
          $('#tbllistadohorario tbody').on('dblclick', 'tr', function () {
              var data = tagen.row( this ).data();
              seleccionarhorario(data.id);
          }); 
    }
    function seleccionarhorario(id){
    
        $("#txthorario").val(id);
        //if(nombre != null){
         // $("#txtcliente").html(nombre.substring(0, 40));
        //}
        mostrarformulario();
      }
      function obtenerroles(){
        $.get(obtener_roles, function(roles){
            $("#roles").html(roles);
        })      
    }
    function alta(){
        $("#titulomodal").html('Alta Usuario');
        mostrarmodalformulario('ALTA');
        mostrarformulario();
        //formulario alta
        var tabs =
        '<div class="row">'+
        '<div class="col-12 col-sm-12">'+
            '<div class="card card-primary card-tabs">'+
                '<div class="card-header p-0 pt-1">'+
                    '<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">'+
                        '<li class="nav-item">'+
                            '<a class="nav-link active" id="dat" data-toggle="pill" href="#p_datos" role="tab" aria-controls="p_datos" aria-selected="true">DATOS GENERALES</a>'+
                        '</li>'+
                        '<li class="nav-item">'+
                            '<a class="nav-link" id="detal" data-toggle="pill" href="#p_detalles" role="tab" aria-controls="p_detalles" aria-selected="false">DETALLES</a>'+
                        '</li>'+
                    '</ul>'+
                '</div>'+
                '<div class="card-body">'+
                    '<div class="tab-content" id="custom-tabs-one-tabContent">'+
                    
                        '<div class="tab-pane fade show active" id="p_datos" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">'+

                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-1">'+
                                        '<label>Id:</label>'+                            
                                        '<input type="text" class="form-control" name="numero" id="txtnumero" placeholder="ID" onkeyup="tipoLetra(this);" required readonly>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>Nombre:</label>'+                            
                                        '<input type="text" class="form-control" name="nombre" id="txtnombre" placeholder="Nombre" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+ 
                                        '<label>A. Paterno</label>'+
                                        '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="1er Apellido" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+ 
                                        '<label>A. Materno</label>'+
                                        '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder="2do Apellido"" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+  
                                '</div>'+
                            '</div>'+

                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-4">'+
                                        '<label>Correo Electrónico</label>'+
                                        '<input type="text" class="form-control" name="email" id="txtemail" placeholder="email" required autocomplete="email" data-parsley-type="email" onkeyup="tipoMinusculas(this);">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+ 
                                        '<label>Contraseña</label>'+
                                        '<input type="password" class="form-control" name="pass" id="txtpass" required autocomplete="new-password" placeholder="Contraseña">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+ 
                                        '<label>Confirmar contraseña</label>'+
                                        '<input type="password" class="form-control" name="pass2" id="txtpass2" required autocomplete="new-password" data-parsley-equalto="#txtpass" placeholder="Confirmar contraseña">'+
                                    '</div>'+  
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        
                        '<div class="tab-pane fade" id="p_detalles" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">'+
      
                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-1">'+ 
                                        '<label>#<b style="color:#F44336 !important;">*</b></label>'+                                    
                                        '<input type="text" class="form-control" name="empresa" id="txtempresa" placeholder="Id" onkeyup="tipoLetra(this);" ondblclick="obtenerempresa();" readonly required>'+
                                    '</div>'+
                                    '<div class="col-md-7">'+
                                    '<label>Nombre:<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="namee" id="txtnamee" placeholder="Empresa" onkeyup="tipoLetra(this);"  readonly required>'+                          
                                         //'<span name="nom" id="txtnom"></span>'+
                                                                                                                   
                                    '</div>'+
                                    
                                    '<div class="container">'+
                                    '<div class="form-group row">'+
                                    '<div class="col-md-6">'+
                                        '<label>Horario<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="horario" id="txthorario" placeholder="Horario" onkeyup="tipoLetra(this);" ondblclick="obtenerhorario();"readonly required>'+
                                    '</div>'+ /*
                                    '<div class="col-md-6">'+
                                        '<label>Horario<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="horario" id="txthorario" placeholder="Horario" onkeyup="tipoLetra(this);" ondblclick="obtenerhorario();"readonly required>'+
                                    '</div>'+
                                '</div>'+  
                            '</div>'+*/

                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-4">'+
                                        '<label>Fecha Corporativo:</label>'+                            
                                        '<input type="datetime-local" class="form-control" name="fecha_cor" id="txtfecha_cor">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+ 
                                        '<label>Fecha de ingreso</label>'+
                                        '<input type="datetime-local" class="form-control" name="fecha_ini" id="txtfecha_ini">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+ 
                                        '<label>Fecha Baja</label>'+
                                        '<input type="datetime-local" class="form-control" name="fecha_baj" id="txtfecha_baj" readonly>'+
                                    '</div>'+  
                                '</div>'+
                            '</div>'+
                            

                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-12">'+
                                        '<label>Rol <b style="color:#F44336 !important;">*</b></label>'+
                                        '<div class="col-md-12 form-check" >'+
                                            '<div class="container">'+
                                                '<div class="form-group row" id="roles">'+
                                                    //se imprime el foreach
                                                '</div>'+
                                            '</div>'+                                                                
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+

                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';
        $("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoiduser();
        obtenerroles();
    }
    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:guardar_user,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data == 1){
                        toastr.error( "Aviso, el Correo Electrónico ya existe", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                    }else{
                        toastr.success( "Datos guardados correctamente", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                        var tabla = $('.tbllistado').DataTable();
                        tabla.ajax.reload();
                        limpiar();
                        ocultarmodalformulario();
                        limpiarmodales();
                    }
                },
                error:function(data){
                    if(data.status == 403){
                        toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000" 
                        });
                    }else{
                        toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                    }
                }
            })
        }else{
            form.parsley().validate();
        }
    });

    function listaruser() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: listar_user,
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            /*{ data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },*/
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'name', name: 'name', orderable: true, searchable: true },
            /*{ data: 'lastname_p', name: 'lastname_p', orderable: true, searchable: true },
            { data: 'lastname_m', name: 'lastname_m', orderable: true, searchable: true },*/
            { data: 'email', name: 'email', orderable: true, searchable: true },
            /*{ data: 'fechaingresocorp', name: 'fechaingresocorp', orderable: true, searchable: true },
            { data: 'fechaingresoemp', name: 'fechaingresoemp', orderable: true, searchable: true },
            { data: 'fechabaja', name: 'fechabaja', orderable: true, searchable: true },
            { data: 'id_horario', name: 'id_horario', orderable: true, searchable: true },
            { data: 'id_empresa', name: 'id_empresa', orderable: true, searchable: true },
            { data: 'id_area', name: 'id_area', orderable: true, searchable: true },
            { data: 'id_rol', name: 'id_rol', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },*/
        ],
        "order": [[ 1, "asc" ]]
        })
    }
    function obteneruser(numero){
        $("#titulomodal").html('Modificación Usuario');
        $.get(obtener_user,{numero:numero },function(data){
            //se crea al formulario
            var tabs =
            '<div class="row">'+
            '<div class="col-12 col-sm-12">'+
                '<div class="card card-primary card-tabs">'+
                    '<div class="card-header p-0 pt-1">'+
                        '<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">'+
                            '<li class="nav-item">'+
                                '<a class="nav-link active" id="dat" data-toggle="pill" href="#p_datos" role="tab" aria-controls="p_datos" aria-selected="true">DATOS GENERALES</a>'+
                            '</li>'+
                            '<li class="nav-item">'+
                                '<a class="nav-link" id="detal" data-toggle="pill" href="#p_detalles" role="tab" aria-controls="p_detalles" aria-selected="false">DETALLES</a>'+
                            '</li>'+
                        '</ul>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="tab-content" id="custom-tabs-one-tabContent">'+
                            '<div class="tab-pane fade show active" id="p_datos" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">'+

                                '<div class="container">'+
                                    '<div class="form-group row">'+
                                        '<div class="col-md-1">'+
                                            '<label>ID:</label>'+                            
                                            '<input type="text" class="form-control" name="numero" id="txtnumero" placeholder="ID" onkeyup="tipoLetra(this);" required readonly>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                            '<label>Nombre:</label>'+                            
                                            '<input type="text" class="form-control" name="nombre" id="txtnombre" placeholder="Nombre" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+ 
                                            '<label>A. Paterno</label>'+
                                            '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="1er Apellido" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+
                                        '<div class="col-md-3">'+ 
                                            '<label>A. Materno</label>'+
                                            '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder="2do Apellido"" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+

                                '<div class="container">'+
                                    '<div class="form-group row">'+
                                        '<div class="col-md-4">'+
                                            '<label>Correo Electrónico</label>'+
                                            '<input type="text" class="form-control" name="email" id="txtemail" placeholder="email" required autocomplete="email" data-parsley-type="email" onkeyup="tipoMinusculas(this);">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+ 
                                            '<label>Contraseña</label>'+
                                            '<input type="password" class="form-control" name="pass" id="txtpass" required autocomplete="new-password" placeholder="Contraseña">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+ 
                                            '<label>Confirmar contraseña</label>'+
                                            '<input type="password" class="form-control" name="pass2" id="txtpass2" required autocomplete="new-password" data-parsley-equalto="#txtpass" placeholder="Confirmar contraseña">'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="tab-pane fade" id="p_detalles" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">'+
        
                                '<div class="container">'+
                                    '<div class="form-group row">'+
                                        '<div class="col-md-7">'+ 
                                            '<label>Empresa<b style="color:#F44336 !important;">*</b></label>'+
                                            '<input type="text" class="form-control" name="empresa" id="txtempresa" placeholder="Empresa" onkeyup="tipoLetra(this);" ondblclick="obtenerempresa();" readonly required>'+
                                        '</div>'+
                                        /*'<div class="col-md-7">'+
                                            '<label>'+                                       
                                            '<small>Nombre</small>'+
                                            '</label>'+
                                            '<span class="label label-danger" name="nom" id="txtnom">'+
                                            '</span>'+                                        
                                        '</div>'+*/
                                        '<div class="col-md-4">'+
                                            '<label>Horario<b style="color:#F44336 !important;">*</b></label>'+
                                            '<input type="text" class="form-control" name="horario" id="txthorario" placeholder="Horario" onkeyup="tipoLetra(this);" ondblclick="obtenerhorario();"readonly required>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+

                                '<div class="container">'+
                                    '<div class="form-group row">'+
                                        '<div class="col-md-4">'+
                                            '<label>Fecha Corporativo:</label>'+                            
                                            '<input type="datetime-local" class="form-control" name="fecha_cor" id="txtfecha_cor">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+ 
                                            '<label>Fecha de ingreso</label>'+
                                            '<input type="datetime-local" class="form-control" name="fecha_ini" id="txtfecha_ini">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+ 
                                            '<label>Fecha Baja</label>'+
                                            '<input type="datetime-local" class="form-control" name="fecha_baj" id="txtfecha_baj" readonly>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+

                                '<div class="container">'+
                                    '<div class="form-group row">'+
                                        '<div class="col-md-12">'+
                                            '<label>Rol <b style="color:#F44336 !important;">*</b></label>'+
                                            '<div class="col-md-12 form-check" >'+
                                                '<div class="container">'+
                                                    '<div class="form-group row" id="roles">'+
                                                        //se imprime el foreach
                                                    '</div>'+
                                                '</div>'+                                                                
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+

                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>';
            $("#tabsform").html(tabs);
            console.log(data);//mandas el arreglo
            $("#txtnumero").val(data.user.id);
            $("#txtnombre").val(data.user.name);
            $("#txtpaterno").val(data.user.lastname_p);
            $("#txtmaterno").val(data.user.lastname_m);
            $("#txtemail").val(data.user.email);
            $("#txtempresa").val(data.user.id_empresa);
            $("#txthorario").val(data.user.id_horario);
            $("#txtfecha_cor").val(data.fechadeingresocorp);
            $("#txtfecha_ini").val(data.fechadeingresoemp);
            $("#txtfecha_baj").val(data.fechadebaja);
            $("#roles").html(data.roles);
            mostrarmodalformulario('MODIFICACION', data.permitirmodificacion);
            mostrarformulario();
        }).fail( function() {
            toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                "timeOut": "6000",
                "progressBar": true,
                "extendedTImeout": "6000"
            });
        })
    }

    //guardar modificaciones
$("#btnGuardarModificacion").on('click', function (e) {
    e.preventDefault();
    var formData = new FormData($("#form_Modal_pricipal")[0]);//
    var form = $("#form_Modal_pricipal");
    if (form.parsley().isValid()){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:modificar_user,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                toastr.success( "Datos guardados correctamente", "Mensaje", {
                    "timeOut": "6000",
                    "progressBar": true,
                    "extendedTImeout": "6000"
                });
                var tabla = $('.tablelist').DataTable();
                tabla.ajax.reload();
                limpiar();
                ocultarmodalformulario();
                limpiarmodales();
            },
            error:function(data){
                if(data.status == 403){
                    toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }else{
                    toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }
            }    
        })
    }else{
        form.parsley().validate();
    }
});
function verificarbajauser(numero){
    $.get(verificar_baja_user, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("Este empleado ya fue dado de baja.");
            // id de boton para la baja dentro del formulario del modal de baja
            $("#aceptar").hide();
            // id del div del modal id="estatusregistro"
            $('#estatusregistro').modal('show');
        }else{
            $("#num").val(numero);
            $("#textobaja").html("¿Esta seguro de dar de baja este empleado?");
            $("#aceptar").show();
            $('#estatusregistro').modal('show');
        }
    })
}
$("#aceptar").on('click', function(e){
    e.preventDefault();//          #formdeactivate ID del formulario que se encuantra en el modal de la baja
    var formData = new FormData($("#formdeactivate")[0]);
    var form = $("#formdeactivate");
    if (form.parsley().isValid()){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:baja_user,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#estatusregistro').modal('hide');
                toastr.success( "La baja se realizo correctamente", "Mensaje", {
                    "timeOut": "6000",
                    "progressBar": true,
                    "extendedTImeout": "6000"
                });
                var tabla = $('.tablelist').DataTable();
                tabla.ajax.reload();
            },
            error:function(data){
                if(data.status == 403){
                    toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000" 
                    });
                }else{
                    toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }
                $('#estatusregistro').modal('hide');
            }
        })
    }else{
        form.parsley().validate();
    }
});
    
init();