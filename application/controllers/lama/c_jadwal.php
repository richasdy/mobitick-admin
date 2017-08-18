<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_jadwal extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images =$this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_jadwal');
		$this->load->model('m_kendaraan');
	
	}
	
	function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		// cara manggil data
		$data['query'] = $this->m_jadwal->selectAllJadwal();
		$this->load->view('v_index', $data);
	}	
	
	function kelola_jadwal () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_jadwal->selectAllJadwal();
		$this->load->view('v_index', $data);		
	}
	
	function kelola_rute() {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_jadwal->selectAllRute();
		$this->load->view('v_index', $data);		
	}
	
	function tambah_jadwal () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query1'] = $this->m_kendaraan->selectAllKendaraan();
		
		$data['query4'] = $this->m_jadwal->selectAllRute();
		$this->load->view('v_index', $data);		
	}
	
	function update_jadwal($id) {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		$data['query'] = $this->m_jadwal->selectDataJadwal($id);
		$data['query1'] = $this->m_kendaraan->selectAllKendaraan();
		
		$data['query4'] = $this->m_jadwal->selectAllRute();
		$this->load->view('v_form_update_jadwal',$data);   	
	}
	
	function update_rute($id) {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		$data['query'] = $this->m_jadwal->selectRute($id);
		$this->load->view('v_form_update_rute',$data);   	
	}
	
	
	
	function load_jadwal () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_jadwal->selectAllJadwal();
		$this->load->view('jadwal/v_jadwal',$data);
	}
	

	
	function load_rute () {
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_jadwal->selectAllRute();
		$this->load->view('jadwal/v_rute',$data);
	}
	
	
	
	function edit_jadwal(){
		$data['id_busnya'] = $this->input->post('id_busnya');
		$data['id_jadwalbus'] = $this->input->post('id_jadwalbus');
		$tgl = explode ("-", $this->input->post('tgl_keberangkatan'));
		$data[1] = $tgl[0];
		$data[2] = $tgl[1];
		$data[3] = $tgl[2];
		$data['tgl_keberangkatan'] = date("$data[3]-$data[2]-$data[1]");
		$data['jam_keberangkatan'] = $this->input->post('jam_keberangkatan');
		$data['id_rutenya'] = $this->input->post('id_rutenya');
		$data['id_rute'] = $data['id_rutenya'];
		
		//print_r ($data);
		$query2 =  $this->m_jadwal->validasi_jadwal($data);
			if($query2){
				echo "<script language=javascript>
				alert('Maaf, Data Sudah Ada!')
				window.location.href='kelola_jadwal'
				</script>";
				redirect('c_jadwal/kelola_jadwal','refresh');
		
				
			}
			else{
				$query = $this->m_jadwal->UpdateJadwal($data);
				echo "<script language=javascript>
				alert('Data Berhasil Diubah!')
				window.location.href='kelola_jadwal'
				</script>";		
				redirect('c_jadwal/kelola_jadwal','refresh');
			}
		
	}
	
	function proses_tambah_jadwal(){
		$tgl = explode ("-", $this->input->post('tgl_keberangkatan'));
		$data[1] = $tgl[0];
		$data[2] = $tgl[1];
		$data[3] = $tgl[2];
		$data['tgl_keberangkatan'] = date("$data[3]-$data[2]-$data[1]");
		$data['id_busnya'] = $this->input->post('id_busnya');
		$data['jam'] = $this->input->post('jam');
		$data['id_rute'] = $this->input->post('id_rute');
		
	//print_r ($data);
		$query2 =  $this->m_jadwal->validasi_jadwal($data);
			if($query2){
			echo "<script language=javascript>
			alert('Maaf, Data Sudah Ada!')
			window.location.href='kelola_jadwal'
			</script>";
			redirect('c_jadwal/kelola_jadwal','refresh');
		
			}
			else{
			
			$query = $this->m_jadwal->InputJadwal($data);
			echo "<script language=javascript>
			alert('Data Berhasil Ditambah!')
			window.location.href='kelola_jadwal'
			</script>";
			redirect('c_jadwal/kelola_jadwal','refresh');
		
			
	
			}
		$query = $this->m_jadwal->InputJadwal($data);
		echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='kelola_jadwal'
		</script>";
		redirect('c_jadwal/kelola_jadwal','refresh');
	}
	
	
	function proses_tambah_rute(){
		$data['nama_pool'] = $this->input->post('nama_pool');
		$data['tlp_pool'] = $this->input->post('tlp_pool');
		$data['jam_berangkatbus'] = $this->input->post('jam_berangkatbus');
		$data['kota_awal'] = $this->input->post('kota_awal');
		$data['lokasi_keberangkatan'] = $this->input->post('lokasi_keberangkatan');
		$data['kota_akhir'] = $this->input->post('kota_akhir');
		
	//print_r ($data);
		$query = $this->m_jadwal->InputRute($data);
		echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='kelola_rute'
		</script>";
		redirect('c_jadwal/kelola_rute','refresh');
	}
	
	function proses_update_rute(){
		$data['nama_pool'] = $this->input->post('nama_pool');
		$data['tlp_pool'] = $this->input->post('tlp_pool');
		$data['jam_berangkatbus'] = $this->input->post('jam_berangkatbus');
		$data['id_rute'] = $this->input->post('id_rute');
		$data['kota_awal'] = $this->input->post('kota_awal');
		$data['kota_akhir'] = $this->input->post('kota_akhir');
		$data['lokasi_keberangkatan'] = $this->input->post('lokasi_keberangkatan');
		
	//print_r ($data);
		$query = $this->m_jadwal->UpdateRute($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='kelola_rute'
		</script>";
		redirect('c_jadwal/kelola_rute','refresh');
	}
	
	function delete_jadwal ($id) {
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;
	$query = $this->m_jadwal->DeleteJadwal($id);
	redirect('c_jadwal/kelola_jadwal','refresh');		
	}
	
	
	function delete_rute ($id) {
	$data['base_url'] = $this->base_url;
	$data['images'] = '../'.$this->images;
	$data['css'] = '../'.$this->css;
	$data['js'] = '../'.$this->js;
	$query = $this->m_jadwal->DeleteRute($id);
	redirect('c_jadwal/kelola_rute','refresh');		
	}
}
?>