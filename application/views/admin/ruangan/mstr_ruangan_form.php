<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Ruangan</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Ruangan</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
    <div class="card">
      <form action="<?php echo $action; ?>" method="post" class="form-valide">
	    <div class="form-group">
            <label for="varchar">Nama Ruangan</label>
            <input type="text" class="form-control" name="DESCP_RUANGAN" id="DESCP_RUANGAN" placeholder="Nama Ruangan" value="<?php echo $DESCP_RUANGAN; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_RUANGAN') ?> </small>
        </div>
	    <input type="hidden" name="ID_RUANGAN" value="<?php echo $ID_RUANGAN; ?>" />

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/ruangan') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
