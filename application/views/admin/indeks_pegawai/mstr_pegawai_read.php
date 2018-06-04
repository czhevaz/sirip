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
        <h2 style="margin-top:0px">Mstr_pegawai Read</h2>
        <table class="table">
	    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
	    <tr><td>NAMA PEGAWAI</td><td><?php echo $NAMA_PEGAWAI; ?></td></tr>
	    <tr><td>ID LEVEL</td><td><?php echo $ID_LEVEL; ?></td></tr>
	    <tr><td>ID RUANGAN</td><td><?php echo $ID_RUANGAN; ?></td></tr>
	    <tr><td>ID KARIR</td><td><?php echo $ID_KARIR; ?></td></tr>
	    <tr><td>ID RISIKO</td><td><?php echo $ID_RISIKO; ?></td></tr>
	    <tr><td>ID KET</td><td><?php echo $ID_KET; ?></td></tr>
	    <tr><td>ID INTENSITAS</td><td><?php echo $ID_INTENSITAS; ?></td></tr>
	    <tr><td>ID ABSENSI</td><td><?php echo $ID_ABSENSI; ?></td></tr>
	    <tr><td>ALAMAT</td><td><?php echo $ALAMAT; ?></td></tr>
	    <tr><td>GENDER</td><td><?php echo $GENDER; ?></td></tr>
	    <tr><td>TEMPAT LAHIR</td><td><?php echo $TEMPAT_LAHIR; ?></td></tr>
	    <tr><td>TGL LAHIR</td><td><?php echo $TGL_LAHIR; ?></td></tr>
	    <tr><td>EMAIL</td><td><?php echo $EMAIL; ?></td></tr>
	    <tr><td>PHONE</td><td><?php echo $PHONE; ?></td></tr>
	    <tr><td>STATUS</td><td><?php echo $STATUS; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('indeks_pegawai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>