@extends('main.mainframe')
@section('contenido')
	<section id="contenido-day-dates">
		<div id="time-column" class="">
			<div id="date-time-title" class="">
				<a href="{{asset('appointments_patient/date/'.date('d-m-Y',strtotime($data['date'].' -1 days')))}}"><div class="left color_white">Anterior</div></a>
				<a href="{{asset('appointments_patient/date/'.date('d-m-Y',strtotime($data['date'].' +1 days')))}}"><div class="right color_white">Siguiente</div></a>
				<div class="clear"></div>
				<div id="date-time-day" class="inline">{{$data['dia'].', '.$data['day_number'].' de '.$data['mes']}}</div>
				<div id="date-time-year" class="inline">{{$data['year']}}</div>
			</div>
			<div id="dates-list">
				@for($x = 0; $x < count($data['day_appoinments']); $x++)
				<?$app_time =  explode('-', $data['day_appoinments'][$x]->time)?>
					<div class="dates-block color-blue">
						<div class="dates-block-time inline left">
							{{$app_time[0]}}	
						</div>
						<div class="dates-block-username inline right">
							<div data-id="{{$data['day_appoinments'][$x]->appID}}" class="dates-click">
							<div class="inline date-point-time background-blue"></div>
							{{$data['day_appoinments'][$x]->doctorName}}
							</div>
						</div>
						<div class="clear"></div>
					</div>			
				@endfor
			</div>
		</div>
		<div id="dates-detail" class="background-white">
			<form id="dates-detail-form" method="POST">
			{{Form::token()}}
				<div class="renglon align-left">
					<input id="info-user-id" name="userID" hidden>
					<div class="color-blue inline detail-title">Paciente</div>
					<div id="info-user" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<div class="color-blue inline detail-title">Doctor</div>
					<div id="info-doctor" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<div class="color-blue inline detail-title">Lugar</div>
					<div id="info-location" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<input id="info-date-post" name="date" hidden>
					<div class="color-blue inline detail-title">Fecha</div>
					<div id="info-date" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<input id="info-time-post" name="time" hidden>
					<div class="color-blue inline detail-title">Horario</div>
					<div id="info-time" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<div class="color-blue inline detail-title">Status</div>
					<div id="info-status" class="inline color-black"></div>
				</div>
				<div class="line"></div>
				<div class="renglon align-left">
					<div class="color-blue inline detail-title">Comentarios</div>
					<div id="info-comments" class="inline color-black"></div>
				</div>
				<div class="line"></div>
			</form>
		</div>
		<div id="dates-info" class="hide">{{json_encode($data['print'])}}</div>
	</section>
@stop
