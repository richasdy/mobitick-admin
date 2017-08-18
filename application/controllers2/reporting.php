<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporting extends CI_Controller {

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
		$data['query'] = $this->m_reporting->selectAllTransaksi($this->session->userdata('id_user'));
		$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	public function load_detailrute($id){
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$data['id_trayek_maju'] = $id;
		$data['id_trayek_balik'] = $id+1;
		$data['id_user'] = $this->session->userdata('id_user');
		$data['maju'] = $this->m_track->selectDetailRuteMaju($data);
		$data['balik'] = $this->m_track->selectDetailRuteBalik($data);
		$data['trayek'] = $this->m_track->selectRute($id);
		$this->load->view('adminmobitick/v_detail_rute', $data);
	}
	public function load_addtrack(){
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$this->load->view('adminmobitick/v_add_track',$data);
	}
	
	public function input_track(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_trayek_asal'] = $this->input->post('pool_asal');
		$data['id_trayek_tujuan'] = $this->input->post('pool_tujuan');
		$data['maju'] = $this->input->post('jlh_trayekmaju');
		$data['balik'] = $this->input->post('jlh_trayekbalik');
		
		
		//echo '<pre>'; print_r($data); echo '</pre>';
		$data['query2'] = $this->m_track->submitHargaLokasiTrayek($data);

		redirect('manage_track');
		
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