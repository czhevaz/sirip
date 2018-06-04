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
        <h2 style="margin-top:0px">Mstr_pegawai <?php echo $button ?></h2>
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
            <label for="varchar">ALAMAT <?php echo form_error('ALAMAT') ?></label>
            <input type="text" class="form-control" name="ALAMAT" id="ALAMAT" placeholder="ALAMAT" value="<?php echo $ALAMAT; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">GENDER <?php echo form_error('GENDER') ?></label>
            <input type="text" class="form-control" name="GENDER" id="GENDER" placeholder="GENDER" value="<?php echo $GENDER; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TEMPAT LAHIR <?php echo form_error('TEMPAT_LAHIR') ?></label>
            <input type="text" class="form-control" name="TEMPAT_LAHIR" id="TEMPAT_LAHIR" placeholder="TEMPAT LAHIR" value="<?php echo $TEMPAT_LAHIR; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TGL LAHIR <?php echo form_error('TGL_LAHIR') ?></label>
            <input type="text" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" placeholder="TGL LAHIR" value="<?php echo $TGL_LAHIR; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EMAIL <?php echo form_error('EMAIL') ?></label>
            <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" value="<?php echo $EMAIL; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PHONE <?php echo form_error('PHONE') ?></label>
            <input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="PHONE" value="<?php echo $PHONE; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PHOTO <?php echo form_error('PHOTO') ?></label>
            <input type="text" class="form-control" name="PHOTO" id="PHOTO" placeholder="PHOTO" value="<?php echo $PHOTO; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AKTIF <?php echo form_error('AKTIF') ?></label>
            <input type="text" class="form-control" name="AKTIF" id="AKTIF" placeholder="AKTIF" value="<?php echo $AKTIF; ?>" />
        </div>
	    <input type="hidden" name="ID_PEGAWAI" value="<?php echo $ID_PEGAWAI; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mstr_pegawai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>