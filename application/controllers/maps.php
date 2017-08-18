<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maps extends CI_Controller {

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
	$data['query'] = $this->m_bus->selectAllBusMap($this->session->userdata('id_user'));
	//echo '<pre>'; print_r($data); echo '</pre>';
	$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	
	
	}