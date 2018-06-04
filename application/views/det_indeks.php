<!doctype html>
<html>
    <head>
        <title>Chain Dropdown - harviacode</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>"/>
    </head>
    <body>
        <div class="container">
            <div class="col-md-6">
                <h2>Chain Dropdown Example</h2>
                <form action="<?php echo site_url('chain/aksi_form') ?>" method="post">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">- Pilih Jabatan -</option>
                            <?php
                            foreach ($mstr_level as $prov) {
                                ?>
                                <option <?php echo $mstr_level_selected == $prov->ID_LEVEL ? 'selected="selected"' : '' ?>
                                    value="<?php echo $prov->ID_LEVEL ?>"><?php echo $prov->DESCP_LEVEL ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
        <script>
//            $("#kota").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
//            $("#kecamatan").chained("#kota"); // disini kita hubungkan kecamatan dengan kota
        </script>
    </script>
</body>
</html>
