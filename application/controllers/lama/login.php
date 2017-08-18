<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		
		$this->load->model('m_login');
	}
	
	public function index()
	{
	
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->base_url.'liva/images';
	$data['css'] = $this->base_url.'liva/css';
	$data['js'] = $this->base_url.'liva/js';
	$this->load->view('home/v_login',$data);
	
	}
	
	public function login_process()
	{
		$data['u'] = $this->input->post('username');
		$data['p'] = $this->input->post('password');
		$query =  $this->m_login->validasi_login($data);
			if($query){
				$data = array(
				'id_admin' => $query->id_admin,
				'username' => $query->username,
				'nama' => $query->nama_admin,
				'status_admin' => $query->status_admin,
				'telah_login' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('c_admin/data_pemesanan');
			}
			else
			{
				
				echo '
				<script>
				alert("Username dan Password Salah!"); 
				window.history.go(-1);
				</script>
				';
				
			}
		}
	
	public function f_logout(){
		
		$this->session->sess_destroy();
		redirect('','location','301');
	}

	}