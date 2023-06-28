<div class="row">
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $title . " Role"  ?></h4>
            </div>
            <div class="card-body">
                <form id="myform" method="post" onsubmit="return false">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <?php echo anchor(site_url('groups/create'), '<i class="fa fa-plus"></i> Create a new role', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 text-right">
                            <?php //echo anchor(site_url('groups/printdoc'), '<i class="fas fa-print"></i> Print', 'class="btn btn-warning"'); 
                            ?>
                            <?php //echo anchor(site_url('groups/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); 
                            ?>
                            <?php //echo anchor(site_url('groups/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); 
                            ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped" id="mytable" width="100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
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
                "url": "groups/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id",
                    "orderable": false,
                    "className": "d-none"
                },
                {
                    "data": "id",
                    "orderable": false
                }, {
                    "data": "name"
                }, {
                    "data": "description"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            columnDefs: [{
                    className: "text-center",
                    targets: 0,
                    checkboxes: {
                        selectRow: false,
                    }
                }

            ],
            select: {
                style: 'multi'
            },
            order: [
                [1, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(1)', row).html(index);
            }
        });
        $('#myform').keypress(function(e) {
            if (e.which == 13) return false;

        });
        $("#myform").on('submit', function(e) {
            var form = this
            var rowsel = t.column(0).checkboxes.selected();
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
                        url: "groups/deletebulk",
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