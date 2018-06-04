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
        <h2 style="margin-top:0px">Det_indeks_pegawai Read</h2>
        <table class="table">
	    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
	    <tr><td>NAMA PEGAWAI</td><td><?php echo $NAMA_PEGAWAI; ?></td></tr>
	    <tr><td>DESCP RUANGAN</td><td><?php echo $DESCP_RUANGAN; ?></td></tr>
	    <tr><td>DESCP LEVEL</td><td><?php echo $DESCP_LEVEL; ?></td><td><?php echo $POINT_LEVEL; ?></td></tr>
	    <tr><td>DESC KARIR</td><td><?php echo $DESC_KARIR; ?></td></tr>
	    <tr><td>DESCP RISIKO</td><td><?php echo $DESCP_RISIKO; ?></td></tr>
	    <tr><td>DESCP KET</td><td><?php echo $DESCP_KET; ?></td></tr>
	    <tr><td>DESCP INTENSITAS</td><td><?php echo $DESCP_INTENSITAS; ?></td></tr>
	    <tr><td>DESCP ABSENSI</td><td><?php echo $DESCP_ABSENSI; ?></td></tr>
      <tr><td>STATUS</td><td><?php echo $STATUS; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('det_indeks') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
