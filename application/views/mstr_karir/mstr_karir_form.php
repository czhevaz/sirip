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
        <h2 style="margin-top:0px">Mstr_karir <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">DESC KARIR <?php echo form_error('DESC_KARIR') ?></label>
            <input type="text" class="form-control" name="DESC_KARIR" id="DESC_KARIR" placeholder="DESC KARIR" value="<?php echo $DESC_KARIR; ?>" />
        </div>
	    <input type="hidden" name="ID_KARIR" value="<?php echo $ID_KARIR; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mstr_karir') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>