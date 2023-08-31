<div class="row">
    <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    function formatCard(data) {
        return `<div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8"><h5>${data.kode_matakuliah} ${data.nama_matakuliah}</h5></div>
                                    <div class="col-md-4 justify-content-end"><center><a href="<?= base_url('materi/detail_materi/') ?>${data.id}" class="btn btn-primary">Tambah Materi</a></center></div>
                                </div>
                            </div>
                        </div>
                    </div>`;
    }

    $(document).ready(function() {
        // ajax to get materi/get_by_id_dosen
        $.ajax({
            url: "materi/get_by_id_dosen",
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                $('#myTable').DataTable({
                    data: data,
                    columns: [{
                        data: null,
                        render: function(data, type, row) {
                            return formatCard(data);
                        },
                        orderable: false,
                    }]
                });
            }
        });


    });
</script>