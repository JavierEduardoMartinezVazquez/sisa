<style>
    body{
	background-color: #5a57f98d;
}
.card{
	background-color: #fff;
	width: 280px;
	border-radius: 0px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding: 2rem !important;
}
.top-container{
	display: flex;
	align-items: center;
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
.middle-container{
	background-color: #eee;
	border-radius: 12px;

}
.middle-container:hover {
	border: 1px solid #5957f9;
}
.dollar-div{
	background-color: #5957f9;
	padding: 12px;
	border-radius: 10px;
}
.round-div{
	border-radius: 50%;
	width: 35px;
	height: 35px;
	background-color: #fff;
	display: flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}
.dollar{
	font-size: 16px !important;
	color: #5957f9 !important;
	font-weight: bold !important;
}


.current-balance{
	font-size: 15px;
	color: #272727;
	font-weight: bold;
}
.amount{
	color: #5957f9;
	font-size: 16px;
	font-weight: bold;
}
.dollar-sign{
	font-size: 16px;
	color: #272727;
	font-weight: bold;
}

.recent-border{
	border-left: 2px solid #5957f9;
	display: flex;
	align-items: center;

}
.recent-border:hover {
	border-bottom: 1px solid #dee2e6!important;
}

.recent-orders{
	font-size: 16px;
	font-weight: 700;
	color: #5957f9;
	margin-left: 2px;
}

.wishlist{
	font-size: 16px;
	font-weight: 700;
	color: #272727;

}
.wishlist-border:hover{
	border-bottom: 1px solid #dee2e6!important;
}
.fashion-studio{
	font-size: 16px;
	font-weight: 700;
	color: #272727;
}
.fashion-studio-border:hover {
	border-bottom: 1px solid #dee2e6!important;
}
</style>
<div class="container d-flex justify-content-center">
	<div class="card">
		<div class="container">
			<img src="control/img/foto.jpg" class="img-fluid profile-image" width="70">
			<div class="ml-3">
				<h5 class="name">{{ $user->name }}
				{{ $user->lastname_p }}
				{{ $user->lastname_m }} </h5>
				<p class="mail">{{ $user->email }} </p>
			</div>
		</div>
		<div class="recent-border mt-4">
			<br>
			<table>
                <tr>
                    <td colspan="2">Horarios</td>
                </tr>
                <tr>
                    <td>Entrada</td>
                    <td>Salida</td>
                </tr>
                <tr>
                    <td>{{ $user->hentrada }} </td>
                    <td>{{ $user->hsalida }} </td>
                </tr>              
            </table>
		</div>
        <br>
        <div style="text-align:right">
            {!! DNS2D::getBarcodeHTML("'".$user->id."'", 'QRCODE', 3 ,3) !!}
        </div>