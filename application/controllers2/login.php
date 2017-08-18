<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images = $this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->plugins = $this->config->item('plugins');
		
	}
	
	public function index()
	{
	
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->images;
	$data['css'] = $this->css;
	$data['js'] = $this->js;
	$data['plugins'] = $this->plugins;
	redirect('home');
	
	}
	
	public function login_process()
	{
		$data['u'] = $this->input->post('username');
		$data['p'] = $this->input->post('password');
		$query =  $this->m_login->validasi_login($data);
			if($query){
				$sess_array = array(
				'id_user' => $query->ID,
				'username' => $query->username,
				'nama_user' => $query->nama_po,
				'authority' => $query->authority,
				'telah_login' => TRUE
				);
				$this->session->set_userdata($sess_array);
				redirect('dashboard');
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
		$sess_array = array(
				'id_user' => '',
				'username' => '',
				'nama_user' => '',
				'authority' => '',
				'telah_login' => FALSE
				);
				
		$this->session->unset_userdata($sess_array);
	    $this->session->sess_destroy();
		redirect('','location','301');
	}

	}