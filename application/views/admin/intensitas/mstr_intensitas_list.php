<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Intensitas/ Ketergantungan Pasien</h3>
        </div>
        <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
            <li class="breadcrumb-item active">Intensitas</li>
        </ol>
        </div>
    </div>

    <div class="col-12">
         <div class="card">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-4">
              <?php echo anchor(site_url('admin/intensitas/create'), '<button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Tambah</button>'); ?>&nbsp
              <?php echo anchor(site_url('admin/intensitas/excel'), '<button type="button" class="btn btn-info"><i class="fa fa-download"></i>&nbsp;&nbsp;Import</button>'); ?>
            </div>
            <div class="col-md-4" align="center">
              <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
              </div>
            </div>
          </div>

            <table class="display nowrap table table-hover table-striped" cellspacing="0" width="100%" id="mytable">
            <thead>
                <tr>
                    <th width="50px">No</th>
		    <th>Deskripsi</th>
		    <th>Point</th>
		    <th width="100px">Action</th>
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
                    ajax: {"url": "intensitas/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID_INTENSITAS",
                            "orderable": false
                        },{"data": "DESCP_INTENSITAS"},{"data": "POINT_INTENSITAS"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[1, 'desc']],
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
