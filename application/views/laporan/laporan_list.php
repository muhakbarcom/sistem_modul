<div class="row">
    <div class="col-md-12">
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Total Data</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    function formatCard(data) {
        return `${data.kode_matakuliah}`;
    }

    $(document).ready(function() {
        // ajax to get materi/get_by_id_dosen
        $.ajax({
            url: "laporan/get_laporan",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#myTable').DataTable({
                    data: data,
                    columns: [{
                        data: null,
                        render: function(data, type, row) {
                            return `${data.kode_matakuliah}`;
                        },
                        orderable: false,
                    }, {
                        data: null,
                        render: function(data, type, row) {
                            return `${data.nama_matakuliah}`;
                        },
                        orderable: false,
                    }, {
                        data: null,
                        render: function(data, type, row) {
                            return `${data.total_materi}`;
                        },
                        orderable: false,
                    }]
                });
            }
        });


    });
</script>