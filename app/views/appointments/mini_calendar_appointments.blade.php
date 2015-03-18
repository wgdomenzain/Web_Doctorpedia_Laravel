<div class="background-blue color-white">{{$data['dia'].', '.$data['day_number'].' de '.$data['mes'].'     '.$data['year']}}</div>
<div id="dates-list-mini">
	<?$cont = 0;?>
	@for($time = date('H:i', strtotime('00:00')); $time <= date('H:i', strtotime('23:00')) ;)
		@if($data['day_appointments'][$cont] != '0')
			<div class="dates-block color-blue">
				<div class="counter hide">{{$cont}}</div>
				<div class="dates-block-time inline left">
					{{$time.'-'.date('H:i', strtotime(date("H:i", strtotime($time)) . " + 30 minutes"))}}	
				</div>
				<div class="dates-block-username inline right">
					@if($data['day_appointments'][$cont] == '2')
						<div class="status-appointment">
							<div class="inline status-appointment-circle background-gray"></div>
							<div class="inline status-appointment-line background-gray"></div>
						</div>
					@elseif($data['day_appointments'][$cont] == '1')
						<div class="status-appointment status-available">
							<div class="inline status-appointment-circle background-blue"></div>
							<div class="inline status-appointment-line background-blue"></div>
						</div>
					@endif
				</div>
				<div class="clear"></div>
			</div>
		@endif
		<? $cont++;?>
		<?$time = date('H:i', strtotime(date("H:i", strtotime($time)) . " + 30 minutes"));?>		
	@endfor
	<?$time = date('H:i', strtotime("23:30"));?>
	@if($data['day_appointments'][$cont] != '0')
			<div class="dates-block color-blue">
				<div class="counter hide">{{$cont}}</div>
				<div class="dates-block-time inline left">
					{{$time.'-'.date('H:i', strtotime(date("H:i", strtotime($time)) . " + 30 minutes"))}}	
				</div>
				<div class="dates-block-username inline right">
					@if($data['day_appointments'][$cont] == '2')
						<div class="status-appointment">
							<div class="inline status-appointment-circle background-gray"></div>
							<div class="inline status-appointment-line background-gray"></div>
						</div>
					@elseif($data['day_appointments'][$cont] == '1')
						<div class="status-appointment status-available">
							<div class="inline status-appointment-circle background-blue"></div>
							<div class="inline status-appointment-line background-blue"></div>
						</div>
					@endif
				</div>
				<div class="clear"></div>
			</div>
		@endif
</div>
<input id="request-date" type="hidden" value="{{$data['year'].'-'.$data['month_big'].'-'.$data['day_number']}}">
<div id="request-appointment" class="button">Solicitar</div>