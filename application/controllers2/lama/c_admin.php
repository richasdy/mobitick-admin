<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images = $this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_login');
		$this->load->model('m_pemesanan');
		$this->load->model('m_user');
		$this->telah_login();
	}
	
	public function index()
	{
	
	$data['base_url'] = $this->base_url;
	$data['images'] = $this->images;
	$data['css'] = $this->css;
	$data['js'] = $this->js;
	
	$data['query'] = $this->m_pemesanan->selectAllPemesanan();
	$this->load->view('v_index', $data);
	
	}
	
	function data_pemesanan(){
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;	
	
	$data['query'] = $this->m_pemesanan->selectAllPemesanan();
	
	$this->load->view('v_index',$data);
	  
	}
	
	function kelola_user(){
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;	
	
	$data['query'] = $this->m_user->selectAllUser();
	
	$this->load->view('v_index',$data);   
	}

	function kelola_konfirmasi(){
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;
	
	$data['query'] = $this->m_konfirmasi->selectAllVerifikasi();
	
	$this->load->view('v_index',$data);   
	}
	
	function kelola_kendaraan(){
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;	
	
	$data['query'] = $this->m_kendaraan->selectAllKendaraan();
	
	$this->load->view('v_index',$data);   
	}
	
	function kelola_jadwal(){
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;	

	$this->load->view('v_index',$data);   
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