<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Det_indeks_pegawai <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('NIK') ?></label>
            <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NAMA PEGAWAI <?php echo form_error('NAMA_PEGAWAI') ?></label>
            <input type="text" class="form-control" name="NAMA_PEGAWAI" id="NAMA_PEGAWAI" placeholder="NAMA PEGAWAI" value="<?php echo $NAMA_PEGAWAI; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP RUANGAN <?php echo form_error('DESCP_RUANGAN') ?></label>
            <input type="text" class="form-control" name="DESCP_RUANGAN" id="DESCP_RUANGAN" placeholder="DESCP RUANGAN" value="<?php echo $DESCP_RUANGAN; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP LEVEL <?php echo form_error('DESCP_LEVEL') ?></label>
            <input type="text" class="form-control" name="DESCP_LEVEL" id="DESCP_LEVEL" placeholder="DESCP LEVEL" value="<?php echo $DESCP_LEVEL; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESC KARIR <?php echo form_error('DESC_KARIR') ?></label>
            <input type="text" class="form-control" name="DESC_KARIR" id="DESC_KARIR" placeholder="DESC KARIR" value="<?php echo $DESC_KARIR; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP RISIKO <?php echo form_error('DESCP_RISIKO') ?></label>
            <input type="text" class="form-control" name="DESCP_RISIKO" id="DESCP_RISIKO" placeholder="DESCP RISIKO" value="<?php echo $DESCP_RISIKO; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP KET <?php echo form_error('DESCP_KET') ?></label>
            <input type="text" class="form-control" name="DESCP_KET" id="DESCP_KET" placeholder="DESCP KET" value="<?php echo $DESCP_KET; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP INTENSITAS <?php echo form_error('DESCP_INTENSITAS') ?></label>
            <input type="text" class="form-control" name="DESCP_INTENSITAS" id="DESCP_INTENSITAS" placeholder="DESCP INTENSITAS" value="<?php echo $DESCP_INTENSITAS; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">DESCP ABSENSI <?php echo form_error('DESCP_ABSENSI') ?></label>
            <input type="text" class="form-control" name="DESCP_ABSENSI" id="DESCP_ABSENSI" placeholder="DESCP ABSENSI" value="<?php echo $DESCP_ABSENSI; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('det_indeks') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>