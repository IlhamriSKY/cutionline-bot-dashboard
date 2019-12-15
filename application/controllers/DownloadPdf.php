<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DownloadPdf extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('downloadpdf_model');
  $this->load->library('pdf');
 }

 public function index()
 {
  $data['data_cuti'] = $this->downloadpdf_model->fetch();
  $this->load->view('downloadpdf', $data);
 }

 public function details()
 {
  if($this->uri->segment(3))
  {
   $customer_id = $this->uri->segment(3);
   $data['details'] = $this->downloadpdf_model->fetch_single_details($customer_id);
   $this->load->view('downloadpdf', $data);
  }
 }

 public function pdfdetails()
 {
  if($this->uri->segment(3))
  {
   $customer_id = $this->uri->segment(3);
   $html_content = $this->downloadpdf_model->fetch_single_details($customer_id);
   $this->pdf->setPaper('A4', 'potrait');
   $this->pdf->loadHtml($html_content);
   $this->pdf->render();
   $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
  }
 }

}

?>
