<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi_proses2 extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->load->model('m_konfirmasi');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$this->load->library('upload');
		$data['namaPengirim'] = $this->input->post('namaPengirim');
		$data['norek'] = $this->input->post('norek');
		$data['rektujuan'] = $this->input->post('rektujuan');
		$data['totalbayar'] = $this->input->post('totalbayar');
		$data['no_identitas'] = $this->input->post('no_identitas');

		$data['tanggal'] = $this->input->post('tanggal');
		
		$data['kode_pemesanan'] = $this->input->post('kode_pemesanan');
		$data['ket_lain'] = $this->input->post('ket_lain');
		$data['userfile'] = $this->input->post('userfile');
		
		
		// CAPCTCHA
		// load the session library
		$this->load->library('session');
		$this->load->helper(array('captcha','url'));
        // if given captcha word matches one in session
        if (($this->input->post('word') == $this->session->userdata('word'))) {
			
		$cek = $this->m_konfirmasi->CekKodePemesanan($data);
		if($cek){
			$data['id_pemesan'] = $cek->id_pemesan;
			
		
			$config['upload_path'] = './liva/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2500';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			$config['file_name'] = 'kodepembayaran_'.date('dmy_His');
	
			$this->upload->initialize($config);
			
			
				if ( ! $this->upload->do_upload('userfile'))
				{
					//echo $this->upload->display_errors();
					$data_upload = $this->upload->data();
					//echo '<br/>Your File Size: '. $data_upload['file_size'].'KB';				
					
					$data['file_name'] = '';
					$query =  $this->m_konfirmasi->ProsesKonfirmasi($data);
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
				$this->load->view('mobile/v_konfirmasi_oke', $data);
		
			}
				else
					{
						//redirect('login');
						echo '
						<script>
						alert("Kode Verifikasi Tidak VALID!");
						window.history.go(-1);
						</script>
						';
						//exit();
					}
		}else{
		
		//redirect('login');
				echo '
				<script>
				alert("Wrong Captcha!");
				window.history.go(-1);
				</script>
				';
				//exit();	
		}
		
		}
	
	
}