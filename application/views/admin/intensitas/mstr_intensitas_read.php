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
        <h2 style="margin-top:0px">Mstr_intensitas Read</h2>
        <table class="table">
	    <tr><td>DESCP INTENSITAS</td><td><?php echo $DESCP_INTENSITAS; ?></td></tr>
	    <tr><td>POINT INTENSITAS</td><td><?php echo $POINT_INTENSITAS; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('intensitas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>