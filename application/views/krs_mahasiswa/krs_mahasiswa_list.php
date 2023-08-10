<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Krs_mahasiswa</h3>
            </div>

            <div class="card-body">

                <form id="myform" method="post" onsubmit="return false">

                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-12 col-md-4">
                            <!-- <?php echo anchor(site_url('krs_mahasiswa/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?> -->
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
                                    <th width="10px">No</th>
                                    <th>Matakuliah</th>
                                    <th>Assign Mahasiswa</th>
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
    var global_id_matakuliah = 0;
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
                "url": "krs_mahasiswa/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id",
                    "orderable": false
                }, {
                    render: function(data, type, row) {
                        return `[${row.kode_matakuliah}] ${row.nama_matakuliah}`;
                    }
                },
                {
                    render: function(data, type, row) {
                        return `<button type="button" onclick="setMatkul(${row.id},${row.id_krs})" class="btn btn-sm btn-primary">Assign Mahasiswa</button>`;
                    }
                }
            ],
            columnDefs: [{
                    className: "text-center",
                    targets: 0,
                    checkcardes: {
                        selectRow: true,
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
                        url: "krs_mahasiswa/deletebulk",
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

    function setMatkul(id, id_krs) {
        var id_matakuliah = id;
        global_id_matakuliah = id;
        var id_krs = id_krs;

        //show modal #modalBootstrap
        $('#modalBootstrap').modal('show');

        var modalBodyBootstrap = $('#modalBootstrapBody');
        //hide modalBootstrapSave
        $('#modalBootstrapSave').hide();

        // ajax to get data from krs_mahasiswa/get_all_mahasiswa
        $.ajax({
            url: "krs_mahasiswa/get_all_mahasiswa",
            type: "post",
            async: false,
            data: {
                id_matakuliah: id_matakuliah,
                id_krs: id_krs
            },
            success: function(response) {
                // bikin table di modalBodyBootstrap
                modalBodyBootstrap.html(`<table style="width: 100%;" id="tableMahasiswa" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            </table>`);

                createDataTable(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    }

    function createDataTable(data) {
        data = JSON.parse(data);

        var table = $('#tableMahasiswa').DataTable({
            destroy: true,
            responsive: true,
            data: data,
            columns: [{
                    "data": "email",
                    "orderable": false
                }, {
                    render: function(data, type, row) {
                        return row.first_name + ' ' + row.last_name;
                    }
                },
                {
                    render: function(data, type, row) {
                        // return `<button type="button" onclick="assignMahasiswa(${row.id},${row.id_krs})" class="btn btn-sm btn-primary">Assign</button>`;
                        if (row.id_krs) {
                            return `<input type="checkbox" onclick="assignMahasiswa(${row.id})" checked>`;
                        } else {
                            return `<input type="checkbox" onclick="assignMahasiswa(${row.id})">`;
                        }
                    },
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            columnDefs: [{
                    className: "text-center",
                    targets: 0,
                    checkcardes: {
                        selectRow: true,
                    }
                }

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
    }

    function assignMahasiswa(id_mahasiswa) {
        var id_matakuliah = global_id_matakuliah;
        var id_mahasiswa = id_mahasiswa;

        // ajax to get assignMatakuliah
        $.ajax({
            url: "krs_mahasiswa/assignMatakuliah",
            type: "post",
            async: false,
            data: {
                id_matakuliah: id_matakuliah,
                id_mahasiswa: id_mahasiswa
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.true == true) {
                    iziToast.success({
                        title: 'Success',
                        message: 'Assign Mahasiswa Berhasil!',
                        position: 'topRight'
                    });
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: 'Assign Mahasiswa Gagal!',
                        position: 'topRight'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
</script>