<?php
class DownloadPdf_model extends CI_Model
{
 function fetch()
 {
  $this->db->order_by('no', 'DESC');
  $this->db->where('status', 'diterima');
  return $this->db->get('cuti');
 }

 function fetch_single_details($nbm)
 {
  $this->db->where('nbm', $nbm);
  $this->db->where('status', 'diterima');
  $data = $this->db->get('cuti');

  $output = '
  <!DOCTYPE html>
  <html>
  <head>
  <title>Surat Permohonan Cuti</title>
  <style>
  body {
	background-color: White;
	text-align: left;
	color: black;
	font-family: Arial, Helvetica, sans-serif;
  }
  table {
	font-family: Arial, Helvetica, sans-serif;
	color: #white;
  }
  
  table th {
	padding-left: 60px;
	padding-right: 0px;
	padding-bottom 30px:
	
  }
  
  </style>
  </head>
  <body>
  
  <img src="http://127.0.0.1/hub/assets/images/kopsurat.png" alt="kopsurat" style="width:100%">';
  
  foreach($data->result() as $row)
  {
   $output .= '
   <p>Nomor &nbsp;&nbsp; : '.$row->no.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; 
   &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Semarang, '.date('d F Y').'</p>
   <p>Lamp &nbsp; &nbsp; : Surat Ijin Cuti</p>
   <p>Hal &nbsp; &nbsp; &nbsp; &nbsp; : <i><b><u> Surat Permohonan Cuti </i></b></u></p>
   <br>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kepada Yth.</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pimpinan Wilayah Muhammadiyah Jawa Tengah.</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; di- Semarang</p>
   <br>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i>Assalaamu’alaikum Wr. Wb</i></p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dengan hormat,</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Yang bertandatangan di bawah ini :</p>


	<table> 
		   <tr>
		   <th>Nama</th>
		   <th>: '.ucfirst($row->nama).'</th>
		   </tr>
		   <tr>
		   <th>NBM</th>
		   <th>: '.$row->nbm.'</th>
		   </tr>
		   <tr>
		   <th>Tempat Tanggal Lahir</th>
		   <th>: '.ucfirst($row->tempat_lahir).', '.$row->tanggal_lahir.'</th>
		   </tr>
		   <tr>
		   <th>Jabatan</th>
		   <th>: '.ucfirst($row->jabatan).'</th>
		   </tr>
		   <tr>
		   <th>Keterangan Cuti</th>
		   <th>: '.$row->keperluan.'</th>
		   </tr>
		   <tr>
		   <th>Tanggal </th>
		   <th>: '.my_date_show($row->tanggal).'</th>
		   </tr>
	</table> 
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dengan surat ini saya mengajukan cuti,
   terhitung mulai dari tanggal yang tercantum di atas.</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Demikian atas perhatian dan perkenannya disampaikan terima kasih.,</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i>Nashrun Minallahi Wa Fathun Qorieb</p>
   <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Wassalamu’alaikum Wr. Wb.</i></p>
   
   <img src="http://127.0.0.1/hub/assets/images/tandatangan.png" alt="tanda tanggan" style="width:40%">
   
   </body>
   </html>';
  }
  return $output;
 }
}

?>
