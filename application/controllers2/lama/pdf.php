<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pdf extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->images = $this->config->item('images');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		
		$this->load->model('m_konfirmasi');

	}
	
function download()
{
	$kode = $this->uri->segment(3);
	$data['kode_pemesanan'] = $kode;
    $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
	if(empty($kode)){echo '
				<script>
				alert("Isi No Kode Tiket anda!");
				window.history.go(-1);
				</script>
				';}
	$cek2 = $this->m_konfirmasi->CekKodePemesananDownload($data);
	$cek = $this->m_konfirmasi->CekKodePemesanan($data);

	if($cek2){
	$data['notiket'] = '321';
	$data['query'] = $this->m_konfirmasi->getTiket($kode);
    $this->load->view('pdfreport', $data);
	}
	else if ($cek){
		echo '
		<script>
				alert("Maaf, Kode anda belum kami validasi! \nAdmin kami akan segera memvalidasi tiket anda. \nTerima Kasih!");
				window.history.go(-1);
		</script>
		';
		}
	else{
		echo '
		<script>
				alert("Kode Tiket anda Tidak VALID!");
				window.history.go(-1);
		</script>
		';
	}
}

}
?>