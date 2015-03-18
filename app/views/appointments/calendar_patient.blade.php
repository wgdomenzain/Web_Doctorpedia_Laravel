<script type="text/javascript">
       	$(function() {
               $("#date").datepicker({ dateFormat: "dd-mm-yy" }).val()
      		});
  		</script>
<div id="title-month" class="align-left">
	<div id="last-month-patient" class="last-month"></div>
	<div id="month" class="color-blue">{{$data['mes']}} de {{$data['year']}}</div>
	<div id="next-month-patient" class="next-month"></div>
	<div class="clear"></div>
	<input id="date" hidden value="{{$data['date']}}">
</div>
<table>
	<thead class="background-blue">
		<tr>
			<td>dom</td>
			<td>lun</td>
			<td>mar</td>
			<td>mie</td>
			<td>jue</td>
			<td>vie</td>
			<td>sab</td>
		</tr>
	</thead>
	<tbody>
		<? $firstWeek = true; $day = 1?>
		@for($x = 0; $x < $data['days'] / 7; $x++)
			<tr>
				@for($y = 0; $y < 7; $y++)
					<td class="color-blue">
						@if($firstWeek)
							@if($y == $data['number_first_day'])
								{{'<div class="date-number">'.$day.'</div>'}}
								@if(in_array($day, $data['month_appoinments']))
									<div class="background-blue color_white date"><div class="date-point background-white"></div>{{$day}}Cita</div>
								@endif
								<?$firstWeek = false; $day++;?>
							@endif
						@else
							@if($day <= $data['days'])
								{{'<div class="date-number">'.$day.'</div>'}}@endif
								@if(in_array($day, $data['month_appoinments']))
									<a href="{{asset('appointments_patient/date/'.$day.'-'.$data['month'].'-'.$data['year'])}}">
										<?$contPend = 0; $contAcep = 0;?>
										@foreach($data['appointments'] as $appointment)
											@if($appointment->date == $data['year'].'-'.$data['month_big'].'-'.$day)
												@if($appointment->status == '0')
													<?$contPend++?>
												@elseif($appointment->status == '1')
													<?$contAcep++?>
												@endif
											@endif
										@endforeach
										@if($contAcep > 0)
											<div class="background-blue color_white date-day"><div class="date-point"></div>{{$contAcep}} Aceptadas</div>
										@endif
										@if($contPend > 0)
											<div class="background-blue color_white date-day"><div class="date-point"></div>{{$contPend}} Pendientes</div>
										@endif
									</a>
								@endif
								<?$day++;?>
						@endif
					</td>
				@endfor
			</tr>
		@endfor
	</tbody>

</table>