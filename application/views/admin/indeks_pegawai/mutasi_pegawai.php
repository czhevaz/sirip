
<link href="<?php echo base_url(); ?>assets/css/metro.css" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>


<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Mutasi Pegawai</h3>
        </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Indeks</a></li>
            <li class="breadcrumb-item active">Mutasi Pegawai</li>
        </ol>
        </div>
    </div>


<div class="container-fluid">
  

<div class="card">
  <div class="col-md-4" align="center">
     <div id="message">
       <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
     </div>
   </div>
<form action="<?php echo base_url('admin/Mutasi_pegawai/proses_input'); ?>" method="post" class="form-valide">
	<div class="grid">
  	<div class="row cells5">
    	<div class="cell colspan2">
      	<div class="example" data-text="">
          <div class="input-control select full-size">
            <select id="mutasi" onChange="get_data(this.value)" class="form-control form-control input-sm custom-select">
                <option></option>
            </select>
          </div>
        </div>
			<div class="cell colspan2">
				<div class="card-title">
						<h4>Indeks Lama</h4>
				</div>
	      	<div class="example" data-text="">
	        	<label>Nama Pegawai</label>
	        	<div class="input-control text full-size">
	              <input type="text" name="NAMA_PEGAWAI" disabled>
                <input type="text" name="ID_PEGAWAI" id="ID_PEGAWAI" class="form-control">

	          </div>
	          <label>Jabatan</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_LEVEL" disabled>
                <input type="text" name="ID_LEVEL" id="ID_LEVEL" class="form-control">
	          </div>
	          <label>Ruangan</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_RUANGAN" disabled>
                <input type="hidden" name="ID_RUANGAN" id="ID_RUANGAN" class="form-control" disabled>

	          </div>
	          <label>jenjang Karir</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_KARIR" disabled>
                <input type="hidden" name="ID_KARIR" id="ID_KARIR" class="form-control" disabled>

	          </div>
	          <label>Risiko Kerja</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_RISIKO" disabled>
                <input type="hidden" name="ID_RISIKO" id="ID_RISIKO" class="form-control" disabled>

	          </div>
	          <label>Keterampilan Khusus</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_KET" disabled>
                <input type="hidden" name="ID_KET" id="ID_KET" class="form-control" disabled>

	          </div>
	          <label>Intensitas Pasien</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_INTENSITAS" disabled>
                <input type="hidden" name="ID_INTENSITAS" id="ID_INTENSITAS" class="form-control" disabled>

	          </div>
	          <label>Kehadiran</label>
	          <div class="input-control text full-size">
	              <input type="text" name="DESCP_ABSENSI" disabled>
                <input type="hidden" name="ID_ABSENSI" id="ID_ABSENSI" class="form-control" disabled>

	          </div>
	    </div>
    </div>
	</div>

<div class="cell colspan3">
	<div class="example">
        <div class="row">
            <div class="cell-md-3">
              <div class="input-group">
                <input type="text" name="ID_MUTASI" class="form-control" value="<?php echo $ID_MUTASI; ?>" readonly>&nbsp;&nbsp;&nbsp;
                <input type="date" class="form-control datepicker" placeholder="mm/dd/yyyy" name="TGL_MUTASI" id="TGL_MUTASI" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>" />
              </div>
            </div>
        </div>
	</div>
</div>

			<div class="cell colspan3">
				    <div class="card-title">
						        <h4>Indeks baru</h4>
				    </div>
			      <div class="example" data-text="">
					         <div class="form-group">
	                     <label for="varchar">Jabatan</label>
	                      <?php echo cmb_dinamis('ID_LEVEL', 'mstr_level', 'DESCP_LEVEL','ID_LEVEL')?>
	                  </div>
					          <div class="form-group">
								       <label for="int">Ruangan</label>
								       <?php echo cmb_dinamis('ID_RUANGAN', 'mstr_ruangan', 'DESCP_RUANGAN','ID_RUANGAN')?>
					          </div>
					          <div class="form-group">
								        <label for="varchar">Jenjang Karir</label>
								        <?php echo cmb_dinamis('ID_KARIR', 'mstr_karir', 'DESCP_KARIR','ID_KARIR')?>
						        </div>
						        <div class="form-group">
									       <label for="int">Risiko kerja</label>
									       <?php echo cmb_dinamis('ID_RISIKO', 'mstr_risiko_kerja', 'DESCP_RISIKO','ID_RISIKO')?>
							      </div>
						        <div class="form-group">
									       <label for="int">Keterampilan Khusus</label>
									       <?php echo cmb_dinamis('ID_KET', 'mstr_ket_khusus', 'DESCP_KET','ID_KET')?>
							      </div>
						        <div class="form-group">
									        <label for="int">Intensitas Pasien</label>
									        <?php echo cmb_dinamis('ID_INTENSITAS', 'mstr_intensitas', 'DESCP_INTENSITAS','ID_INTENSITAS')?>
							      </div>
						        <div class="form-group">
									        <label for="int">Kehadiran</label>
									        <?php echo cmb_dinamis('ID_ABSENSI', 'mstr_absensi', 'DESCP_ABSENSI','ID_ABSENSI')?>
							      </div>
			    </div>
  		</div>
		</div>
	</div>
  <button type="submit" class="btn btn-info">Simpan</button>

    </form>
</div>


<script type="text/javascript">
$("#mutasi").select2({
	placeholder:"Cari Pegawai...",
	ajax:{
		url:"<?php echo base_url('admin/Mutasi_pegawai/mutasi')?>",
		dataType: 'json',
		data: function (params) {

            var queryParameters = {
                text: params.term
            }
            return queryParameters;
        }
	},
	cache: true,
	minimumInputLength: 2,
	formatResult: format,
	formatSelection: format,
	escapeMarkup: function(m) { return m; }
});
function format(x)
{
	return x.text;
}
function get_data(v_id)
{
	$.ajax({
		url :"<?php echo base_url('admin/Mutasi_pegawai/get_info') ?>",
		data:{id : v_id},
		success: function(data)
		{
			var dt = JSON.parse(data);
			$("input[name=NAMA_PEGAWAI]").val(dt.NAMA_PEGAWAI);
			$("input[name=DESCP_LEVEL]").val(dt.DESCP_LEVEL);
			$("input[name=DESCP_RUANGAN]").val(dt.DESCP_RUANGAN);
      $("input[name=DESCP_KARIR]").val(dt.DESCP_KARIR);
      $("input[name=DESCP_RISIKO]").val(dt.DESCP_RISIKO);
      $("input[name=DESCP_KET]").val(dt.DESCP_KET);
      $("input[name=DESCP_INTENSITAS]").val(dt.DESCP_INTENSITAS);
      $("input[name=DESCP_ABSENSI]").val(dt.DESCP_ABSENSI);
      $("input[name=ID_PEGAWAI]").val(dt.ID_PEGAWAI);
      $("input[name=ID_LEVEL]").val(dt.ID_LEVEL);
      $("input[name=ID_RUANGAN]").val(dt.ID_RUANGAN);
      $("input[name=ID_KARIR]").val(dt.ID_KARIR);
      $("input[name=ID_RISIKO]").val(dt.ID_RISIKO);
      $("input[name=ID_KET]").val(dt.ID_KET);
      $("input[name=ID_INTENSITAS]").val(dt.ID_INTENSITAS);
      $("input[name=ID_ABSENSI]").val(dt.ID_ABSENSI);

		}
	});

}
</script>
