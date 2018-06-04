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
          <label for="varchar">Kd Jabatan </label>
          <input type="text" class="form-control" name="ID_LEVEL" id="ID_LEVEL" placeholder="Kode : PI/PJ/PK.." value="<?php echo $ID_LEVEL; ?>" />
          <small class="form-control-feedback"> <?php echo form_error('ID_LEVEL') ?> </small>
      </div>
	    <div class="form-group">
            <label for="varchar">Deskripsi Jabatan </label>
            <input type="text" class="form-control" name="DESCP_LEVEL" id="DESCP_LEVEL" placeholder="Nama Jabatan" value="<?php echo $DESCP_LEVEL; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_LEVEL') ?> </small>
        </div>
	    <div class="form-group">
            <label for="decimal">Point Jabatan </label>
            <input type="text" class="form-control" name="POINT_LEVEL" id="POINT_LEVEL" placeholder="0.00" value="<?php echo $POINT_LEVEL; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('POINT_LEVEL') ?> </small>
        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/level') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
