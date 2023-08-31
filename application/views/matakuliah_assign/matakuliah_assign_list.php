<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Matakuliah Assign</h3>

            </div>

            <div class="card-body">

                <form id="myform" method="post" onsubmit="return false">

                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-sm-12 col-md-4">
                            <!-- <?php echo anchor(site_url('matakuliah_assign/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?> -->
                        </div>
                        <div class="col-sm-12 col-md-4 text-center">
                            <div style="margin-top: 4px" id="message">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 text-right">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Matakuliah</th>
                                    <th>Kelas</th>

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
    var kelas = [];
    $(document).ready(function() {
        get_kelas();

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
                "url": "matakuliah_assign/json",
                "type": "POST"
            },
            columns: [{
                    "data": "id",
                    "orderable": false
                },
                {
                    "data": "matakuliah_nm"
                },
                {
                    render: function(data, type, row) {
                        var option_kelas = setOptionKelas(kelas, row.id_kelas);
                        return `<select onchange="changeKelas(${row.id},${row.id_assign},this)" class="form-control" name="kelas_id" id="kelas_id" required>${option_kelas}</select>`;
                    },
                    "data": "kelas_nm"
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
                        url: "matakuliah_assign/deletebulk",
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

    function get_kelas() {
        $.ajax({
            url: "Matakuliah_assign/get_kelas",
            type: "POST",
            async: false,
            dataType: "json",
            success: function(response) {
                kelas = response;
                console.log(response)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function setOptionKelas(data, current_id) {
        var option_kelas = "";
        if (current_id == undefined) {
            option_kelas += `<option value="" selected>Pilih Kelas</option>`;
        }
        $.each(data, function(index, value) {

            if (value.id == current_id) {
                option_kelas += `<option value="${value.id}" selected>${value.nama_kelas}</option>`;
            } else {
                option_kelas += `<option value="${value.id}">${value.nama_kelas}</option>`;
            }
        });
        return option_kelas;
    }

    function changeKelas(id_matakuliah, id_assign, obj) {
        var id_kelas = $(obj).val();
        var id_assign = id_assign;
        var id_matakuliah = id_matakuliah;


        // insert update to matakuliah_assign/assign_matakuliah
        $.ajax({
            url: "matakuliah_assign/assign_matakuliah",
            type: "post",
            data: {
                id_kelas: id_kelas,
                id_assign: id_assign,
                id_matakuliah: id_matakuliah
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == true) {
                    alertify.success("Data berhasil disimpan.");
                } else {
                    alertify.error("Data gagal disimpan.");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
</script>