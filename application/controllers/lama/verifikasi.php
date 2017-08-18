<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->load->model('m_pemesanan');
	}
	
	public function index()
	{
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->base_url.'liva/images';
	$data['css'] = $this->base_url.'liva/css';
	$data['js'] = $this->base_url.'liva/js';
	$this->load->view('home/v_verifikasi', $data);
	}
		
}