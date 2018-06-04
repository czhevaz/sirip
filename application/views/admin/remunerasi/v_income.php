<link href="<?php echo base_url(); ?>assets/css/metro.css" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Hitung Remunerasi</h3>
        </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Hitung Remunerasi</a></li>
            <li class="breadcrumb-item active">Pendapatan</li>
        </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-outline-info">
                  <div class="card-header">
                      <h4 class="m-b-0 text-white">1. Input Nominal</h4>
                  </div>
                      <p>
                      <div class="card-body">
                        <div class="basic-form">
                          <form action="<?php echo base_url('admin/Income/insert_income'); ?>" method="post" class="form-valide">
                            <div class="form-group">
                              <input type="text" name="ID_INCOME" id="ID_INCOME" class="form-control" value="<?php echo $ID_INCOME; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <input type="date" name="TGL_INCOME" id="TGL_INCOME" class="form-control" value="<?php $tgl=date('Y-m-d'); echo $tgl; ?>" readonly/>
                            </div>
                            <div class="form-group">
                              <input type="hidden" name="JML_HARI" id="JML_HARI" class="form-control" value="<?php $tahun = date('Y'); $bulan = date('m'); $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); echo $tanggal; ?>" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" name="JUMLAH" id="JUMLAH" class="form-control" placeholder="Nominal">
                            </div>
                            <div class="form-group">
                              <label>Keterangan</label>
                              <input type="text" name="KETERANGAN" id="KETERANGAN" class="form-control" placeholder="Keterangan">
                            </div>
                            <button type="submit" class="btn btn-info">Simpan</button>
                            </form>
                      </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-9">
                <div class="card card-outline-info">
                  <div class="card-header">
                      <h4 class="m-b-0 text-white">2. Input Absen Kehadiran</h4>
                  </div>
                        <div class="card-body">
                            <div class="basic-form">
                              <form action="<?php echo base_url('admin/Income/input_absen'); ?>" method="post" class="form-valide">
                              <div class="table-responsive">
                                <table class="table">

                    						<tbody>
                                  <td style='width:500px;'>
                                    <div class="input-control select full-size">
                                      <select id="mutasi" onChange="get_data(this.value)" class="form-control form-control input-sm custom-select">
                                      <option></option>
                                      </select>
                                    </div>
                                  </td>
                                  <td style='width:200px;'>
                                    <div class="input-control select full-size">
                                      <input type="text" name="DESCP_LEVEL" placeholder="Jabatan" disabled>
                                    </div>
                                  </td>
                                  <td style='width:200px;'>
                                    <div class="input-control select full-size">
                                      <input type="text" name="DESCP_RUANGAN" placeholder="Ruangan" disabled>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="input-control select full-size">
                                      <input type="text" name="ABSEN">
                                    </div>
                                  </td>
                                  <td>
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                  </td>
                                </tbody>
                    					</table>


                              </div>
                            </div>
                            </div>
                          </div>

                            </div>
                          </div> <!-- /# row -->
                        </div> <!-- /# container fluid -->
                      </div> <!-- /# wrapper -->



<script type="text/javascript">
$("#mutasi").select2({
	placeholder:"Cari Pegawai...",
	ajax:{
		url:"<?php echo base_url('admin/Income/cari_pegawai')?>",
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
		url :"<?php echo base_url('admin/Income/get_info') ?>",
		data:{id : v_id},
		success: function(data)
		{
			var dt = JSON.parse(data);
			$("input[name=NAMA_PEGAWAI]").val(dt.NAMA_PEGAWAI);
			$("input[name=DESCP_LEVEL]").val(dt.DESCP_LEVEL);
			$("input[name=DESCP_RUANGAN]").val(dt.DESCP_RUANGAN);
//      $("input[name=ABSEN]").val(dt.ABSEN);
//      $("input[name=DESCP_KARIR]").val(dt.DESCP_KARIR);
//      $("input[name=DESCP_RISIKO]").val(dt.DESCP_RISIKO);
//      $("input[name=DESCP_KET]").val(dt.DESCP_KET);
//      $("input[name=DESCP_INTENSITAS]").val(dt.DESCP_INTENSITAS);
//      $("input[name=DESCP_ABSENSI]").val(dt.DESCP_ABSENSI);
//      $("input[name=ID_PEGAWAI]").val(dt.ID_PEGAWAI);
//      $("input[name=ID_LEVEL]").val(dt.ID_LEVEL);
//      $("input[name=ID_RUANGAN]").val(dt.ID_RUANGAN);
//      $("input[name=ID_KARIR]").val(dt.ID_KARIR);
//      $("input[name=ID_RISIKO]").val(dt.ID_RISIKO);
//      $("input[name=ID_KET]").val(dt.ID_KET);
//      $("input[name=ID_INTENSITAS]").val(dt.ID_INTENSITAS);
//      $("input[name=ID_ABSENSI]").val(dt.ID_ABSENSI);
			//$("input[name=h_jual]").val(dt.h_barang);
			//$("input[name=h_beli]").val(dt.h_beli);
			//$("input[name=stock]").val(dt.h_beli);

		}
	});

}
</script>
