<?php

class CommentsController extends BaseController {

	public function index(){

		$data = array();
		$data['available'] = array();
		array_push($data['available'], array('nombre' => 'Alvaro Zetina'));
		array_push($data['available'], array('nombre' => 'Cesarin Gzl'));
		array_push($data['available'], array('nombre' => 'Imanol Lasa'));
		return View::make('comments.comments')->with('data', $data);
	}
}
