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
            <label for="varchar">ID LEVEL <?php echo form_error('ID_LEVEL') ?></label>
            <input type="text" class="form-control" name="ID_LEVEL" id="ID_LEVEL" placeholder="ID LEVEL" value="<?php echo $ID_LEVEL; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID RUANGAN <?php echo form_error('ID_RUANGAN') ?></label>
            <input type="text" class="form-control" name="ID_RUANGAN" id="ID_RUANGAN" placeholder="ID RUANGAN" value="<?php echo $ID_RUANGAN; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ID KARIR <?php echo form_error('ID_KARIR') ?></label>
            <input type="text" class="form-control" name="ID_KARIR" id="ID_KARIR" placeholder="ID KARIR" value="<?php echo $ID_KARIR; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID RISIKO <?php echo form_error('ID_RISIKO') ?></label>
            <input type="text" class="form-control" name="ID_RISIKO" id="ID_RISIKO" placeholder="ID RISIKO" value="<?php echo $ID_RISIKO; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID KET <?php echo form_error('ID_KET') ?></label>
            <input type="text" class="form-control" name="ID_KET" id="ID_KET" placeholder="ID KET" value="<?php echo $ID_KET; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID INTENSITAS <?php echo form_error('ID_INTENSITAS') ?></label>
            <input type="text" class="form-control" name="ID_INTENSITAS" id="ID_INTENSITAS" placeholder="ID INTENSITAS" value="<?php echo $ID_INTENSITAS; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID ABSENSI <?php echo form_error('ID_ABSENSI') ?></label>
            <input type="text" class="form-control" name="ID_ABSENSI" id="ID_ABSENSI" placeholder="ID ABSENSI" value="<?php echo $ID_ABSENSI; ?>" />
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
            <label for="varchar">STATUS <?php echo form_error('STATUS') ?></label>
            <input type="text" class="form-control" name="STATUS" id="STATUS" placeholder="STATUS" value="<?php echo $STATUS; ?>" />
        </div>
	    <input type="hidden" name="ID_PEGAWAI" value="<?php echo $ID_PEGAWAI; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('remunerasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>