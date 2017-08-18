<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller {

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
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->images;
	$data['css'] = $this->css;
	$data['js'] = $this->js;
	$data['plugins'] = $this->plugins;
	$data['query'] = $this->m_reporting->selectTransaksiToday($this->session->userdata('id_user'));
	$data['query2'] = $this->m_reporting->jumlahBus($this->session->userdata('id_user'));
	$data['query3'] = $this->m_reporting->jumlahTrayek($this->session->userdata('id_user'));
	//echo '<pre>'; print_r($data); echo '</pre>';
	$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	
	function telah_login(){
		$is_logged_in = $this->session->userdata('telah_login');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect("", "location");
			return;
			}
		}
	}