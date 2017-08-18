<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi_proses extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->load->model('m_konfirmasi');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$this->load->library('upload');
		$data['kode_pemesanan'] = $this->input->post('kode_pemesanan');
		$data['ket_lain'] = $this->input->post('ket_lain');
		$data['userfile'] = $this->input->post('userfile');
		
		
		$cek = $this->m_konfirmasi->CekKodePemesanan($data);
		if($cek){
			$config['upload_path'] = './liva/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2500';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			$config['file_name'] = 'kodepembayaran_'.date('dmy_His');
	
			$this->upload->initialize($config);
			
			
				if ( ! $this->upload->do_upload('userfile'))
				{
					echo $this->upload->display_errors();
					$data_upload = $this->upload->data();
					echo '<br/>
					<div style="position: fixed; top:0; padding:20px 10px 20px 10px;">
					Your File Size: '. $data_upload['file_size'].'KB</div>';				
				}
				else
				{
					$data_upload = $this->upload->data();
					$data['file_name'] = $config['file_name'].$data_upload['file_ext'];
										
					$query =  $this->m_konfirmasi->ProsesKonfirmasi($data);
					
				}	
			
		
			$data['base_url'] = $this->base_url;
			$data['images'] = $this->base_url.'liva/images';
			$data['css'] = $this->base_url.'liva/css';
			$data['js'] = $this->base_url.'liva/js';
			$this->load->view('home/v_konfirmasi_oke', $data);
		}
		else
			{
				//redirect('login');
				echo '
				<script>
				alert("Kode Pemesanan Tidak VALID!");
				window.history.go(-1);
				</script>
				';
				//exit();
			}
	
	}
	
	
}