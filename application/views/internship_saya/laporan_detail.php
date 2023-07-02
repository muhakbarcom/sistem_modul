<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url('internship_saya/detail/' . $id_program); ?>" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Minggu ke-<?= $mingguKe; ?> (<?= tanggal_laporan_internship($weekStart); ?> - <?= tanggal_laporan_internship($weekEnd); ?>)</h4>
                        Kamu menyelesaikan semua laporan harian untuk dapat mengisi laporan mingguan.
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="senin" class="selectgroup-input" checked disabled>
                                <span class="selectgroup-button selectgroup-button-icon">S</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="selasa" class="selectgroup-input" checked disabled>
                                <span class="selectgroup-button selectgroup-button-icon">S</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="rabu" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">R</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="kamis" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">K</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="jumat" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">J</span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" id="laporan">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="mt-2" id="laporan-harian">

    <div class="row">
        <div class="col-12">
            <div class="activities">

            </div>
        </div>
    </div>
</section>

<script>
    var weekStart = '<?= $weekStart; ?>';
    var weekEnd = '<?= $weekEnd; ?>';
    var mingguKe = '<?= $mingguKe; ?>';
    var id_program = '<?= $id_program; ?>';

    var data_internship;
    var baseUrl = '<?php echo base_url(); ?>';

    $(document).ready(function() {

        const daysArray = getDays(weekStart, weekEnd);
        // daysArray.reverse(); // Membalikkan urutan elemen dalam array
        setdays(daysArray);

    });


    function setdays(daysArray) {
        $('#laporan-harian').html('');
        daysArray.forEach((day, index) => {
            $('#laporan-harian').append(`
                <div class="col-12 bg-white">
                    <div class="row mt-2 mb-3 p-3 rounded shadow-sm">
                        <div class="col-12">
                            <div class="row">
                                <b>${dayToName(day)}</b>
                            </div>
                            <div class="row justify-content-end">
                                <a href="${baseUrl}/internship_saya/laporan/?id_program=${id_program}?date=${day}" class="btn btn-primary">Buat Laporan Harian</a>
                            </div>
                            <div class="row">
                            ${formatDate(day)}
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    function formatDate(dateString) {
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const dateParts = dateString.split('-');
        const year = dateParts[0];
        const month = parseInt(dateParts[1], 10) - 1; // Mengurangi 1 karena bulan dimulai dari 0
        const day = parseInt(dateParts[2], 10);

        const formattedDate = `${day} ${months[month]} ${year}`;
        return formattedDate;
    }

    function dayToName(dateString) {
        const days = [
            "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
        ];

        const date = new Date(dateString);
        const day = date.getDay();

        return days[day];
    }

    function getDays(startDate, endDate) {
        const dateArray = [];
        let currentDate = new Date(startDate);
        const stopDate = new Date(endDate);
        while (currentDate <= stopDate) {
            dateArray.push(formatDateForWeeks(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
        return dateArray;
    }

    // Fungsi untuk mengubah format tanggal menjadi YYYY-MM-DD
    function formatDateForWeeks(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>