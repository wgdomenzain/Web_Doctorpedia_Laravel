<?php

class ProfileController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function profile_doctor(){

		$days  = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Sábado', 'Domingo');
		$times = array();
		$data  = array();
		$array = array('email' => Session::get('email'));
		$response = App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/get_doctor_info');
		$response = json_decode($response);
		$data['profile'] = $response->doctorInfo;
		$data['speciality'] = explode(',', $response->doctorInfo->speciality);
		$data['insurance'] = explode(',', $response->doctorInfo->insurance);
		$data['languages'] = explode(',', $response->doctorInfo->languages);
		$data['days'] = "";
		$data['time'] = "";
		$contDays = 0;
		$contTimes = 0;

		for($time = date('H:i', strtotime('00:00')); $time <= date('H:i', strtotime('23:00')) ;){
			array_push($times, $time);
			$time = date('H:i', strtotime(date("H:i", strtotime($time)) . " + 30 minutes"));
		}
		array_push($times, '23:30');

		$intDays  = explode(',', $response->worktime->jsonWorkdays);
		$intTimes = explode(',', $response->worktime->jsonWorktime);
		$flag = false;

		foreach ($intTimes as $time) {
			if($time == 1 && !$flag){
				$data['time'] .= $times[$contTimes].'-';
				$flag = true;
			}else if($time == 0 && $flag){
				$data['time'] .= $times[$contTimes];
				$flag = false;
				$data['time'] .= ' y ';
			}
			$contTimes++;
		}

		foreach ($intDays as $intDay) {
			if($intDay == 1){
				$data['days'] .= $days[$contDays].'-';
			}
			$contDays++;
		}

		$data['days'] = substr($data['days'], 0, -1);
		$data['time'] = substr($data['time'], 0, -2);

		return View::make('profile.profile')->with('data', $data);
	}

	public function profile_patient(){

		$array = array('email' => Session::get('email'));
		$response = App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/get_doctor_info');
		$response = json_decode($response);
		$data = array();
		return View::make('profile.profile_patient')->with('data', $data);
	}

}
