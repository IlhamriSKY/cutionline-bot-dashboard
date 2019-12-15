

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Karyawan List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Karyawan</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
            
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Total Karyawan</small></h6>
                        <h4 class="m-t-0 text-primary"><?php echo $count->total_karyawan; ?></h4>
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
                    <a href="<?php echo base_url('admin/cutionline/addkaryawan') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Karyawan</a> &nbsp;
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('admin/cutionline/addkaryawan') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Karyawan</a>
                    <?php endif; ?>
                <?php endif ?>
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NBM</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
									<th>Alamat</th>
									<th>Nomor</th>
									<th>Devisi</th>
									<th>Jabatan</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($userkaryawan as $karyawan): ?>
                                
                                <tr>

                                    <td><?php echo $karyawan['no']; ?></td>
                                    <td><?php echo $karyawan['nbm']; ?></td>
                                    <td><?php echo $karyawan['nama']; ?></td>
                                    <td><?php echo $karyawan['gender']; ?></td>
									<td><?php echo $karyawan['tempat_lhr']; ?></td>
									<td><?php echo my_date_show($karyawan['tgl_lahir']); ?></td>
									<td><?php echo $karyawan['alamat']." RT. ".$karyawan['rt']." RW.".$karyawan['rw']; ?></td>
									<td><?php echo $karyawan['no_hp']; ?></td>
									<td><?php echo $karyawan['devisi']; ?></td>
									<td><?php echo $karyawan['jabatan']; ?></td>
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('admin/cutionline/update_karyawan/'.$karyawan['no']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>

                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $karyawan['no'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                        <?php else: ?>

                                            <!-- check logged user role permissions -->
                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('admin/cutionline/update_karyawan/'.$karyawan['no']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            <?php endif; ?>
                                            <?php if(check_power(3)):?>
                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $karyawan['no'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
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



<?php foreach ($userkaryawan as $karyawan): ?>
 
<div class="modal fade" id="confirm_delete_<?php echo $karyawan['no'];?>">
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
                <a href="<?php echo base_url('admin/cutionline/delete_karyawan/'.$karyawan['no']) ?>" class="btn btn-danger"> Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>


<?php endforeach ?>
