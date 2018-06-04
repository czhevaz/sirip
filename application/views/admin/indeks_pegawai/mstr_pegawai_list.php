<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Indeks Pegawai</h3>
        </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Indeks</a></li>
            <li class="breadcrumb-item active">Detail Pegawai</li>
        </ol>
        </div>
    </div>

    <div class="col-12">
         <div class="card">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-4">
                      <?php echo anchor(site_url('admin/indeks_pegawai/excel'), '<button type="button" class="btn btn-info"><i class="fa fa-download"></i>&nbsp;&nbsp;Import</button>'); ?>
                </div>
                <div class="col-md-4 text-center">
                  <div id="message">
                      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                  </div>
                </div>

        <table class="display nowrap table table-hover table-striped" cellspacing="0" width="100%" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>NIK</th>
		    <th>Nama Lengkap</th>
		    <th>Jabatan</th>
		    <th>Ruangan</th>
		    <th>Jenjang Karir</th>
		    <th>Risiko Kerja</th>
		    <th>ket Khusus</th>
		    <th>Intensitas Pasien</th>
		    <th>Kehadiran</th>

                </tr>
            </thead>
          </table>
        </div>
        </div>
        </div>
        </div>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "<i class='fa fa-spinner fa-pulse'>&nbsp;Loading...</i>"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "indeks_pegawai/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID_PEGAWAI",
                            "orderable": false
                        },
                        {"data": "NIK"},{"data": "NAMA_PEGAWAI"},{"data": "Jabatan"},{"data": "NamaRuangan"},{"data": "JenjangKarir"},{"data": "RisikoKerja"},{"data": "KetKhusus"},{"data": "IntensitasPasien"},
                        {"data": "Kehadiran"}

                    ],
                    order: [[0, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
