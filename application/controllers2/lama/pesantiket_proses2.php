<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesantiket_proses2 extends CI_Controller {

	function __construct() {
	parent::__construct();
	
		$this->base_url = $this->config->item('base_url');
		$this->load->model('m_pemesanan');
	}
	
	public function index()
	{
	
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
		$data['jam_pemesanan'] = date("H:i:s");
		
		$validate =  $this->m_pemesanan->validasi_tanggal($data);
			if($validate){
				
				// tanggal dan waktu pemesanan sekarang
				$d = $data['tgl_pemesanan'];
				$date = explode ("-", $d);
				 $y = $date[0]; 
				 $m = $date[1]; 
				 $d = $date[2]; 
				 $time = $data['jam_pemesanan'];
				$tm = explode (":", $time);
				  $j = $tm[0]; 
				
				// tanggal dan waktu bis berangkat
				$tanggal = $validate->tgl_keberangkatan;
				$tgl = explode ("-", $tanggal);
				 $y2 = $tgl[0]; 
				 $m2 = $tgl[1]; 
				 $d2 = $tgl[2]; 
				$waktu = $validate->jam_berangkatbus; 
				$wkt = explode (":", $waktu);
				  $j2 = $wkt[0]; 
				
				
				
				if($y<=$y2){
					if($m<=$m2){
						if($d<$d2){
						$satu = $d2-$d;
							if($satu==1){
								if($j<$j2){
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
								else{
								
								echo "<script language=javascript>
								alert('jam - Maaf, Waktu Pemesanan maksimal 1x24 jam dari jam keberangkatan!')
								window.location.href='pesantiket2'
								</script>";
								
								}
							}
							else{
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
						}else{
							echo "<script language=javascript>
							alert('jam - Maaf, Waktu Pemesanan maksimal 1x24 jam dari jam keberangkatan!')
							window.location.href='pesantiket2'
							</script>";
							}
					}else{
							echo "<script language=javascript>
							alert('jam - Maaf, Waktu Pemesanan maksimal 1x24 jam dari jam keberangkatan!')
							window.location.href='pesantiket2'
							</script>";
							}
				}
				else{
							echo "<script language=javascript>
							alert('jam - Maaf, Waktu Pemesanan maksimal 1x24 jam dari jam keberangkatan!')
							window.location.href='pesantiket2'
							</script>";
							}
				
			}
			else{
				
							echo "<script language=javascript>
							alert('jam - Maaf, Waktu Pemesanan maksimal 1x24 jam dari jam keberangkatan!')
							window.location.href='pesantiket2'
							</script>";
							}
		
	}
	
	
}