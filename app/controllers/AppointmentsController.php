<?php

class AppointmentsController extends BaseController {

	public function index(){
		$today  = date('d-m-Y');
		$month  = date('n', strtotime($today));
		$year   = date('Y', strtotime($today));
		$date   = date('1'.'-'.$month.'-'.$year);
		$data   = $this->calendar($date, 'nothing');
		return View::make('appointments.doctor_appointments')->with('data', $data);	
	}

	public function calendar($date, $parameter){
	
		if($parameter == 'next'){
			$date = date('d-m-Y',strtotime("+1 month", strtotime($date)));
		}else if($parameter  == 'last'){
			$date = date('d-m-Y',strtotime("-1 month", strtotime($date)));
		}else{
			$date = date($date);
		}

		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');

		$data = array();
		$data['date']      = $date;
		$data['month']     = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']       = $meses[$data['month'] - 1];
		$data['year']      = date('Y', strtotime($date));
		$data['day_week']  = date('D', strtotime($date));
		$data['days']      = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
		$data['first_day_month']    = date('1'.'-'.$data['month'].'-'.$data['year']);
		$data['number_first_day']   = date('w', strtotime($data['first_day_month']));
		$data['day_week_first_day'] = date('D', strtotime($data['first_day_month']));
		$data['month_appoinments']  = array();
		$data['appointments']       = array();

		$array        = array('doctorID' => Session::get('id'));
		$response     = App::make('ServiceController')->httpPost($array, 'user/appointments/get_doctor_appointments');
		$appointments = json_decode($response);	

		if($appointments->responseStatus == 'OK'){
			foreach ($appointments->appointments as $appointment){
				$fecha = explode('-', $appointment->date);
				if(($fecha[1]) == $data['month_big'] && $fecha[0] == $data['year']){
					array_push($data['month_appoinments'], $fecha[2]);
					array_push($data['appointments'], $appointment);
				}	
			}
		}else{
			
		}
		//var_dump($data['appointments']);
		return View::make('appointments.calendar')->with('data', $data)->render();
	}

	public function day_dates($date){	

		$dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');
		$date = date('d-m-Y', strtotime($date));
		$data = array();
		$data['month']     = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']       = $meses[$data['month'] - 1];
		$data['year']      = date('Y', strtotime($date));
		$data['day_week']  = date('w', strtotime($date));
		$data['dia']       = $dias[$data['day_week']];
		$data['day_number']      = date('j', strtotime($date));
		$data['day_appoinments'] = array();

		$array = array('doctorID' => Session::get('id'));
		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/get_doctor_appointments');
		$appointments = json_decode($response);

		$worktime = App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/get_doctor_worktime');
		$worktime = json_decode($worktime);
		$data['worktime'] = explode(',',$worktime->doctorWorktime->jsonWorktime);

		if($appointments->responseStatus == 'OK'){
			foreach ($appointments->appointments as $appointment) {
				$fecha = explode('-', $appointment->date);
				if(($fecha[1]) == $data['month_big'] && $fecha[0] == $data['year'] && $fecha[2] == $data['day_number']){
					array_push($data['day_appoinments'], $appointment);
				}	
			}
		}else{
			
		}
		$data['date'] = $date;
		$data['print']['algo'] = $data['day_appoinments'];
		return View::make('appointments.day_dates')->with('data', $data);
	}

	public function accept_appointment(){
		$array = array('doctorID' => Session::get('id'),
					   'userID' => Input::get('userID'),
					   'time'=>Input::get('time'),
					   'date' => Input::get('date'));

		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/accept_appointment');
		// var_dump($response);
		return Redirect::back()->withMessage('hola');
	}

	public function cancel_appointment(){

		$array = array('doctorID' => Session::get('id'),
					   'userID' => Input::get('userID'),
					   'time'=>Input::get('time'),
					   'date' => Input::get('date'));

		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/cancel_appointment');
		// var_dump($response);
		return Redirect::back()->withMessage('hola');
	}

	public function calendar_patient($date, $parameter){

		if($parameter == 'next'){
			$date = date('d-m-Y',strtotime("+1 month", strtotime($date)));
		}else if($parameter  == 'last'){
			$date = date('d-m-Y',strtotime("-1 month", strtotime($date)));
		}else{
			$date = date($date);
		}

		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');

		$data = array();
		$data['date']      = $date;
		$data['month']     = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']       = $meses[$data['month'] - 1];
		$data['year']      = date('Y', strtotime($date));
		$data['day_week']  = date('D', strtotime($date));
		$data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
		$data['first_day_month']    = date('1'.'-'.$data['month'].'-'.$data['year']);
		$data['number_first_day']   = date('w', strtotime($data['first_day_month']));
		$data['day_week_first_day'] = date('D', strtotime($data['first_day_month']));
		$data['month_appoinments']  = array();
		$data['appointments'] = array();

		$array = array('userID' => Session::get('id'));
		// $array = array('userID' => 1);
		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/get_user_appointments');
		$appointments = json_decode($response);	

		if($appointments->responseStatus == 'OK'){
			foreach ($appointments->appointments as $appointment){
				$fecha = explode('-', $appointment->date);
				if(($fecha[1]) == $data['month_big'] && $fecha[0] == $data['year']){
					array_push($data['month_appoinments'], $fecha[2]);
					array_push($data['appointments'], $appointment);
				}	
			}
		}else{
			
		}
		// var_dump($response);
		return View::make('appointments.calendar_patient')->with('data', $data)->render();
	}

