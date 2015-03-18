<?php

class SearchController extends BaseController {

	public function index(){
		// $data = App::make('ServiceController')->httpGetDocScan('user/get/doctorlist');
		// $data = json_decode($data);
		$data = '';
		return View::make('search.search_container')->with('data', $data);
	}

	public function doctor_list(){
		$data = App::make('ServiceController')->httpGetDocScan('user/get/doctorlist');
		return $data;
	}
}
