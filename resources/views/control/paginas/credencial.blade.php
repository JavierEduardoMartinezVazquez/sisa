<style>
    body{
	background-color: #5a57f98d;
	text-align: justify;
}
.card{
	background-color: #fff;
	width: 280px;
	border-radius: 0px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding: 2rem !important;
}
.profile-image{
	border-radius: 35px;
	border: 2px solid #5957f9;
}
.name{
	font-size: 15px;
	font-weight: serif;
	color: #272727;
	position: relative;
	top: 8px;
}
.mail{
	font-size: 13px;
	color: grey;
	position: relative;
	top: 2px;
}

.recent-border{
	border-left: 1px solid #5957f9;
	display: flex;
	align-items: center;

}



</style>
<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">
			<center>
			<img src="control/img/foto.jpg" class="img-fluid profile-image" width="70">
			<div>
				<h5 class="name">{{ $user->name }}
				{{ $user->lastname_p }}
				{{ $user->lastname_m }}
			</h5>
				<p class="mail">{{ $user->email }} </p>
			</div>
		</div>
</center>

		<h5>Id Empleado: {{ $user->id }} </h5>

		<div class="recent-border">
			<table>
                <tr>
                    <td colspan="1">Horario:</td>
                </tr>
                <tr>
                    <td>Entrada - {{ $user->hentrada }} </td> <br>
                    <td>Salida - {{ $user->hsalida }} </td>
                </tr>            
            </table>
		</div>
        <br>
        <div style="text-align:right">
            <!--{!! DNS2D::getBarcodeHTML("'".$user->id."'", 'QRCODE', 3 ,3) !!}-->
			{!! DNS1D::getBarcodeHTML("$user->id", 'C128') !!}
        </div>