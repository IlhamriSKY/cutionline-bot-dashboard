

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Cuti Add</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Cuti</li>
            </ol>
        </div>
        
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Add New Cuti <a href="<?php echo base_url('admin/cutionline/cuti') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Cuti </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/cutionline/addcuti') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">NBM <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="nbm" class="form-control" required data-validation-required-message="NBM is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>        

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="nama" class="form-control" required data-validation-required-message="Nama is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>    

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Jabatan <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="jabatan" class="form-control" required data-validation-required-message="Jabatan is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>    

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tempat lahir <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="tempat_lahir" class="form-control" required data-validation-required-message="Tempat lahir is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>   

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tanggal lahir <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="tanggal_lahir" class="form-control" required data-validation-required-message="Tanggal lahir is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>    

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Keperluan <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="keperluan" class="form-control" required data-validation-required-message="Keperluan is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tanggal <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="tanggal" class="form-control" required data-validation-required-message="Tanggal is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Status </label>
                                        <div class="col-md-9 controls">
                                                <select class="form-control custom-select" name="status" aria-invalid="false">
													<option value="proses">Proses</option>
													<option value="diterima">Diterima</option>
													<option value="ditolak">Ditolak</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Save Cuti</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>
