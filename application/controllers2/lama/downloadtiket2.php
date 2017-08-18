<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Downloadtiket2 extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images =$this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_pemesanan');
	}
	
	public function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		
		$this->load->view('konfirmasi/v_download_tiket', $data);
	}
	
	
	
}