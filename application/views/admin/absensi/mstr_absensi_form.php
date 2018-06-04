<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Kehadiran</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Kehadiran</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
<div class="card">
  <form action="<?php echo $action; ?>" method="post" class="form-valide">
	    <div class="form-group">
            <label for="varchar">Deskripsi Kehadiran</label>
            <input type="text" class="form-control" name="DESCP_ABSENSI" id="DESCP_ABSENSI" placeholder="Deskripsi Kehadiran" value="<?php echo $DESCP_ABSENSI; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_ABSENSI') ?> </small>
        </div>
	    <div class="form-group">
            <label for="decimal">Point Kehadiran</label>
            <input type="text" class="form-control" name="POINT_ABSENSI" id="POINT_ABSENSI" placeholder="0.00" value="<?php echo $POINT_ABSENSI; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('POINT_ABSENSI') ?> </small>
        </div>
	    <input type="hidden" name="ID_ABSENSI" value="<?php echo $ID_ABSENSI; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/absensi') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
