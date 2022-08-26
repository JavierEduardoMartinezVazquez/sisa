<style>
    body{
	background-color: #ec1c23;
	text-align: justify;
}
.card{
	background-color: #fff;
	width: 280px;
	border-radius: 2px;
	padding: 1.96rem !important;
}
.profile-image{
}
.name{
	font-size: 15px;
	font-family: sans-serif;
	color: #272727;
	position: relative;
	top: 8px;
}
.mail{
	font-size: 11px;
	color: grey;
	position: relative;
	top: 2px;
}

.codi{
	position: center;
}

.primero{
	font-family: sans-serif;
	border-left: 0px solid #5957f9;
	font-size: 13px;
	color: rgb(0, 0, 0);
	align-items: center;
	top: 2px;
	display: flex;
}

.espacio{
	font-size: 6px;
	color: rgb(255, 255, 255);
	position: justify;
	top: 2px;
}

.letra{
	font-family: sans-serif;
	font-size: 10px;
	color: rgb(75, 75, 75);
	position: justify;
	top: 2px;
}



</style>
<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">
			<center>
			<a class="espacio">
			-------------------------------------------------------------------------------------------------------
			
			<!-- CAMBIAR LOGOS EN LA CREDENCIAL -->

			<!-- LOGO SOCASA --> 
			<img src="control/img/logo_socasa.png" class="img-fluid profile-image" width="70">
			
			<!-- LOGO TECNODIESEL -->
			<!--<img src="control/img/logo_TECNODIESEL.jpg" class="img-fluid profile-image" width="70">-->
			
			<!-- LOGO UTP -->
			<!--<img src="control/img/logo_UTP.jpg" class="img-fluid profile-image" width="70">-->

			<div>
				<h5 class="name">{{ $user->name }}
				{{ $user->lastname_p }}
				{{ $user->lastname_m }}
			</h5>
				<p class="mail">{{ $user->sucursal }} </p>
			</div>
		</div>
</center>


<div class="primero">
	
</div>
	<div class="primero">
		<table>
                <tr>
					<td>ID: {{ $user->id }}<br>
                    NSS: {{ $user->nss }} <br>
					Puesto: {{ $user->area }}</td>
					<br>
                </tr>            
            </table>
		</div>
        <br>
        <div style="codi">
			<center>
            <!--{!! DNS2D::getBarcodeHTML("'".$user->id."'", 'QRCODE', 3 ,3) !!}-->
			{!! DNS1D::getBarcodeHTML("$user->id", 'C128', 3) !!}
		</div>
		<br>
			<div class="letra">
				<!-- DIRECCIÓN -->

				<!-- SOCASA -->
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center>

				<!-- SOCASA REFACCIONARIA
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center>-->

				<!-- UTP
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center> -->
				
				<!-- TECNODIESEL 
				<center>AVENIDA PRINCIPAL #7 INT. 1, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067. R.F.C. 
				</center> -->


			</div>
        </div>
</div>

<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">



	<div class="name">
		<table>
                <tr>
                    <td>
						<b>Telefono de emergencia: </b>
						<br>
						{{ $user->nss }} 
						<br>
						<br>
						<b>CURP: </b>
						<br>
						{{ $user->area }}
						<br>
						<br>
						<b>R.F.C: </b> 
						<br>
						{{ $user->area }}
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</td>
					<div class="letra">
						<center>
							ES DE USO EXCLUSIVO PARA LA EMPRESA SIENDO UN DOCUMENTO INTRANSFERIBLE, NO
							ES VÁLIDO SI PRESENTA RAYADURAS O TACHADURAS.
						</center>
					</div>
					<br>
                </tr>            
            </table>
		</div>
        
        </div>
</div>


		
	
	