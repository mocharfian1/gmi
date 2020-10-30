<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

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

		$this->load->model('model_ticket');
		$createTicket = $this->model_ticket->newTicket();

		echo json_encode($createTicket);
	}

	public function getTickets(){
		header('Content-Type: application/json');

		$isi = $this->input->get('isi');
		$user = $this->input->get('user_name');
		$user_id = $this->input->get('user_id');
		$tanggal = $this->input->get('tanggal');

		$this->load->model('model_ticket');
		$getTicket = $this->model_ticket->listTicket($user_id,$user,$isi,$tanggal);

		echo json_encode(array(
			'success'=>true,
			'message'=>'Berhasil mendapatkan list',
			'count'=>count($getTicket),
			'data'=>$getTicket
		));
		
	}

	public function deleteTicket(){
		header('Content-Type: application/json');

		$id = $this->input->post('id');

		$this->load->model('model_ticket');
		$delTicket = $this->model_ticket->delTicket($id);

		if($delTicket){
			echo json_encode(array(
				'success'=>true,
				'message'=>'Berhasil menghapus Ticket'
			));
		}else{
			echo json_encode(array(
				'success'=>false,
				'message'=>'Gagal menghapus Ticket'
			));
		}
		
	}
}
