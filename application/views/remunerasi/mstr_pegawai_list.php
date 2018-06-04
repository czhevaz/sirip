<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>



            <link rel="stylesheet" href="<?php echo base_url('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') ?>"/>
            <link rel="stylesheet" href="<?php echo base_url('https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css') ?>"/>
            <link rel="stylesheet" href="<?php echo base_url('https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css') ?>"/>
            <link rel="stylesheet" href="<?php echo base_url('assets/css/editor.dataTables.min.css') ?>"/>


        <style>
            .dataTables_wrapper {
                min-height: 500px
            }

            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Mstr_pegawai List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('remunerasi/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>NIK</th>
		    <th>NAMA PEGAWAI</th>
		    <th>ID LEVEL</th>
		    <th>ID RUANGAN</th>
		    <th>ID KARIR</th>
		    <th>ID RISIKO</th>
		    <th>ID KET</th>
		    <th>ID INTENSITAS</th>
		    <th>ID ABSENSI</th>
		    <th>ALAMAT</th>
		    <th>GENDER</th>
		    <th>TEMPAT LAHIR</th>
		    <th>TGL LAHIR</th>
		    <th>EMAIL</th>
		    <th>PHONE</th>
		    <th>STATUS</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>

        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              editor = new $.fn.dataTable.Editor( {
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
              };

              $('#mytable').on( 'click', 'tbody td:not(:first-child)', function (e) {
                  editor.inline( this );
              } );

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
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "remunerasi/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID_PEGAWAI",
                            "orderable": false
                        },{"data": "NIK"},{"data": "NAMA_PEGAWAI"},{"data": "ID_LEVEL"},{"data": "ID_RUANGAN"},{"data": "ID_KARIR"},{"data": "ID_RISIKO"},{"data": "ID_KET"},{"data": "ID_INTENSITAS"},{"data": "ID_ABSENSI"},{"data": "ALAMAT"},{"data": "GENDER"},{"data": "TEMPAT_LAHIR"},{"data": "TGL_LAHIR"},{"data": "EMAIL"},{"data": "PHONE"},{"data": "STATUS"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
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
    </body>
</html>
