<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

            </div>

            <div class="card-body">

                <form id="myform" method="post" onsubmit="return false">

                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-12 col-md-4">
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">

                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 text-right">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                                    <th>Program Name</th>
                                    <th>Nama Peserta</th>
                                    <th>Role</th>
                                    <th>Step</th>
                                    <th>Status</th>

                                    <th width="80px">Action</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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

        var t = $("#mytable").DataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode != 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            scrollCollapse: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "review_peserta/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id_program",
                    "orderable": false,
                    "className": "text-center",
                    "visible": false,
                },
                {
                    "data": "id_program",
                    "orderable": false
                }, {
                    "data": "program_name",
                    "name": "ip.program_name"
                }, {
                    "data": "name",
                    "name": "name"
                }, {
                    "data": "role_name",
                    "name": "ir.role_name"
                },
                {
                    'render': function(data, type, row) {
                        var step = row.step;
                        var text = '';
                        switch (step) {
                            case '0':
                                text = 'Registration';
                                return '<span class="badge badge-secondary">' + step + '</span> <span class="badge badge-secondary">' + text + '</span>';
                                break;
                            case '1':
                                text = 'Administration';
                                return '<span class="badge badge-info">' + step + '</span> <span class="badge badge-info">' + text + '</span>';
                                break;
                            case '2':
                                text = 'Interview';
                                return '<span class="badge badge-primary">' + step + '</span> <span class="badge badge-primary">' + text + '</span>';
                                break;
                            case '3':
                                text = 'On Job';
                                return '<span class="badge badge-warning">' + step + '</span> <span class="badge badge-warning">' + text + '</span>';
                                break;
                            case '4':
                                text = 'Graduation';
                                return '<span class="badge badge-success">' + step + '</span> <span class="badge badge-success">' + text + '</span>';
                                break;
                        }


                    },
                    name: 'step'
                },
                {
                    'render': function(data, type, row) {
                        var status = row.status;
                        var text = '';
                        switch (status) {
                            case '0':
                                text = 'Ditolak';
                                return '<span class="badge badge-danger">' + text + '</span>';
                                break;
                            case '1':
                                text = 'Belum Dikonfirmasi';
                                return '<span class="badge badge-info">' + text + '</span>';
                                break;
                            case '2':
                                text = 'Diterima';
                                return '<span class="badge badge-success">' + text + '</span>';
                                break;
                        }


                    },
                    name: 'step'
                },
                {
                    'render': function(data, type, row) {
                        var status = row.status;
                        var step = row.step;
                        var id_ipm = row.id_ipm;
                        var text = '';

                        if (parseInt(step) === 3) {
                            switch (status) {
                                case '0':
                                    text = 'Ditolak';
                                    return `<a href="<?= base_url('review_peserta/terima/'); ?>${id_ipm}" class="btn btn-info btn-sm"><i class="fa fa-check"></i> Terima</a>`;

                                    break;
                                case '1':
                                    text = 'Belum Dikonfirmasi';
                                    return `<a href="<?= base_url('review_peserta/terima/'); ?>${id_ipm}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a> <a href="<?= base_url('review_peserta/tolak/'); ?>${id_ipm}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>`;
                                    break;
                                case '2':
                                    text = 'Diterima';
                                    return `<a href="<?= base_url('review_peserta/tolak/'); ?>${id_ipm}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</a>`;
                                    break;
                            }
                        } else {
                            return '';
                        }

                    },
                    name: 'step'
                }
                // ,
                // {
                //     "data": "action",
                //     "orderable": false,
                //     "className": "text-center",
                //     "width": "150px"
                // }
            ],
            order: [
                [1, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
        $('#myform').keypress(function(e) {
            if (e.which == 13) return false;

        });
        $("#myform").on('submit', function(e) {
            var form = this
            var rowsel = t.column(0).checkcardes.selected();
            $.each(rowsel, function(index, rowId) {
                $(form).append(
                    $('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
                )
            });

            if (rowsel.join(",") == "") {
                alertify.alert('', 'Tidak ada data terpilih!', function() {});

            } else {
                var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?', 'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                    ok: 'Yakin',
                    cancel: 'Batal!'
                }).set('onok', function(closeEvent) {
                    $.ajax({
                        url: "internship_program/deletebulk",
                        type: "post",
                        data: "msg = " + rowsel.join(","),
                        success: function(response) {
                            if (response == true) {
                                location.reload();
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });

                });
            }
            $(".ajs-header").html("Konfirmasi");
        });
    });

    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
</script>