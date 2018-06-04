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
        <h2 style="margin-top:0px">Point_pegawai <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">ID PEGAWAI <?php echo form_error('ID_PEGAWAI') ?></label>
            <input type="text" class="form-control" name="ID_PEGAWAI" id="ID_PEGAWAI" placeholder="ID PEGAWAI" value="<?php echo $ID_PEGAWAI; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NAMA PEGAWAI <?php echo form_error('NAMA_PEGAWAI') ?></label>
            <input type="text" class="form-control" name="NAMA_PEGAWAI" id="NAMA_PEGAWAI" placeholder="NAMA PEGAWAI" value="<?php echo $NAMA_PEGAWAI; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Point <?php echo form_error('point') ?></label>
            <input type="text" class="form-control" name="point" id="point" placeholder="Point" value="<?php echo $point; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('point_pegawai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>