	public function appointments_patient(){

		$today = date('d-m-Y');
		$month = date('n', strtotime($today));
		$year  = date('Y', strtotime($today));
		$date  = date('1'.'-'.$month.'-'.$year);
		$data  = $this->calendar_patient($date, 'nothing');
		return View::make('appointments.patient_appointments')->with('data', $data);	
	}

	public function day_dates_patient($date){	

		$dias  = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');
		$date = date('d-m-Y', strtotime($date));
		$data = array();
		$data['month']     = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']       = $meses[$data['month'] - 1];
		$data['year']      = date('Y', strtotime($date));
		$data['day_week']  = date('w', strtotime($date));
		$data['dia']       = $dias[$data['day_week']];
		$data['day_number']      = date('j', strtotime($date));
		$data['day_appoinments'] = array();

		$array = array('userID' => Session::get('id'));
		// $array = array('userID' => 1);
		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/get_user_appointments');
		$appointments = json_decode($response);

		if($appointments->responseStatus == 'OK'){
			foreach ($appointments->appointments as $appointment) {
				$fecha = explode('-', $appointment->date);
				if(($fecha[1]) == $data['month_big'] && $fecha[0] == $data['year'] && $fecha[2] == $data['day_number']){
					array_push($data['day_appoinments'], $appointment);
				}	
			}
		}else{
			
		}
		$data['date'] = $date;
		$data['print']['algo'] = $data['day_appoinments'];
		// return View::make('appointments.day_dates_patient')->with('data', $data);
		return View::make('appointments.day_dates_patient_test')->with('data', $data);
	}

	public function mini_calendar($date, $parameter){

		if($parameter == 'next'){
			$date = date('d-m-Y',strtotime("+1 month", strtotime($date)));
		}else if($parameter  == 'last'){
			$date = date('d-m-Y',strtotime("-1 month", strtotime($date)));
		}else{
			$date = date($date);
		}

		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');

		$data = array();
		$data['date']      = $date;
		$data['month']     = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']       = $meses[$data['month'] - 1];
		$data['year']      = date('Y', strtotime($date));
		$data['day_week']  = date('D', strtotime($date));
		$data['days'] = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);
		$data['first_day_month']    = date('1'.'-'.$data['month'].'-'.$data['year']);
		$data['number_first_day']   = date('w', strtotime($data['first_day_month']));
		$data['day_week_first_day'] = date('D', strtotime($data['first_day_month']));
		$data['month_appoinments']  = array();

		$array = array('doctorID' => Input::get('doctorID'));
		$response = App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/get_doctor_worktime');
		$response = json_decode($response);
		$data['workdays'] = $response->doctorWorktime->jsonWorkdays;
		$data['workdays'] = explode(',', $data['workdays']);
		// var_dump($data['workdays']);
		return View::make('appointments.mini_calendar')->with('data', $data)->render();
	}

	public function get_doctor_availability(){

		$dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
		$meses = array('Enero', 'Febrero',
					   'Marzo', 'Abril',
					   'Mayo', 'Junio',
					   'Julio', 'Agosto',
					   'Septiembre', 'Octubre',
					   'Noviembre', 'Diciembre');

		$array = Input::all();
		$data = array();

		$date            = date('d-m-Y', strtotime($array['date']));
		$data            = array();
		$data['month']   = date('n', strtotime($date));
		$data['month_big'] = date('m', strtotime($date));
		$data['mes']        = $meses[$data['month'] - 1];
		$data['year']       = date('Y', strtotime($date));
		$data['day_week']   = date('w', strtotime($date));
		$data['dia']        = $dias[$data['day_week']];
		$data['day_number'] = date('j', strtotime($date));

		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/get_doctor_availability');
		$response = json_decode($response);

		$data['day_appointments'] = explode(',', $response->appointments);
		return View::make('appointments.mini_calendar_appointments')->with('data', $data)->render();
	}

	public function request_appointment(){
		$array = Input::all();
		//var_dump($array);

		$array['userID'] = Session::get('id');
		//$array['date'] = $array['fecha'];
		$response = App::make('ServiceController')->httpPost($array, 'user/appointments/request_appointment');
		echo $response;
	} 
}
