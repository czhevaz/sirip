<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Jabatan</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Jabatan</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
<div class="card">
  <form action="<?php echo $action; ?>" method="post" class="form-valide">
	    <div class="form-group">
            <label for="varchar">Deskripsi Keterampilan</label>
            <input type="text" class="form-control" name="DESCP_KET" id="DESCP_KET" placeholder="Deskripsi Keterampilan" value="<?php echo $DESCP_KET; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_KET') ?> </small>
        </div>
	    <div class="form-group">
            <label for="decimal">Point Keterampilan</label>
            <input type="text" class="form-control" name="POINT_KET" id="POINT_KET" placeholder="0.00" value="<?php echo $POINT_KET; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('POINT_KET') ?> </small>
        </div>
	    <input type="hidden" name="ID_KET" value="<?php echo $ID_KET; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/ket_khusus') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
