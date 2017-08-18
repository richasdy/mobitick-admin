<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_bus extends CI_Controller {

	function __construct() {
	parent::__construct();
		
		$this->base_url = $this->config->item('base_url');
		$this->images = $this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->plugins = $this->config->item('plugins');
		$this->telah_login();
		
	}
	
	public function index()
	{
		$this->telah_login();
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$data['query'] = $this->m_track->selectAllBus($this->session->userdata('id_user'));
		$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	
	public function input_bus()
	{
		$data['id_user'] = $this->session->userdata('id_user');
		$data['plat_nomer'] = $this->input->post('plat_nomer');
		$data['query'] = $this->m_bus->submitBus($data);
		redirect("manage_bus");
	}
	public function update_bus()
	{
		$data['id_user'] = $this->session->userdata('id_user');
		$data['plat_nomer'] = $this->input->post('plat_nomer');
		$data['id_bus'] = $this->input->post('id_bus');
		$data['query'] = $this->m_bus->updateBus($data);
		redirect("manage_bus");
	}
	public function load_editbus($id){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_bus'] = $id;
		$data['query'] = $this->m_bus->selectBus($data);
		$this->load->view('adminmobitick/v_edit_bus', $data);
	}
	public function deletebus($id){
		$this->telah_login();
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_bus'] = $id;
		$data['query'] = $this->m_bus->deleteBus($data);
		redirect("manage_bus");
	}
	public function load_addtrack(){
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$this->load->view('adminmobitick/v_add_track',$data);
	}
	
	
	function telah_login(){
		$is_logged_in = $this->session->userdata('telah_login');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect("login");
			return;
			}
	}
	
}