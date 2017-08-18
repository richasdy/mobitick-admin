<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesantiket2 extends CI_Controller {

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
	$this->load->view('mobile/v_pesantiket', $data);
	}
	
	public function input_pemesanan_tiket(){
		
		$data['jumlah_penumpang'] = $this->input->post('jumlah_penumpang');
		$data['id_jadwalbus'] = $this->input->post('id_jadwalbus');
		$data['nama_pemesan'] = $this->input->post('nama_pemesan');
		$data['no_tlp'] = $this->input->post('no_tlp');
		$data['nama_penumpang1'] = $this->input->post('nama_penumpang1');
		$data['no_kursi1'] = $this->input->post('no_kursi1');
		$data['nama_penumpang2'] = $this->input->post('nama_penumpang2');
		$data['no_kursi2'] = $this->input->post('no_kursi2');
		$data['nama_penumpang3'] = $this->input->post('nama_penumpang3');
		$data['no_kursi3'] = $this->input->post('no_kursi3');
		$data['status'] = 'booking';
		$data['kode_pemesanan'] = $this->input->post('kode_pemesanan');
		$data['harga'] = $this->input->post('harga');
		$data['tgl_pemesanan'] = date("Y-m-d");
		
		if($data['jumlah_penumpang']==1){
		$query = $this->m_pemesanan->InputSatuPenumpang($data);
		//echo 'Terima Kasih! Kode Verifikasi Pemesanan Anda '.$data['kode_pemesanan'];
		}elseif($data['jumlah_penumpang']==2){
		$query = $this->m_pemesanan->InputDuaPenumpang($data);
		//echo 'Terima Kasih! Kode Verifikasi Pemesanan Anda '.$data['kode_pemesanan'];
		}elseif($data['jumlah_penumpang']==3){
		$query = $this->m_pemesanan->InputTigaPenumpang($data);
		//echo 'Terima Kasih! Kode Verifikasi Pemesanan Anda '.$data['kode_pemesanan'];
		}else{ echo'error';}
	//	print_r ($data);
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->base_url.'liva/images';
		$data['css'] = $this->base_url.'liva/css';
		$data['js'] = $this->base_url.'liva/js';
		$this->load->view('mobile/v_pesantiket_oke', $data);	
	}
	
}