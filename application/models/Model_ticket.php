<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ticket extends CI_Model {

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

	public function listTicket($user_id,$user=null,$isi=null,$tanggal=null){
		$userid_l = !empty($user_id)?" and t.ticket_user=".$user_id:'';
		$user_l = !empty($user)?" and us.user_name like '%".$user."%'":'';
		$isi_l = !empty($isi)?" and t.ticket_problem like '%".$isi."%'":'';
		$tanggal_l = !empty($tanggal)?" and date(us.created_date)=date('".$tanggal."')":'';

		$add = '';
		if(!empty($user) || !empty($isi) || !empty($tanggal) || !empty($user_id)){
			$add = $user_l.$isi_l.$tanggal_l.$userid_l;
		}

		$query = $this->db->query("
			select 
				t.*,us.user_name 
			from 
				ticket t join 
					(select 
						ud.*,
						u.user_username,
						u.user_password 
					from 
						user_detail ud
					join 
						users u 
						on u.user_id = ud.user_id
					) as us on t.ticket_user = us.user_id 
			where t.is_delete=0 ". $add ."
			order by t.created_date desc
		");

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}

	public function newTicket(){
		$id = $this->lastIdTicket();
		$ticket_user = $this->input->post('ticket_user');
		$ticket_problem = $this->input->post('ticket_problem');
		$ticket_priority = $this->input->post('ticket_priority');

		if($this->check_user($ticket_user)){
			$insert = $this->db->insert('ticket',array(
				'id'=>$id,
				'ticket_user'=>$ticket_user,
				'ticket_problem'=>$ticket_problem,
				'ticket_priority'=>$ticket_priority,
				'ticket_status'=>'NEW',
				'created_by'=>$ticket_user,
				'update_by'=>$ticket_user
			));

			if($insert){
				return array(
					'success'=>true,
					'message'=>'Berhasil menambahkan data Tiket',
					'data'=>array()
				);
			}else{
				return array(
					'success'=>false,
					'message'=>'Gagal menambahkan data tiket',
					'data'=>array()
				);
			}
		}else{
			return array(
				'success'=>false,
				'message'=>'Data user tidak ditemukan',
				'data'=>array()
			);
		}
	}

	public function lastIdTicket(){
		$query = $this->db->query("select max(id) as id from ticket");
		if($query->num_rows()>0){
			$id = $query->row()->id;
			if(empty($id)){
				return (int)1;
			}else{
				return (int)$id+1;
			}
		}else{
			return null;
		}
	}

	public function check_user($user_id = null){
		$query = $this->db->get_where('users',array('user_id'=>$user_id));

		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function delTicket($id=null){
		if(!empty($id)){

			$query = $this->db->where('id',$id)->update('ticket',array(
				'is_delete'=>1
			));

			if($query){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
