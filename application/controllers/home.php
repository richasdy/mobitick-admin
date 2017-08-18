<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	$this->load->view('adminmobitick/v_login', $data);
	}
	
}