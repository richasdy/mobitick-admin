<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pemesanan extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images = $this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_pemesanan');
		$this->load->model('m_kendaraan');

	}
	
	function index()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		
		// cara manggil data
		$data['query'] = $this->m_pemesanan->selectAllPemesanan();
		
		$this->load->view('v_index', $data);	
	}	
	
	function data_pemesanan()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;	
		
		$data['query'] = $this->m_pemesanan->selectAllPemesanan();
		
		$this->load->view('v_index',$data); 
	}
	
	function tambahdata()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$this->load->view('v_index', $data);		
	}
	
	function update_pemesanan($id)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		
		$data['query'] = $this->m_pemesanan->selectDataPemesanan($id);
		$data['query2'] = $this->m_pemesanan->getDataPemesanan();
		
		$this->load->view('v_form_update_pemesanan',$data);   	
	}
	
	function load_pemesanan()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$data['query'] = $this->m_pemesanan->selectAllPemesanan();
		
		$this->load->view('pemesanan/v_pemesanan',$data);
	}
	
	function load_pemesanan_bybus($id)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
	
		$data['query'] = $this->m_pemesanan->selectAllPemesananByBus($id);
		
		$this->load->view('pemesanan/v_data_pemesan',$data);
	}
	
	function edit_pemesanan()
	{
		$data['id_pemesan'] = $this->input->post('id_pemesan');
		$data['id_jadwalbusnya'] = $this->input->post('id_jadwalbusnya');
		$data['nama_pemesan'] = $this->input->post('nama_pemesan');
		$data['no_tlp'] = $this->input->post('no_tlp');
		$data['tgl_pemesan'] = $this->input->post('tgl_pemesan');
		$data['kota_tujuan'] = $this->input->post('kota_tujuan');
		$data['alamat'] = $this->input->post('alamat');
		$data['nama_tipe'] = $this->input->post('nama_tipe');
		$data['no_kursi'] = $this->input->post('no_kursi');
		$data['nama_penumpang'] = $this->input->post('nama_penumpang');
		$data['status'] = $this->input->post('status');
		$data['total_harga'] = $this->input->post('total_harga');
		
		//print_r ($data);
		$query = $this->m_pemesanan->UpdatePemesanan($data);
		// redirect 
		redirect('c_pemesanan/data_pemesanan','refresh');
	}
	
	function proses_tambah_pemesanan()
	{	
		$id_jadwalbus = $this->input->post('id_jadwalbus');
		$split_id_jadwalbus = explode ("_", $id_jadwalbus);
		$data['id_jadwalbus'] = $split_id_jadwalbus[0]; 
		//--------------------------------------------------
		$data['nama_pemesan'] = $this->input->post('nama_pemesan');
		$data['no_tlp'] = $this->input->post('no_tlp');
		$data['no_kursi'] = $this->input->post('no_kursi');
		$data['nama_penumpang'] = $this->input->post('nama_penumpang');
		$data['status'] = $this->input->post('status');
		$data['harga'] = $this->input->post('harga');
		
	//	print_r ($data);
		$query = $this->m_pemesanan->InputPemesanan($data);
		echo "<script language=javascript>
		alert('Data Berhasil Ditambah!')
		window.location.href='data_pemesanan'
		</script>";
		//redirect('c_pemesanan/data_pemesanan','refresh');
	}
	
	function proses_update_pemesanan()
	{
		$id_jadwalbus = $this->input->post('id_jadwalbus');
		$split_id_jadwalbus = explode ("_", $id_jadwalbus);
		$data['id_jadwalbus'] = $split_id_jadwalbus[0]; 
		//--------------------------------------------------
		$data['log_admin'] = $this->input->post('log_admin');
		$data['id_pemesan'] = $this->input->post('id_pemesan');
		$data['nama_pemesan'] = $this->input->post('nama_pemesan');
		$data['no_tlp'] = $this->input->post('no_tlp');
		$data['no_kursi'] = $this->input->post('no_kursi');
		$data['nama_penumpang'] = $this->input->post('nama_penumpang');
		$data['status'] = $this->input->post('status');
		$data['harga'] = $this->input->post('harga');
		
		if(empty($data['no_kursi'])){
		//echo 'kursi gak di update';
		$query = $this->m_pemesanan->UpdatePemesanan_TanpaKursi($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='data_pemesanan'
		</script>";
		//redirect('c_pemesanan/data_pemesanan','refresh');
		}else{
		//echo 'kursi di update';
		$query = $this->m_pemesanan->UpdatePemesanan_PakaiKursi($data);
		echo "<script language=javascript>
		alert('Data Berhasil Diubah!')
		window.location.href='data_pemesanan'
		</script>";
		//redirect('c_pemesanan/data_pemesanan','refresh');	
		}
		
	//	print_r ($data);
	}
	
	function update_pemesanan2($kode) 
	{
		$kode = explode ("_", $kode);
	 	$kodenya = $kode[0];
	 	$data['id_konfirmasi'] = $kode[1];
		
		$data['base_url'] = $this->base_url;
		$data['images'] = '../../'.$this->images;
		$data['css'] = '../../'.$this->css;
		$data['js'] = '../../'.$this->js;
		
		$data['query'] = $this->m_pemesanan->selectDataPemesanan2($kodenya); // satu row aja yang diambil
		$data['query2'] = $this->m_pemesanan->selectDataPemesanan3($kodenya); // ambil semua data
		if(empty($data['query'])){
		echo '<p style="color:red;">No Data!</p>';	
		}else{
	//print_r($data2);
	//	$data['query2'] = $this->m_pemesanan->getDataPemesanan2();
		$this->load->view('v_form_update_konfirmasi',$data); 
		}
	}
	
	function load_bus($tgl)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;

		$data['query'] = $this->m_pemesanan->selectBusByDate($tgl);
		
		$this->load->view('pemesanan/v_bus',$data);	
	}
	
	function load_kursi($idBus)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;

		$data['query'] = $this->m_pemesanan->selectKursiBus($idBus);
		$data['query2'] = $this->m_pemesanan->getJumlahKursi($idBus);
		
		$this->load->view('pemesanan/v_kursi',$data);	
	}
	
	function load_bus2($tgl)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;

		$data['query'] = $this->m_pemesanan->selectBusByDate($tgl);
		
		$this->load->view('home/v_pesantiket_busnya',$data);	
	}
	
	function load_kursi2($idBus)
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;

		$data['query'] = $this->m_pemesanan->selectKursiBus($idBus);
		$data['query2'] = $this->m_pemesanan->getJumlahKursi($idBus);
		//print_r($data['query2']);
		
		$this->load->view('home/v_pesantiket_kursinya',$data);	
	}
	
	function kelola_grafik()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		$this->load->view('v_index',$data); 
	}
	
	function load_grafik()
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$uri_date = $this->uri->segment(3);
		
		
		if($uri_date==''){
		// by now
		$data['datenya'] = date("Y-m-");
		$data['y'] = date("Y");
		$data['m'] = date("M");
		
		}else{
		// by inputan
		$date = explode ("-", $uri_date);
		$data['thn'] = $date[0]; 
		$data['bln'] = $date[1]; 
		
		 $data['datenya'] = date($data['thn'].'-'.$data['bln'].'-');

		$data['y'] = $data['thn'];
		$data['m'] = $data['bln'];
		if($data['bln']=='01'){$data['m']='January';}
		else if($data['bln']==02){$data['m']='February';}
		else if($data['bln']==03){$data['m']='March';}
		else if($data['bln']==04){$data['m']='April';}
		else if($data['bln']==05){$data['m']='May';}
		else if($data['bln']==06){$data['m']='June';}
		else if($data['bln']==07){$data['m']='July';}
		else if($data['bln']==08){$data['m']='August';}
		else if($data['bln']==09){$data['m']='September';}
		else if($data['bln']==10){$data['m']='Oktober';}
		else if($data['bln']==11){$data['m']='November';}
		else{
		$data['m']=='Desember';
			}
		}
		$data['query'] = $this->m_pemesanan->get_data_grafik($data);
		$this->load->view('pemesanan/v_load_grafik',$data);	
		
	}
	
	
	function delete_pemesanan($id) 
	{
		$data['base_url'] = $this->base_url;
		$data['images'] = '../'.$this->images;
		$data['css'] = '../'.$this->css;
		$data['js'] = '../'.$this->js;
		
		$query = $this->m_pemesanan->DeletePemesanan($id);
		
		$this->load->view('pemesanan/v_kursi',$data);		
	}
}
?>