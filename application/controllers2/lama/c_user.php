<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images =$this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_user');
	
	}
	
	function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		// cara manggil data
		$data['query'] = $this->m_user->selectAllUser();
		$this->load->view('v_index', $data);
	}	
	
	function kelola_user () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$data['query'] = $this->m_user->selectAllUser();
		$this->load->view('v_index', $data);		
	}
	
	function tambah_user () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$this->load->view('v_index', $data);		
	}
	
	function update_user($id) {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		
		$data['query'] = $this->m_user->selectDataUser($id);
		$data['query2'] = $this->m_user->getDataUser();
		$this->load->view('v_form_update_user',$data);   	
	}
	
	function load_user () {
	
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_user->selectAllUser();
		$this->load->view('user/v_user',$data);
	}
	
	function edit_user(){
		$data['id_admin'] = $this->input->post('id_admin');
		$data['nama_admin'] = $this->input->post('nama_admin');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['status_admin'] = $this->input->post('status_admin');
		
		//print_r ($data);
		$query = $this->m_user->UpdateUser($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='kelola_user'
		</script>";
		// redirect 
		//redirect('c_user/kelola_user','refresh');
	}
	
	function proses_tambah_user(){
		$data['nama_admin'] = $this->input->post('nama_admin');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['status_admin'] = $this->input->post('status_admin');
	
	//print_r ($data);
	$query = $this->m_user->InputUser($data);
	echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='kelola_user'
		</script>";
	// redirect 
	//redirect('c_user/kelola_user','refresh');
	}
	
	function delete_user ($id) {
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;
	$query = $this->m_user->DeleteUser($id);
	redirect('c_user/kelola_user','refresh');		
	}
}
