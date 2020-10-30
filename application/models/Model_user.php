<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

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

	public function newUser(){
		$user_username = $this->input->post('user_username');
		$user_password = $this->input->post('user_password');
		$user_name = $this->input->post('user_name');
		$user_birthdate = $this->input->post('user_birthdate');
		$user_gender = $this->input->post('user_gender');
		$user_address = $this->input->post('user_address');

		$id = $this->lastIdUser();
		$id_detail = $this->lastIdUserDetail();
		$check_username = $this->check_username($user_username);

		if($check_username){
			$success = false;

			$query = $this->db->insert('users',array(
				'user_id'=>$id,
				'user_password'=>md5($user_password),
				'user_username'=>$user_username
			));

			if($query){
				$success = true;

				$query_detail = $this->db->insert('user_detail',array(
					'id'=>$id_detail,
					'user_id'=>$id,
					'user_name'=>$user_name,
					'user_birthdate'=>$user_birthdate,
					'user_gender'=>$user_gender,
					'user_address'=>$user_address
				));

				if($query_detail){
					$success = true;
				}else{
					$success = false;
				}
			}else{
				$success = false;
			}


			return $success;
		}else{
			return false;
		}

	}

	public function lastIdUser(){
		$query = $this->db->query("select max(user_id) as id from users");
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

	public function lastIdUserDetail(){
		$query = $this->db->query("select max(id) as id from user_detail");
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

	public function check_username($username=null){
		$query = $this->db->get_where('users',array('user_username'=>$username));
		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}

	public function getUser($id=null){

		$this->db->where('is_delete',0);

		if(!empty($id)){
			$this->db->where('user_id',$id);
		}
		$query = $this->db->select('*')
							->from('users')
							->order_by('created_date','desc')
							->get();


		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}

	public function delUser($id=null){
		if(!empty($id)){
			$query = $this->db->where('user_id',$id)->update('users',array(
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
