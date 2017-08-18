<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_track extends CI_Controller {

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
		$this->telah_login();
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$data['query'] = $this->m_track->selectAllRute($this->session->userdata('id_user'));
		$data['query_kota'] = $this->m_track->selectKota($this->session->userdata('id_user'));
		$this->load->view('adminmobitick/v_dashboard', $data);
	}
	
	public function load_detailrute($id){
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$data['id_trayek_maju'] = $id;
		$data['id_trayek_balik'] = $id+1;
		$data['id_user'] = $this->session->userdata('id_user');
		$data['maju'] = $this->m_track->selectDetailRuteMaju($data);
		$data['balik'] = $this->m_track->selectDetailRuteBalik($data);
		$data['trayek'] = $this->m_track->selectRute($id);
		$this->load->view('adminmobitick/v_detail_rute', $data);
	}
	public function load_addtrack(){
		$data['base_url'] = $this->base_url;
		$data['images'] = $this->images;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['plugins'] = $this->plugins;
		$this->load->view('adminmobitick/v_add_track',$data);
	}
	
	public function input_track(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['id_trayek_asal'] = $this->input->post('pool_asal');
		$data['id_trayek_tujuan'] = $this->input->post('pool_tujuan');
		$data['maju'] = $this->input->post('jlh_trayekmaju');
		$data['balik'] = $this->input->post('jlh_trayekbalik');
		
		$data['kota1'] = $this->input->post('kota1');
		$data['kota2'] = $this->input->post('kota2');
		$data['kota3'] = $this->input->post('kota3');
		$data['kota4'] = $this->input->post('kota4');
		$data['kota5'] = $this->input->post('kota5');
		$data['kota6'] = $this->input->post('kota6');
		$data['kota7'] = $this->input->post('kota7');
		$data['kota8'] = $this->input->post('kota8');
		$data['kota9'] = $this->input->post('kota9');
		$data['kota10'] = $this->input->post('kota10');
		$data['kota11'] = $this->input->post('kota11');
		$data['kota12'] = $this->input->post('kota12');
		$data['kota13'] = $this->input->post('kota13');
		$data['kota14'] = $this->input->post('kota14');
		$data['kota15'] = $this->input->post('kota15');
		$data['kota16'] = $this->input->post('kota16');
		$data['kota17'] = $this->input->post('kota17');
		$data['kota18'] = $this->input->post('kota18');
		$data['kota19'] = $this->input->post('kota19');
		$data['kota20'] = $this->input->post('kota20');
		$data['kota21'] = $this->input->post('kota21');
		$data['kota22'] = $this->input->post('kota22');
		$data['kota23'] = $this->input->post('kota23');
		$data['kota24'] = $this->input->post('kota24');
		$data['kota25'] = $this->input->post('kota25');
		$data['kota26'] = $this->input->post('kota26');
		$data['kota27'] = $this->input->post('kota27');
		$data['kota28'] = $this->input->post('kota28');
		$data['kota29'] = $this->input->post('kota29');
		$data['kota30'] = $this->input->post('kota30');

		$data['harga1'] = $this->input->post('harga1');
		$data['harga2'] = $this->input->post('harga2');
		$data['harga3'] = $this->input->post('harga3');
		$data['harga4'] = $this->input->post('harga4');
		$data['harga5'] = $this->input->post('harga5');
		$data['harga6'] = $this->input->post('harga6');
		$data['harga7'] = $this->input->post('harga7');
		$data['harga8'] = $this->input->post('harga8');
		$data['harga9'] = $this->input->post('harga9');
		$data['harga10'] = $this->input->post('harga10');
		$data['harga11'] = $this->input->post('harga11');
		$data['harga12'] = $this->input->post('harga12');
		$data['harga13'] = $this->input->post('harga13');
		$data['harga14'] = $this->input->post('harga14');
		$data['harga15'] = $this->input->post('harga15');
		$data['harga16'] = $this->input->post('harga16');
		$data['harga17'] = $this->input->post('harga17');
		$data['harga18'] = $this->input->post('harga18');
		$data['harga19'] = $this->input->post('harga19');
		$data['harga20'] = $this->input->post('harga20');
		$data['harga21'] = $this->input->post('harga21');
		$data['harga22'] = $this->input->post('harga22');
		$data['harga23'] = $this->input->post('harga23');
		$data['harga24'] = $this->input->post('harga24');
		$data['harga25'] = $this->input->post('harga25');
		$data['harga26'] = $this->input->post('harga26');
		$data['harga27'] = $this->input->post('harga27');
		$data['harga28'] = $this->input->post('harga28');
		$data['harga29'] = $this->input->post('harga29');
		$data['harga30'] = $this->input->post('harga30');
		
		$data['kotab1'] = $this->input->post('kotab1');
		$data['kotab2'] = $this->input->post('kotab2');
		$data['kotab3'] = $this->input->post('kotab3');
		$data['kotab4'] = $this->input->post('kotab4');
		$data['kotab5'] = $this->input->post('kotab5');
		$data['kotab6'] = $this->input->post('kotab6');
		$data['kotab7'] = $this->input->post('kotab7');
		$data['kotab8'] = $this->input->post('kotab8');
		$data['kotab9'] = $this->input->post('kotab9');
		$data['kotab10'] = $this->input->post('kotab10');
		$data['kotab11'] = $this->input->post('kotab11');
		$data['kotab12'] = $this->input->post('kotab12');
		$data['kotab13'] = $this->input->post('kotab13');
		$data['kotab14'] = $this->input->post('kotab14');
		$data['kotab15'] = $this->input->post('kotab15');
		$data['kotab16'] = $this->input->post('kotab16');
		$data['kotab17'] = $this->input->post('kotab17');
		$data['kotab18'] = $this->input->post('kotab18');
		$data['kotab19'] = $this->input->post('kotab19');
		$data['kotab20'] = $this->input->post('kotab20');
		$data['kotab21'] = $this->input->post('kotab21');
		$data['kotab22'] = $this->input->post('kotab22');
		$data['kotab23'] = $this->input->post('kotab23');
		$data['kotab24'] = $this->input->post('kotab24');
		$data['kotab25'] = $this->input->post('kotab25');
		$data['kotab26'] = $this->input->post('kotab26');
		$data['kotab27'] = $this->input->post('kotab27');
		$data['kotab28'] = $this->input->post('kotab28');
		$data['kotab29'] = $this->input->post('kotab29');
		$data['kotab30'] = $this->input->post('kotab30');

		$data['hargab1'] = $this->input->post('hargab1');
		$data['hargab2'] = $this->input->post('hargab2');
		$data['hargab3'] = $this->input->post('hargab3');
		$data['hargab4'] = $this->input->post('hargab4');
		$data['hargab5'] = $this->input->post('hargab5');
		$data['hargab6'] = $this->input->post('hargab6');
		$data['hargab7'] = $this->input->post('hargab7');
		$data['hargab8'] = $this->input->post('hargab8');
		$data['hargab9'] = $this->input->post('hargab9');
		$data['hargab10'] = $this->input->post('hargab10');
		$data['hargab11'] = $this->input->post('hargab11');
		$data['hargab12'] = $this->input->post('hargab12');
		$data['hargab13'] = $this->input->post('hargab13');
		$data['hargab14'] = $this->input->post('hargab14');
		$data['hargab15'] = $this->input->post('hargab15');
		$data['hargab16'] = $this->input->post('hargab16');
		$data['hargab17'] = $this->input->post('hargab17');
		$data['hargab18'] = $this->input->post('hargab18');
		$data['hargab19'] = $this->input->post('hargab19');
		$data['hargab20'] = $this->input->post('hargab20');
		$data['hargab21'] = $this->input->post('hargab21');
		$data['hargab22'] = $this->input->post('hargab22');
		$data['hargab23'] = $this->input->post('hargab23');
		$data['hargab24'] = $this->input->post('hargab24');
		$data['hargab25'] = $this->input->post('hargab25');
		$data['hargab26'] = $this->input->post('hargab26');
		$data['hargab27'] = $this->input->post('hargab27');
		$data['hargab28'] = $this->input->post('hargab28');
		$data['hargab29'] = $this->input->post('hargab29');
		$data['hargab30'] = $this->input->post('hargab30');
		//echo '<pre>'; print_r($data); echo '</pre>';

		// satu
		$data['asal'] = $this->m_track->poolasal($data['id_trayek_asal']);
		$data['tujuan'] = $this->m_track->pooltujuan($data['id_trayek_tujuan']);
		$data['nama_pool_asal'] = $data['asal']->nama_lokasi;
		$data['nama_pool_tujuan'] = $data['tujuan']->nama_lokasi;
		$data['query'] = $this->m_track->submitTrack($data);
		// dua
		$data['getIdTrayekAsal'] = $this->m_track->getIdTrayekAsal($data);
		$data['getIdTrayekTujuan'] = $this->m_track->getIdTrayekTujuan($data);
		$data['idTrayekAsal'] = $data['getIdTrayekAsal']->ID;
		$data['idTrayekTujuan'] = $data['getIdTrayekTujuan']->ID;
		
		//echo '<pre>'; print_r($data); echo '</pre>';
		$data['query2'] = $this->m_track->submitHargaLokasiTrayek($data);

		redirect('manage_track');
		
		}
	
	function telah_login(){
		$is_logged_in = $this->session->userdata('telah_login');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect("login");
			return;
			}
	}
	
}