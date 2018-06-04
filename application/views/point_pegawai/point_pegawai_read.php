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
        <h2 style="margin-top:0px">Point_pegawai Read</h2>
        <table class="table">
	    <tr><td>ID PEGAWAI</td><td><?php echo $ID_PEGAWAI; ?></td></tr>
	    <tr><td>NAMA PEGAWAI</td><td><?php echo $NAMA_PEGAWAI; ?></td></tr>
	    <tr><td>Point</td><td><?php echo $point; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('point_pegawai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>