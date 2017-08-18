<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Tiket Resmi PO.RAJAWALI";
$alamat = "Jln. Kapten Adi Sumarno No.261\nTelp. 719704 Solo";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $alamat);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
   

foreach ($query as $row){
$content =
		'<h2>Kode Tiket			: '.$row->penumpang_ke.'-'.$row->kode_pemesanan.'</h2><br/>'.
		'Tanggal Pemesanan		: '.$row->tgl_pemesanan.'<br/>'. 
		'Nama Penumpang			: '.$row->nama_penumpang.'<br/>'.
		'No Tlp 				: '.$row->no_tlp.'<br/>'.		
		'Tanggal Keberangkatan	: '.$row->tgl_keberangkatan.'<br/>'. 
		'Jam Keberangkatan		: '.$row->jam_berangkatbus.'<br/>'.
		'Nama Pool 				: '.$row->nama_pool.'<br/>'.
		'Lokasi Pool 			: '.$row->lokasi_keberangkatan.'<br/>'.
		'Tujuan					: '.$row->kota_akhir.'<br/>'.
		'Bus					: '.$row->nama_bus.' - '.$row->nama_tipe.'<br/>'.
		'No Kursi 				: '.$row->no_kursi.'<br/>'.
		'Harga					: '.$row->total_harga.'<br/>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		';

$obj_pdf->writeHTML($content, true, false, true, false, '');
}

ob_end_clean();
$obj_pdf->Output('output.pdf', 'I');

?>