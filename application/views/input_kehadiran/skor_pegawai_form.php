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
        <h2 style="margin-top:0px">Skor_pegawai <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pegawai <?php echo form_error('id_pegawai') ?></label>
            <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" placeholder="Id Pegawai" value="<?php echo $id_pegawai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pegawai <?php echo form_error('nama_pegawai') ?></label>
            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Point <?php echo form_error('point') ?></label>
            <input type="text" class="form-control" name="point" id="point" placeholder="Point" value="<?php echo $point; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('input_kehadiran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>