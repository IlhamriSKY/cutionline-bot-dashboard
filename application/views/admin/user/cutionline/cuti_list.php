

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Cuti List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Cuti</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
            
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Total Cuti</small></h6>
                        <h4 class="m-t-0 text-primary"><?php echo $count->total_cuti; ?></h4>
                    </div>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-12">

            <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <div class="card">

                <div class="card-body">

                <?php if ($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin/cutionline/addcuti') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Cuti</a> &nbsp;
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('admin/cutionline/addcuti') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Cuti</a>
                    <?php endif; ?>
                <?php endif ?>
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NBM</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>TTL</th>
									<th>Keperluan</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Create</th>
									<th>Update</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($usercuti as $cuti): ?>
                                <tr>

                                    <td><?php echo $cuti['no']; ?></td>
                                    <td><?php echo $cuti['nbm']; ?></td>
									<td><?php echo ucfirst($cuti['nama']); ?></td>
									<td><?php echo $cuti['jabatan']; ?></td>
									<td><?php echo ucfirst($cuti['tempat_lahir']).", ".my_date_show($cuti['tanggal_lahir'])."";?></td>
									<td><?php echo $cuti['keperluan']; ?></td>
									<td><?php echo my_date_show($cuti['tanggal']); ?></td>
                                    <td>
                                        <?php if ($cuti['status'] == "proses"): ?>
                                            <div class="fa fa-spinner label label-table label-danger"> Proses</div>
										<?php elseif ($cuti['status'] == "ditolak"): ?>
                                            <div class="fa fa-times label label-table label-danger"> Ditolak</div>
                                        <?php else: ?>
                                            <div class="fa fa-check label label-table label-success"> Diterima</div>
                                        <?php endif ?>
                                    </td>

                                    <td><?php echo my_date_show_time($cuti['create_date']); ?></td>
									<td><?php echo my_date_show_time($cuti['update_date']); ?></td>



                                    <td class="text-nowrap">						
											<?php if ($this->session->userdata('role') == 'admin'): ?>

												<?php if ($cuti['status'] == "diterima"):?>
                                                	<a href="<?php echo base_url('downloadpdf/pdfdetails/'.$cuti['nbm']) ?>" data-toggle="tooltip" data-original-title="Pdf"> <i class="fa fa-file text-success m-r-10"></i> </a>
                                            	<?php endif; ?>
												
												<a href="<?php echo base_url('admin/cutionline/update_cuti/'.$cuti['no']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>

												<a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $cuti['no'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
											<?php else: ?>

                                            <!-- check logged user role permissions -->
                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('admin/cutionline/update_cuti/'.$cuti['no']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            <?php endif; ?>
                                            <?php if(check_power(3)):?>
                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $cuti['no'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            <?php endif; ?>

                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Page Content -->

</div>



<?php foreach ($usercuti as $cuti): ?>
 
<div class="modal fade" id="confirm_delete_<?php echo $cuti['no'];?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
            <div class="form-body">
                
                Are you sure want to delete? <br> <hr>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('admin/cutionline/delete_cuti/'.$cuti['no']) ?>" class="btn btn-danger"> Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>


<?php endforeach ?>
