<?php

class RegisterController extends BaseController {



	public function index()
	{
		return View::make('Inicio.inicio');
	}

	public function register_doctor(){

		$array = Input::all();

		if(isset($array['especialidades'])){
			$array['speciality'] = implode(",", $array['especialidades']);
		}
		if(isset($array['idiomas'])){
			$array['languages'] = implode(",", $array['idiomas']);
		}
		if(isset($array['aseguradoras'])){	
			$array['insurance'] = implode(",", $array['aseguradoras']);
		}
		$array['pushToken'] = 'web-user';

		//Obtiene el estado
		$result_map =  App::make('ServiceController')->httpGet('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$array['lat'].','.$array['lng'].'&sensor=false');
		$result_map = json_decode($result_map);
		$array['state'] = $result_map->results[0]->address_components[3]->long_name;

		//Manda a llamar al servicio web
		$response =  App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/register');
		$response = json_decode($response);

		if($response->responseStatus == 'OK'){
			Session::put('profile','doctor');
			Session::put('id',$response->doctorInfo->id);
			Session::put('name',$response->doctorInfo->name);
			echo 'true';
		}else{
			switch ($response->responseStatus) {
				case "NOK3":
					echo 'false';
				break;
				case "NOK2":
					echo 'false';
				break;
				case "NOK1":
					echo 'false';
				break;
			}
		}
		// {"doctorInfo":{"id":"45","name":"Alvaro","surname1":"Zetina","surname2":"Ayala","gender":"1","phone":"1232131","email":"alvaro_za1@hotmail.com","address1":"algo","address2":"algo","state":"Jalisco","lat":"20.695597499999998","lng":"-103.42208590000001","speciality":"Alergolog\u00eda e inmunolog\u00eda pedi\u00e1trica,Algolog\u00eda","languages":"Alem\u00e1n,Chino,Espa\u00f1ol","insurance":"GNP,Inbursa,Metlife","rating":"0","credential":"cedula","details":"detalles"},"responseStatus":"OK"}
	}

	public function update_doctor(){
		$array = Input::all();

		$array['email'] = Session::get('email');

		if(isset($array['especialidades'])){
			$array['speciality'] = implode(",", $array['especialidades']);
		}
		if(isset($array['idiomas'])){
			$array['languages'] = implode(",", $array['idiomas']);
		}
		if(isset($array['aseguradoras'])){	
			$array['insurance'] = implode(",", $array['aseguradoras']);
		}
		$array['pushToken'] = 'web-user';
		//Obtiene el estado
		$result_map =  App::make('ServiceController')->httpGet('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$array['lat'].','.$array['lng'].'&sensor=false');
		$result_map = json_decode($result_map);
		$array['state'] = $result_map->results[0]->address_components[3]->long_name;

		// Manda a llamar al servicio web
		$response =  App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/update');
		$response = json_decode($response);

		return Redirect::to('profile');
	}

	public function register_schedule(){
		
		$array = Input::all();

		$post['doctorID'] = Session::get('id');
		$post['jsonWorktime'] = implode(",", $array['time']);
		$post['jsonWorkdays'] =implode(",", $array['week']);

		// Manda a llamar al servicio web
		$response =  App::make('ServiceController')->httpPost($post, 'doctor/auth_doctor/set_worktime');
		// echo $response;
		// $response = (string) $response;
		// var_dump($response);
		if($response == 'OK'){
			return Redirect::to('/');
		}else{
			
		}

		//OK
	}

	public function register_paciente(){
		
		$array = Input::all();
		$array['pushToken'] = 'web-user';

		// Manda a llamar al servicio web
		$response = App::make('ServiceController')->httpPost($array, 'user/auth_user/register');
		$response = json_decode($response);

		if($response->responseStatus == 'OK'){
			Session::put('profile', 'patient');
			Session::put('id',$response->userInfo->id);
			Session::put('name',$response->userInfo->name);
			return Redirect::to('/');
		}else{
			switch ($response->responseStatus) {
				case "NOK3":
					Session::flash('msg_error', 'Usuario existente');
				break;
				case "NOK2":
					Session::flash('msg_error', 'Formato de correo incorrecto');
				break;
				case "NOK1":
					Session::flash('msg_error', 'Faltan parámetros');
				break;
			}
			return Redirect::to('/');
		}

		// {"userInfo":{"id":"13","name":"Alvaro","surname1":"Zetina","surname2":"Ayala","email":"alvaro_za1@hotmail.com","phone":"3316051528","birthdate":"2015-02-08"},"responseStatus":"OK"}
	}

}
