
<html>
<head>
    <title>Convert HTML to PDF in CodeIgniter using Dompdf</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container box">
  <br />
  <h3 align="center">API FOR BOT</h3>
  <br />
  <?php
  if(isset($data_cuti))
  {
  ?>
  <div class="table-responsive">
   <table class="table table-striped table-bordered">
    <tr>
     <th>No</th>
     <th>NBM</th>
     <th>Keperluan</th>
     <th>Tanggal</th>
	 <th>Status</th>
    </tr>
   <?php
   foreach($data_cuti->result() as $row)
   {
    echo '
    <tr>
     <td>'.$row->no.'</td>
	 <td>'.$row->nbm.'</td>
	 <td>'.$row->keperluan.'</td>
	 <td>'.$row->tanggal.'</td>
	 <td>'.$row->status.'</td>
     <td><a href="'.base_url().'downloadpdf/details/'.$row->nbm.'">View</a></td>
     <td><a href="'.base_url().'downloadpdf/pdfdetails/'.$row->nbm.'">View in PDF</a></td>
    </tr>
    ';
   }
   ?>
   </table>
  </div>
  <?php
  }
  if(isset($details))
  {
   echo $details;
  }
  ?>
 </div>
</body>
</html>

