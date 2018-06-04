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
        <h2 style="margin-top:0px">Mstr_level Read</h2>
        <table class="table">
	    <tr><td>DESCP LEVEL</td><td><?php echo $DESCP_LEVEL; ?></td></tr>
	    <tr><td>POINT LEVEL</td><td><?php echo $POINT_LEVEL; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('level') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>