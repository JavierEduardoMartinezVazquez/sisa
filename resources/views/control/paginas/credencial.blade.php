<style>
    body{
	background-color: #5353538d;
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
	font-weight: serif;
	color: #272727;
	position: relative;
	top: 8px;
}
.mail{
	font-size: 12px;
	color: grey;
	position: relative;
	top: 2px;
}

.codi{
	position: center;
}

.primero{
	border-left: 0px solid #5957f9;
	font-size: 14px;
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
	font-size: 6px;
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
				---------------------------------------------------------------------------------
			 ----------------------
			<img src="control/img/logo_socasa.png" class="img-fluid profile-image" width="70">
			<div>
				<h5 class="name">{{ $user->name }}
				{{ $user->lastname_p }}
				{{ $user->lastname_m }}
			</h5>
				<p class="mail">{{ $user->email }} </p>
			</div>
		</div>
</center>


<div class="primero">
	<table>
		<tr>
			<td>Id: {{ $user->id }}<br>
		</tr>            
	</table>
</div>
	<div class="primero">
		<table>
                <tr>
                    <td>NSS: {{ $user->nss }} <br><br>
					Area: {{ $user->area }}</td>
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
				<center> SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. de C.V.</center>
				<!--{{ $user->hentrada }}-->
				<center>AVENIDA PRINCIPAL #7, BO.EL ESPINO, XONACATLÁN, ESTADO DE MÉXICO. C.P.52067.ESTA CREDENCIAL ES PROPIEDAD DE 
					SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V. ES DE USO EXCLUSIVO PARA LA EMPRESA SIENDO UN DOCUMENTO INTRANSFERIBLE, NO
					ES VÁLIDO SI PRESENTA RAYADURAS O TACHADURAS.
				</center>
			</div>
        </div>
		
	
	