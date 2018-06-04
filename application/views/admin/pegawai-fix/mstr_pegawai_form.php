<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Pegawai</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item">Pegawai</li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
<div class="card">
        <form action="<?php echo $action; ?>" method="post" class="form-valide">
          <div class="form-body">
              <div class="row p-t-20">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">NIP/ NIK<span class="text-danger">*</span></label>
                          <input type="text" id="NIK" class="form-control" name="NIK" placeholder="123456789" value="<?php echo $NIK; ?>" />
                          <small class="form-control-feedback"> <?php echo form_error('NIK') ?> </small>
                      </div>
                  </div>
          <div class="col-md-6">
            <div class="form-group has-danger">
              <label class="control-label">Nama Lengkap<span class="text-danger">*</span></label>
              <input type="text" id="NAMA_PEGAWAI" name="NAMA_PEGAWAI" class="form-control form-control-danger" placeholder="Nama Pegawai" value="<?php echo $NAMA_PEGAWAI; ?>" />
              <small class="form-control-feedback"> <?php echo form_error('NAMA_PEGAWAI') ?> </small>
            </div>
          </div>
      <!--/span-->
        </div>

        <!--/row-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Jenis Kelamin</label>
            <?php
            $style0='class="form-control input-sm custom-select value="<?php echo $GENDER; ?>"';
            echo form_dropdown('GENDER',$GENDER,'',$style0);
            ?>
            <small class="form-control-feedback"><?php echo form_error('GENDER') ?></small>
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Tgl Lahir</label>
            <input type="date" class="form-control datepicker" placeholder="dd/mm/yyyy" name="TGL_LAHIR" id="TGL_LAHIR" value="<?php echo $TGL_LAHIR; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('TGL_LAHIR') ?> </small>
        </div>
    </div>
    <!--/span-->
</div>
<!--/row-->
 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label class="control-label">Alamat</label>
             <input type="text" class="form-control" name="ALAMAT" id="ALAMAT" placeholder="Alamat" value="<?php echo $ALAMAT; ?>" />
             <small class="form-control-feedback"> <?php echo form_error('ALAMAT') ?> </small>
         </div>
         <div class="form-group">
           <label for="varchar">Telepon</label>
           <input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="08xxx-xxx-xxx" value="<?php echo $PHONE; ?>" />
           <small class="form-control-feedback"> <?php echo form_error('PHONE') ?> </small>
         </div>
     </div>
     <!--/span-->
     <div class="col-md-6">
         <div class="form-group">
                 <label for="control-label">Tempat Lahir</label>
                 <input type="text" class="form-control" name="TEMPAT_LAHIR" id="TEMPAT_LAHIR" placeholder="Tempat Lahir" value="<?php echo $TEMPAT_LAHIR; ?>" />
                 <small class="form-control-feedback"> <?php echo form_error('TEMPAT_LAHIR') ?> </small>
         </div>
         <div class="form-group">
                <label for="varchar">Email</label>
                <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="yourname@email.com" value="<?php echo $EMAIL; ?>" />
                <small class="form-control-feedback"> <?php echo form_error('EMAIL') ?> </small>
        </div>
     </div>
     <!--/span-->
 </div>

      <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
      &nbsp<a href="<?php echo site_url('admin/pegawai') ?>" class="btn btn-warning">Cancel</a>


</form>
</div>
</div>
