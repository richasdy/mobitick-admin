<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi3 extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->load->model('m_pemesanan');
	}
	
	public function index()
	{
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->images;
	$data['css'] = $this->css;
	$data['js'] = $this->js;
		
	$this->load->view('mobile/v_verifikasi', $data);
	}
	
	
}