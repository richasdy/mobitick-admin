<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_konfirmasi extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images =$this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_konfirmasi');
	
	}
	
	function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		// cara manggil data
		$data['query'] = $this->m_konfirmasi->selectAllKonfirmasi();
		$this->load->view('v_index', $data);
	}	
	
	function kelola_konfirmasi () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$data['query'] = $this->m_konfirmasi->selectAllKonfirmasi();
		$this->load->view('v_index', $data);		
	}
	
	function update_konfirmasi($id) {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		
		$data['query'] = $this->m_konfirmasi->selectDataKonfirmasi($id);
		$data['query2'] = $this->m_konfirmasi->getDataKonfirmasi();
		$this->load->view('v_form_update_konfirmasi',$data);   	
	}
	
	function load_konfirmasi () {
	
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_konfirmasi->selectAllkonfirmasi();
		$this->load->view('konfirmasi/v_konfirmasi',$data);
	}
	
	function edit_konfirmasi(){
		$data['id_konfirmasi'] = $this->input->post('id_bus');
		$data['kode_pemesanannya'] = $this->input->post('kode_pemesanannya');
		$data['bukti_bayar'] = $this->input->post('bukti_bayar');
		$data['ket_lain'] = $this->input->post('ket_lain');
		
		
		//print_r ($data);
		$query = $this->m_konfirmasi->UpdateKonfirmasi($data);
		// redirect 
		redirect('c_konfirmasi/kelola_konfirmasi','refresh');
	}
	
	function proses_update_konfirmasi(){
		$data['log_admin'] = $this->input->post('log_admin');
		$data['kode_pemesanan'] = $this->input->post('kode_pemesanan');
		$data['status'] = $this->input->post('status');
		$data['id_konfirmasi'] = $this->input->post('id_konfirmasi');
		
	//print_r ($data);
	$query = $this->m_konfirmasi->UpdateKonfirmasinya($data);
	// redirect 
	echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='kelola_konfirmasi'
		</script>";
	
	}

}
?>