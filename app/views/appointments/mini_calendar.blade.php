<script type="text/javascript">
       	$(function() {
               $("#date").datepicker({ dateFormat: "dd-mm-yy" }).val()
      		});
  		</script>
<div class="background-white">
	<div id="title-month-mini">
		<div id="last-month-mini" class="last-month"></div>
		<div id="" class="color-blue">{{$data['mes']}} de {{$data['year']}}</div>
		<div id="next-month-mini" class="next-month"></div>
		<input id="date" hidden value="{{$data['date']}}">
	</div>
	<table id="table-mini" class="background-white">
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
									<div class="date-number @if($data['workdays'][$y]) {{(strtotime(date('Y-m-d')) < strtotime($data['year'].'-'.$data['month'].'-'.$day))?'available':'not-available'}} @endif">{{$day}} <input hidden value="{{$data['year'].'-'.$data['month'].'-'.$day}}"></div>
									<?$firstWeek = false; $day++;?>
								@endif
							@else
								@if($day <= $data['days'])
									<div class="date-number @if($data['workdays'][$y]) {{(strtotime(date('Y-m-d')) < strtotime($data['year'].'-'.$data['month'].'-'.$day))?'available':'not-available'}} @endif">{{$day}} <input hidden value="{{$data['year'].'-'.$data['month'].'-'.$day}}"></div>
								@endif
								<?$day++;?>
							@endif
						</td>
					@endfor
				</tr>
			@endfor
		</tbody>
	</table>
</div>