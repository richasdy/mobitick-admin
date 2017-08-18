<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi2 extends CI_Controller {

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
	 // load the session library
		$this->load->library('session');
		$this->load->helper(array('captcha','url'));

                $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
                );
    
                 // create captcha image
                $cap = create_captcha($vals);

                // store image html code in a variable
                $data['image'] = $cap['image'];
              
               // store the captcha word in a session
                $this->session->set_userdata('word', $cap['word']);
                
               
			   
	$this->load->view('mobile/v_konfirmasi', $data);
	}
	
	
}