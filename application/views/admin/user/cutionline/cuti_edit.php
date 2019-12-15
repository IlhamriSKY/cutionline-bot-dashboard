

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Cuti</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Cuti cutionline</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">

                
            </div>
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Edit Cuti <a href="<?php echo base_url('admin/cutionline/cuti') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Karyawan </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/cutionline/update_cuti/'.$cuti->no) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">NBM <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="nbm" class="form-control" value="<?php echo $cuti->nbm; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $cuti->nama; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Jabatan <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="jabatan" class="form-control" value="<?php echo $cuti->jabatan; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tempat lahir <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $cuti->tempat_lahir; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tanggal lahir <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $cuti->tanggal_lahir; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Keperluan <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="keperluan" class="form-control" value="<?php echo $cuti->keperluan; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
					
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tanggal <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $cuti->tanggal; ?>">
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
                                                <select class="form-control custom-select" name="gender" aria-invalid="false">
												<option value=<?php echo $cuti->status ; ?>><?php echo $cuti->status ; ?></option>
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
                                            <button type="submit" class="btn btn-success">Update</button>
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
