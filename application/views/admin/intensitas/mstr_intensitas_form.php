<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Intensitas</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Intensitas</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>
    <!-- Start Page Content -->
<div class="card">
  <form action="<?php echo $action; ?>" method="post" class="form-valide">
	    <div class="form-group">
            <label for="varchar">Deskripsi Intensitas</label>
            <input type="text" class="form-control" name="DESCP_INTENSITAS" id="DESCP_INTENSITAS" placeholder="Deskripsi Intensitas" value="<?php echo $DESCP_INTENSITAS; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_INTENSITAS') ?> </small>
        </div>
	    <div class="form-group">
            <label for="decimal">Point Intensitas</label>
            <input type="text" class="form-control" name="POINT_INTENSITAS" id="POINT_INTENSITAS" placeholder="0.00" value="<?php echo $POINT_INTENSITAS; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('POINT_INTENSITAS') ?> </small>
        </div>
	    <input type="hidden" name="ID_INTENSITAS" value="<?php echo $ID_INTENSITAS; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/intensitas') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
