

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">karyawan Add</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Karyawan</li>
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
                    <h4 class="m-b-0 text-white"> Add New Karyawan <a href="<?php echo base_url('admin/cutionline/karyawan') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Karyawan </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/cutionline/addkaryawan') ?>" class="form-horizontal" novalidate>
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
                                        <label class="control-label text-right col-md-3">Gender </label>
                                        <div class="col-md-9 controls">
                                                <select class="form-control custom-select" name="gender" aria-invalid="false">
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tempat Lahir <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="tempat_lhr" class="form-control" required data-validation-required-message="Tempat Lahir is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="tgl_lahir" class="form-control" required data-validation-required-message="Tanggal Lahir is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>  

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Alamat <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="alamat" class="form-control" required data-validation-required-message="Alamat is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>           

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">RT <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="rt" class="form-control" required data-validation-required-message="RT is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">RW <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="rw" class="form-control" required data-validation-required-message="RW is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nomor <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="no_hp" class="form-control" required data-validation-required-message="Nomor is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Devisi <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="devisi" class="form-control" required data-validation-required-message="Devisi is required">
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

                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Save Karyawan</button>
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
