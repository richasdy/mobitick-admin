<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kendaraan extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images =$this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_kendaraan');
	}
	
	function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		// cara manggil data
		$data['query'] = $this->m_kendaraan->selectAllKendaraan();
		$this->load->view('v_index', $data);
	}	
	
	function tambah_kendaraan ()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_kendaraan->getDataKendaraan();
		$this->load->view('v_index', $data);		
	}
	
	function proses_tambah_kendaraan()
	{
		$data['nama_bus'] = $this->input->post('nama_bus');
		$data['id_tipebusnya'] = $this->input->post('id_tipebusnya');
		$data['nama_supir'] = $this->input->post('nama_supir');
		$data['no_polisi'] = $this->input->post('no_polisi');
	
		//print_r ($data);
		$query = $this->m_kendaraan->Inputkendaraan($data);
		echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='kelola_kendaraan'
		</script>";
		// redirect 
		redirect('c_kendaraan/kelola_kendaraan','refresh');
	}
	
	function update_kendaraan($id) 
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		
		$data['query'] = $this->m_kendaraan->selectDatakendaraan($id);
		$data['query2'] = $this->m_kendaraan->getDatakendaraan();
		$this->load->view('v_form_update_kendaraan',$data);   	
	}
	
	function kelola_kendaraan ()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_kendaraan->selectAllkendaraan();
		$data['query2'] = $this->m_kendaraan->getDataKendaraan();
		$this->load->view('v_index', $data);		
	}
	
	function load_kendaraan ()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query'] = $this->m_kendaraan->selectAllkendaraan();
		$data['query2'] = $this->m_kendaraan->getDataKendaraan();
		$this->load->view('kendaraan/v_kendaraan',$data);
	}
	
	function edit_kendaraan()
	{
		$data['id_bus'] = $this->input->post('id_bus');
		$data['nama_bus'] = $this->input->post('nama_bus');
		$data['id_tipebus'] = $this->input->post('id_tipebus');
		$data['nama_supir'] = $this->input->post('nama_supir');
		$data['no_polisi'] = $this->input->post('no_polisi');
		
		//print_r ($data);
		$query = $this->m_kendaraan->Updatekendaraan($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='kelola_kendaraan'
		</script>";
		// redirect 
		redirect('c_kendaraan/kelola_kendaraan','refresh');
	}
	
	function delete_kendaraan ($id) 
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$query = $this->m_kendaraan->DeleteKendaraan($id);
		redirect('c_kendaraan/kelola_kendaraan','refresh');		
	}
	
	function update_tipebus($id)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		$data['query'] = $this->m_kendaraan->selectDataTipeBus($id);
		$this->load->view('v_form_update_tipebus',$data);   	
	}
	
	function data_tipebus ()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$this->load->view('v_index',$data);
	}
	
	function load_tipebus ()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$data['query2'] = $this->m_kendaraan->getDataKendaraan();
		$this->load->view('kendaraan/v_tipebus',$data);
	}
	
	function proses_update_tipebus()
	{
		$data['id_tipebus'] = $this->input->post('id_tipebus');
		$data['nama_tipe'] = $this->input->post('nama_tipe');
		$data['harga'] = $this->input->post('harga');
		$data['jumlah_kursi'] = $this->input->post('jumlah_kursi');
		
		//print_r ($data);
		$query = $this->m_kendaraan->UpdateTipeBus($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='data_tipebus'
		</script>";
		// redirect 
		redirect('c_kendaraan/data_tipebus','refresh');
	}
	

	function proses_tambah_tipebus()
	{
		$data['nama_tipe'] = $this->input->post('nama_tipe');
		$data['harga'] = $this->input->post('harga');
		$data['jumlah_kursi'] = $this->input->post('jumlah_kursi');
		
		//print_r ($data);
		$query = $this->m_kendaraan->InputTipeBus($data);
		echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='data_tipebus'
		</script>";
		// redirect 
		redirect('c_kendaraan/data_tipebus','refresh');
	}
	function delete_tipebus ($id) 
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$query = $this->m_kendaraan->DeleteTipeBus($id);
		
		redirect('c_kendaraan/data_tipebus','refresh');		
	}
}
?>