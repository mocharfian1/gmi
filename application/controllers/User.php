<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		
	}

	public function new(){
		header('Content-Type: application/json');

		$this->load->model('model_user');
		$createUser = $this->model_user->newUser();

		if($createUser){
			echo json_encode(array(
				'success'=>true,
				'message'=>'Sukses Menambah User',
				'data'=>array()
			));
		}else{
			echo json_encode(array(
				'success'=>false,
				'message'=>'Gagal Menambah User',
				'data'=>array()
			));
		}
	}

	public function getUser(){
		header('Content-Type: application/json');

		$id = $this->input->get('id');

		$this->load->model('model_user');
		$getUser = $this->model_user->getUser($id);

		echo json_encode(array(
			'success'=>true,
			'message'=>'Berhasil mendapatkan list',
			'count'=>count($getUser),
			'data'=>$getUser
		));
		
	}

	public function deleteUser(){
		header('Content-Type: application/json');

		$id = $this->input->post('id');

		$this->load->model('model_user');
		$deluser = $this->model_user->delUser($id);

		if($deluser){
			echo json_encode(array(
				'success'=>true,
				'message'=>'Berhasil menghapus User'
			));
		}else{
			echo json_encode(array(
				'success'=>false,
				'message'=>'Gagal menghapus User'
			));
		}
		
	}
}
