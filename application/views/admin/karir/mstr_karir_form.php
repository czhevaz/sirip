<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Jenjang Karir</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Jenjang Karir</a></li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>

<div class="card">
        <form action="<?php echo $action; ?>" method="post" class="form-valide">
          <div class="form-group">
                <label for="varchar">Kd Jenjang Karir</label>
                <input type="text" class="form-control" name="ID_KARIR" id="ID_KARIR" placeholder="Kode : PK0/PKI/PKII/PKIII/PKIV.." value="<?php echo $ID_KARIR; ?>" />
                <small class="form-control-feedback"> <?php echo form_error('ID_KARIR') ?> </small>
            </div>
	      <div class="form-group">
            <label for="varchar">Deskripsi Jenjang Karir</label>
            <input type="text" class="form-control" name="DESCP_KARIR" id="DESCP_KARIR" placeholder="Deskripsi" value="<?php echo $DESCP_KARIR; ?>" />
            <small class="form-control-feedback"> <?php echo form_error('DESCP_KARIR') ?> </small>
        </div>
        <div class="form-group">
              <label for="varchar">Point Karir</label>
              <input type="text" class="form-control" name="POINT_KARIR" id="POINT_KARIR" placeholder="0.00" value="<?php echo $POINT_KARIR; ?>" />
              <small class="form-control-feedback"> <?php echo form_error('POINT_KARIR') ?> </small>
          </div>


	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    &nbsp<a href="<?php echo site_url('admin/karir') ?>" class="btn btn-warning">Cancel</a>
	</form>
</div>
</div>
</div>
