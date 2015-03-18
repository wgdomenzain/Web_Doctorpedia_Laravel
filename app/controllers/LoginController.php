<?php

class LoginController extends BaseController {

	public function login_doctor(){
		
		$array = Input::all();
		
		// Manda a llamar al servicio web
		$response = App::make('ServiceController')->httpPost($array, 'doctor/auth_doctor/login');
		$response = json_decode($response);
		if($response->responseStatus == 'OK'){
			Session::put('profile', 'doctor');
			Session::put('email', $response->doctorInfo->email);
			Session::put('id',$response->doctorInfo->id);
			//Session::put('id', );
			Session::put('name',$response->doctorInfo->name);
			Session::put('photo', 'perfil.jpg');
			return Redirect::to('/');
		}else{
			Session::flash('msg_error', 'Correo o contraseña incorrecta');
			return Redirect::to('/');
		}
	}

	public function login_paciente(){
		
		$array = Input::all();

		// Manda a llamar al servicio web
		$response = App::make('ServiceController')->httpPost($array, 'user/auth_user/login');
		$response = json_decode($response);
		if($response->responseStatus == 'OK'){
			Session::put('profile', 'patient');
			Session::put('email', $response->userInfo->email);
			Session::put('id',$response->userInfo->id);
			Session::put('name',$response->userInfo->name);
			Session::put('photo', 'perfil.jpg');
			return Redirect::to('/');
		}else{
			Session::flash('msg_error', 'Correo o contraseña incorrecta');
			return Redirect::to('/');
		}
	}

	public function logout(){
		Session::flush();
		return Redirect::to('/');
	}

}
