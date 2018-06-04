<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Pegawai</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Pegawai</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
    <form action="<?php echo $action; ?>" method="post" class="form-valide">

    <div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Tambah Pegawai</h4>
      </div>
              <div class="form-body">
                <hr>

                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Biodata Pegawai</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Indeks Pegawai</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="p-20">

                              <div class="row p-t-20">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="control-label">NIP/ NIK<span class="text-danger"> *</span></label>
                                          <input type="text" id="NIK" class="form-control" name="NIK" placeholder="123456789" value="<?php echo $NIK; ?>" />
                                          <small class="form-control-feedback"><?php echo form_error('NIK') ?> </small>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group has-danger">
                                          <label class="control-label">Nama Lengkap<span class="text-danger"> *</span></label>
                                          <input type="text" id="NAMA_PEGAWAI" name="NAMA_PEGAWAI" class="form-control form-control-danger" placeholder="Nama Pegawai" value="<?php echo $NAMA_PEGAWAI; ?>" />
                                          <small class="form-control-feedback"><?php echo form_error('NAMA_PEGAWAI') ?> </small>
                                      </div>
                                  </div>
                      <!--/span-->
                              </div>
                      <!--/row-->
                              <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                              <label for="varchar">Alamat</label>
                                              <input type="text" class="form-control" name="ALAMAT" id="ALAMAT" placeholder="Jl.ABC No.1 01/01" value="<?php echo $ALAMAT; ?>" />
                                              <small class="form-control-feedback"><?php echo form_error('ALAMAT') ?> </small>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <label for="varchar">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="TEMPAT_LAHIR" id="TEMPAT_LAHIR" placeholder="Tempat lahir" value="<?php echo $TEMPAT_LAHIR; ?>" />
                                                <small class="form-control-feedback"><?php echo form_error('TEMPAT_LAHIR') ?></small>
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <label for="date">Tanggal Lahir</label>
                                                <input type="date" class="form-control datepicker" placeholder="dd/mm/yyyy" name="TGL_LAHIR" id="TGL_LAHIR" value="<?php echo $TGL_LAHIR; ?>" />
                                                <small class="form-control-feedback"><?php echo form_error('TGL_LAHIR') ?></small>
                                          </div>
                                    </div>
                              </div>


                              <div class="row">
                                  <div class="col-md-3">
                                       <div class="form-group">
                                            <label for="varchar">Jenis Kelamin</label>
                                            <?php echo form_dropdown('GENDER', array('' => '- Pilih -', 'L' => 'Laki-laki', 'P' => 'Perempuan'), $GENDER, array('class' => 'form-control form-control input-sm custom-select')); ?>
                                            <small class="form-control-feedback"><?php echo form_error('GENDER') ?></small>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                       <div class="form-group">
                                            <label for="varchar">Email</label>
                                            <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="nama@email.com" value="<?php echo $EMAIL; ?>" />
                                            <small class="form-control-feedback"><?php echo form_error('EMAIL') ?></small>
                                        </div>
                                  </div>
                                  <div class="col-md-3">
                                       <div class="form-group">
                                            <label for="varchar">Telepon</label>
                                            <input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="08-xxx-xxx-xxx" value="<?php echo $PHONE; ?>" />
                                            <small class="form-control-feedback"><?php echo form_error('PHONE') ?></small>
                                      </div>
                                  </div>
            <!--                      <div class="col-md-3">
                                       <div class="form-group">
                                            <label for="varchar">Status</label>
                                            <?php echo form_dropdown('STATUS', array('' => '- Pilih -', 'Y' => 'Aktif', 'T' => 'Tidak Aktif'), $STATUS, array('class' => 'form-control form-control input-sm custom-select')); ?>
                                            <small class="form-control-feedback"><?php echo form_error('STATUS') ?></small>
                                      </div>
                                  </div>  -->
                                  <input type="hidden" name="ID_PEGAWAI" value="<?php echo $ID_PEGAWAI; ?>" />
                              </div>



                            </div>
                        </div>
                        <div class="tab-pane  p-20" id="profile" role="tabpanel">

                      <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                <label for="varchar">Jabatan <?php echo form_error('ID_LEVEL') ?></label>
                                <?php echo cmb_dinamis('ID_LEVEL', 'mstr_level', 'DESCP_LEVEL','ID_LEVEL', $ID_LEVEL)?>
                            </div>
                          </div>
                          <div class="col-md-6">
                    	    <div class="form-group">
                                <label for="int">Ruangan <?php echo form_error('ID_RUANGAN') ?></label>
                                <?php echo cmb_dinamis('ID_RUANGAN', 'mstr_ruangan', 'DESCP_RUANGAN','ID_RUANGAN', $ID_RUANGAN)?>
                          </div>
                          </div>
                          <div class="col-md-6">
                    	    <div class="form-group">
                                <label for="varchar">Jenjang Karir<?php echo form_error('ID_KARIR') ?></label>
                                <?php echo cmb_dinamis('ID_KARIR', 'mstr_karir', 'DESCP_KARIR','ID_KARIR', $ID_KARIR)?>
                          </div>
                          </div>
                          <div class="col-md-6">
                    	    <div class="form-group">
                                <label for="int">Risiko Kerja <?php echo form_error('ID_RISIKO') ?></label>
                                <?php echo cmb_dinamis('ID_RISIKO', 'mstr_risiko_kerja', 'DESCP_RISIKO','ID_RISIKO', $ID_RISIKO)?>
                          </div>
                          </div>
                          <div class="col-md-4">
                    	    <div class="form-group">
                                <label for="int">Keterampilan Khusus <?php echo form_error('ID_KET') ?></label>
                                <?php echo cmb_dinamis('ID_KET', 'mstr_ket_khusus', 'DESCP_KET','ID_KET', $ID_KET)?>
                          </div>
                          </div>
                          <div class="col-md-4">
                    	    <div class="form-group">
                                <label for="int">Intensitas > Pasien <?php echo form_error('ID_INTENSITAS') ?></label>
                                <?php echo cmb_dinamis('ID_INTENSITAS', 'mstr_intensitas', 'DESCP_INTENSITAS','ID_INTENSITAS', $ID_INTENSITAS)?>
                          </div>
                          </div>
                          <div class="col-md-4">
                    	    <div class="form-group">
                                <label for="int">Kehadiran <?php echo form_error('ID_ABSENSI') ?></label>
                                <?php echo cmb_dinamis('ID_ABSENSI', 'mstr_absensi', 'DESCP_ABSENSI','ID_ABSENSI', $ID_ABSENSI)?>
                          </div>
                          </div>


                        </div>
                      </div>

                    </div>
                </div>
            </div>

    </div>

    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo $button ?></button>
    &nbsp<a href="<?php echo site_url('admin/pegawai') ?>" class="btn btn-danger"><i class="fa fa-times-circle">&nbsp;</i>Cancel</a>
    </form>


</div>
