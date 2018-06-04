<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Risiko Kerja</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Risiko Kerja</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
<div class="card">
  <form action="<?php echo $action; ?>" method="post" class="form-valide">
	    <div class="form-group">
            <label for="varchar">Deskripsi Risiko Kerja</label>
            <input type="text" class="form-control" name="DESCP_RISIKO" id="DESCP_RISIKO" placeholder="Deskripsi Risiko Kerja" value="<?php echo $DESCP_RISIKO; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_RISIKO') ?> </small>
        </div>
	    <div class="form-group">
            <label for="decimal">Point</label>
            <input type="text" class="form-control" name="POINT_RISIKO" id="POINT_RISIKO" placeholder="0.00" value="<?php echo $POINT_RISIKO; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('POINT_RISIKO') ?> </small>
        </div>
	    <input type="hidden" name="ID_RISIKO" value="<?php echo $ID_RISIKO; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/risiko') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
