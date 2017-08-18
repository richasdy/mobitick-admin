<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_posisi_kota extends CI_Controller {

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
		$data['query_kota'] = $this->m_track->selectAllDataKota($this->session->userdata('id_user'));
		$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	
	public function input_kota(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_kota'] = $this->input->post('nama_kota');
		$data['latitude'] = $this->input->post('latitude');
		$data['longitude'] = $this->input->post('longitude');
		//echo '<pre>'; print_r($data); echo '</pre>';
		$data['query2'] = $this->m_track->submitKota($data);
		redirect('manage_posisi_kota');
	}
		
	public function update_kota(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_kota'] = $this->input->post('id_kota');
		$data['nama_kota'] = $this->input->post('nama_kota');
		$data['latitude'] = $this->input->post('latitude');
		$data['longitude'] = $this->input->post('longitude');
		//echo '<pre>'; print_r($data); echo '</pre>';
		$data['query2'] = $this->m_track->updateKota($data);
		redirect('manage_posisi_kota');
	}
		
	public function load_editkota($id)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$data['query_kota'] = $this->m_track->selectDataKota($id);
		$this->load->view('adminmobitick/v_edit_kota', $data);
	}
	public function load_deletekota($id)
	{
		$this->telah_login();
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_kota'] = $id;
		
		// Cara mendapatkan ID Trayek Asal dan Baik
		/*
		$data['idTrayekAsal'] = $this->m_track->getIdTrayekAsalnya($data);
		$data['idTrayekBalik'] = $this->m_track->getIdTrayekBaliknya($data);
		$data['id_trayek_asal'] = $data['idTrayekAsal']->ID_trayek;
		$data['id_trayek_balik'] = $data['idTrayekBalik']->ID_trayek;
		*/
		// echo '<pre>'; print_r($data); echo '</pre>';
		$data['query_kota'] = $this->m_track->deleteKota($data);
		redirect('manage_posisi_kota');
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