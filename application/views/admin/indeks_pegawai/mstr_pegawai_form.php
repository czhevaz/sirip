<div class="page-wrapper">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Form Data Pegawai</h3>
    </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item">Pegawai</li>
            <li class="breadcrumb-item active">Input</li>
        </ol>
        </div>
  </div>

  <!-- Start Page Content -->

  <div class="card">
        <div class="card-title">
            <h4>Profil Pegawai</h4>
        </div>

        <form action="<?php echo $action; ?>" method="post" class="form-valide">


                <div class="form-group">
                    <label class="control-label">NIP/ NIK<span class="text-danger"> *</span></label>
                    <input type="text" id="NIK" class="form-control" name="NIK" placeholder="123456789">
                    <small class="form-control-feedback"><?php echo form_error('NIK') ?> </small>
                </div>


      <div class="form-group">
                <label class="control-label col-xs-3" >Nama Lengkap</label>
                <div class="col-xs-9">
                    <input name="NAMA_PEGAWAI" class="form-control" type="text" placeholder="NAMA_PEGAWAI" readonly>
                </div>
            </div>



	    <div class="form-group">
            <label for="varchar">ID LEVEL <?php echo form_error('ID_LEVEL') ?></label>
            <?php echo cmb_dinamis('ID_LEVEL', 'mstr_level', 'DESCP_LEVEL','ID_LEVEL', $ID_LEVEL)?>

        </div>
	    <div class="form-group">
            <label for="int">ID RUANGAN <?php echo form_error('ID_RUANGAN') ?></label>
            <?php echo cmb_dinamis('ID_RUANGAN', 'mstr_ruangan', 'DESCP_RUANGAN','ID_RUANGAN', $ID_RUANGAN)?>

        </div>
	    <div class="form-group">
            <label for="varchar">ID KARIR <?php echo form_error('ID_KARIR') ?></label>
            <?php echo cmb_dinamis('ID_KARIR', 'mstr_karir', 'DESCP_KARIR','ID_KARIR', $ID_KARIR)?>

        </div>
	    <div class="form-group">
            <label for="int">ID RISIKO <?php echo form_error('ID_RISIKO') ?></label>
            <?php echo cmb_dinamis('ID_RISIKO', 'mstr_risiko_kerja', 'DESCP_RISIKO','ID_RISIKO', $ID_RISIKO)?>

        </div>
	    <div class="form-group">
            <label for="int">ID KET <?php echo form_error('ID_KET') ?></label>
            <?php echo cmb_dinamis('ID_KET', 'mstr_ket_khusus', 'DESCP_KET','ID_KET', $ID_KET)?>

        </div>
	    <div class="form-group">
            <label for="int">ID INTENSITAS <?php echo form_error('ID_INTENSITAS') ?></label>
            <?php echo cmb_dinamis('ID_INTENSITAS', 'mstr_intensitas', 'DESCP_INTENSITAS','ID_INTENSITAS', $ID_INTENSITAS)?>

        </div>
	    <div class="form-group">
            <label for="int">ID ABSENSI <?php echo form_error('ID_ABSENSI') ?></label>
            <?php echo cmb_dinamis('ID_ABSENSI', 'mstr_absensi', 'DESCP_ABSENSI','ID_ABSENSI', $ID_ABSENSI)?>

        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>

	</form>



  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
      $(document).ready(function(){
           $('#NIK').on('input',function(){

              var NIK=$(this).val();
              $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url('admin/indeks_pegawai/update')?>",
                  dataType : "JSON",
                  data : {NIK: NIK},
                  cache:false,
                  success: function(data){
                      $.each(data,function(NIK, NAMA_PEGAWAI){
                          $('[name="NAMA_PEGAWAI"]').val(data.NAMA_PEGAWAI);


                      });

                  }
              });
              return false;
         });

      });
  </script>
