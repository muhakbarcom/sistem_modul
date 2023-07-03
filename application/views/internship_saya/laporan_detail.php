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
                        Kamu harus menyelesaikan semua laporan harian untuk dapat mengisi laporan mingguan.
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" id="Senin" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">S</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" id="Selasa" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">S</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" id="Rabu" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">R</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" id="Kamis" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">K</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" id="Jumat" class="selectgroup-input" disabled>
                                <span class="selectgroup-button selectgroup-button-icon">J</span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" id="laporanMingguanSection">

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
    var baseUrl = '<?php echo base_url(); ?>';

    var weekStart = '<?= $weekStart; ?>';
    var weekEnd = '<?= $weekEnd; ?>';
    var mingguKe = '<?= $mingguKe; ?>';
    var id_program = '<?= $id_program; ?>';
    var id_program_mahasiswa = '<?= $id_program_mahasiswa; ?>';

    var data_internship;
    var data_laporan_harian;
    var data_laporan_mingguan;

    var validDailyReport = 0;

    $(document).ready(function() {

        getDataLaporanHarian(); // Mengambil data laporan harian
        IsThereWeeklyReport();
        const daysArray = getDays(weekStart, weekEnd);
        setdays(daysArray);


        $('#modalBootstrapSave').on('click', function() {
            var modeInput = $('#modeInput').val();

            if (modeInput == "laporanMingguan") {
                buatLaporanMingguanAction();
            } else {
                buatLaporanAction();
            }
        })

    });

    function buatLaporan(id_program, tanggal) {
        var modalBootstrap = $('#modalBootstrap');
        var modalTitle = $('#modalBootstrapTitle');
        var modalBody = $('#modalBootstrapBody');

        modalBootstrap.modal('show');

        modalTitle.html('Buat Laporan Harian');
        modalBody.html(`
        <div class="row">
            <div class="col-12">
                <b>Tanggal:</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                ${tanggal}
                <input type="hidden" id="tanggalKehadiran" value="${tanggal}">
                <input type="hidden" id="modeInput" value="laporanHarian">
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-12">
                <b>Status Kehadiran:</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <select class="form-control" id="statusKehadiran" onchange="statusKehadiran(this)">
                    <option value=""></option>
                    <option value="1">Hadir</option>
                    <option value="0">Tidak Hadir</option>
                </select>
            </div>
        </div>

        <div class="row" id="statusKehadiranBody"></div>
        `);

    }

    function buatLaporanAction() {
        var statusKehadiran = $('#statusKehadiran').val();
        var jamMasuk = $('#jamMasuk').val();
        var jamKeluar = $('#jamKeluar').val();
        var keterangan = $('#keterangan').val();
        var alasanKehadiran = $('#alasanKehadiran').val();
        var tanggalKehadiran = $('#tanggalKehadiran').val();


        if (statusKehadiran == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status kehadiran harus diisi!'
            });
            return false;
        }

        if (statusKehadiran == 1) {
            if (jamMasuk == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Jam masuk harus diisi!'
                });
                return false;
            }
            if (jamKeluar == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Jam keluar harus diisi!'
                });
                return false;
            }
            if (keterangan == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Aktivitas harus diisi!'
                });
                return false;
            }
        } else if (alasanKehadiran == 0) {
            if (alasanKehadiran == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Alasan harus diisi!'
                });
                return false;
            }

            if (keterangan == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Keterangan harus diisi!'
                });
                return false;
            }
        }

        var data = {
            id_program_mahasiswa: id_program_mahasiswa,
            id_program: id_program,
            statusKehadiran: statusKehadiran,
            tanggal: tanggalKehadiran
        };

        if (statusKehadiran == 1) {
            data.aktivitas = keterangan;
            data.jam_mulai = jamMasuk;
            data.jam_selesai = jamKeluar;
        } else {
            data.alasanKehadiran = alasanKehadiran;
            data.keterangan = keterangan;
        }

        $.ajax({
            url: baseUrl + 'internship_saya/insertLaporanHarian',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message
                    });

                    $('#modalBootstrap').modal('hide');
                    getDataLaporanHarian();
                    const daysArray = getDays(weekStart, weekEnd);
                    setdays(daysArray);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            }
        })
    }

    function buatLaporanMingguan() {
        var modalBootstrap = $('#modalBootstrap');
        var modalTitle = $('#modalBootstrapTitle');
        var modalBody = $('#modalBootstrapBody');

        modalBootstrap.modal('show');

        modalTitle.html('Buat Laporan Mingguan');
        modalBody.html(`
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="laporanMingguanTeks"></textarea>
                <input type="hidden" id="modeInput" value="laporanMingguan">
            </div>
        </div>
        `);
    }

    function buatLaporanMingguanAction() {
        var laporanMingguanTeks = $('#laporanMingguanTeks').val();

        if (laporanMingguanTeks == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Laporan mingguan harus diisi!'
            });
            return false;
        }

        var data = {
            id_program_mahasiswa: id_program_mahasiswa,
            laporanMingguanTeks: laporanMingguanTeks,
            weekStart: weekStart,
            weekEnd: weekEnd
        };

        $.ajax({
            url: baseUrl + 'internship_saya/insertLaporanMingguan',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message
                    });

                    $('#modalBootstrap').modal('hide');
                    IsThereWeeklyReport();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            }
        })
    }

    function IsThereWeeklyReport() {
        $.ajax({
            url: baseUrl + 'internship_saya/IsThereWeeklyReport',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: id_program_mahasiswa,
                weekStart: weekStart,
                weekEnd: weekEnd
            },
            success: function(data) {
                if (data.status) {
                    $('#laporanMingguanSection').html(` <button type="button" class="btn btn-warning" onclick="lihatLaporanMingguan()"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Laporan Mingguan</button>`);

                    data_laporan_mingguan = data.data;
                } else {

                }
            }
        })
    }

    function getDataLaporanHarian() {
        $.ajax({
            url: baseUrl + 'internship_saya/getDataLaporanharian',
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: id_program_mahasiswa,
            },
            success: function(data) {
                if (data.status) {
                    data_laporan_harian = data.data;

                    // each data laporan harian
                    setIconHari(data.data);


                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            }
        })
    }

    function setIconHari(data) {
        var date_start = new Date(weekStart);
        var date_end = new Date(weekEnd);
        var temp_validDailyReport = 0;
        data.forEach((laporan, index) => {
            var tanggal = new Date(laporan.tanggal);
            var hari = tanggal.toLocaleDateString("id-ID", {
                weekday: 'long'
            });

            if (tanggal >= date_start && tanggal <= date_end) {
                $(`#${hari}`).prop('checked', true);
                temp_validDailyReport += 1;
                // Tambahkan kondisi lainnya yang ingin kamu lakukan di sini
            }
        });

        validDailyReport = temp_validDailyReport;

        if (validDailyReport >= 5) {
            $('#laporanMingguanSection').html(`<button id="btnBuatLaporanMingguan" onclick="buatLaporanMingguan()" class="btn btn-primary"><i class="fa fa-bookmark" aria-hidden="true"></i> Buat Laporan Mingguan</button>`);
        } else {
            $('#laporanMingguanSection').html('');
        }
    }


    function setdays(daysArray) {
        // var dataGlobal = data_laporan_harian;
        $('#laporan-harian').html('');
        daysArray.forEach((day, index) => {
            var button = '';

            // Cek keberadaan data laporan harian
            var isThereDailyReport = data_laporan_harian.find(laporan => laporan.tanggal === day);

            if (day <= '<?= date('Y-m-d'); ?>') {
                if (!isThereDailyReport) {
                    button = `<button onclick="buatLaporan(${id_program}, '${day}')" class="btn btn-primary">Buat Laporan Harian</button>`;
                } else {
                    button = `<button onclick="lihatDetailLaporanHarian(${isThereDailyReport.id})" class="btn btn-success">Lihat Laporan Harian</button>`;
                }
            } else {
                button = `<button class="btn btn-primary" disabled>Buat Laporan Harian</button>`;
            }

            $('#laporan-harian').append(`
                <div class="col-12 bg-white">
                    <div class="row mt-2 mb-3 p-3 rounded shadow-sm">
                        <div class="col-12">
                            <div class="row">
                                <b>${dayToName(day)}</b>
                            </div>
                            <div class="row justify-content-end">
                                ${button}
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

    function lihatDetailLaporanHarian(id) {
        var modalBootstrap = $('#modalBootstrap');
        var modalTitle = $('#modalBootstrapTitle');
        var modalBody = $('#modalBootstrapBody');

        // ambil data dari data_laporan_harian yang id nya sama dengan id
        var data = data_laporan_harian.find(laporan => laporan.id == id);

        var statusKehadiranBody = '';


        modalBootstrap.modal('show');

        if (data.status_kehadiran == 1) {
            statusKehadiranBody = `
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-6">
                            <b>Jam Masuk:</b>
                            <input type="time" class="form-control" id="jamMasuk" value=${data.jam_mulai} disabled>
                        </div>
                        <div class="col-6">
                            <b>Jam Keluar:</b>
                            <input type="time" class="form-control" id="jamKeluar" value="${data.jam_selesai}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Aktivitas:</b>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" id="keterangan" disabled>${data.aktivitas}</textarea>
                        </div>
                    </div>
                </div>
            `;
        } else if (data.status_kehadiran == 0) {
            statusKehadiranBody = `
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Alasan:</b>
                            <input type="text" class="form-control" id="alasanKehadiran" value="${alasanNM(data.alasan_kehadiran)}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Keterangan:</b>
                            <textarea class="form-control" id="keterangan" value="" disabled>${data.keterangan_kehadiran}</textarea>
                        </div>
                    </div>
                </div>
            `;
        } else {
            statusKehadiranBody.html('');
        }

        modalTitle.html('Detail Laporan Harian Anda');
        modalBody.html(`
        <div class="row">
            <div class="col-12">
                <b>Tanggal:</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                ${data.tanggal}
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-12">
                <b>Status Kehadiran:</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input class="form-control" value="${data.status_kehadiran == 1 ? "Hadir":"Tidak Hadir"}" disabled>
            </div>
        </div>

        <div class="row" id="statusKehadiranBody">${statusKehadiranBody}</div>
        `);

        $('#modalBootstrapSave').hide();


    }

    function lihatLaporanMingguan() {
        var modalBootstrap = $('#modalBootstrap');
        var modalTitle = $('#modalBootstrapTitle');
        var modalBody = $('#modalBootstrapBody');

        var data = data_laporan_mingguan.laporan;

        modalBootstrap.modal('show');

        modalTitle.html('Laporan Mingguan');
        modalBody.html(`
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="laporanMingguanTeks" disabled>${data}</textarea>
            </div>
        </div>
        `);

        $('#modalBootstrapSave').hide();


    }

    function alasanNM(data) {
        switch (data) {
            case "1":
                return "Sakit";
                break;
            case "2":
                return "Izin";
                break;
            case "3":
                return "Tanpa Keterangan";
                break;
            default:
                return "Tidak Ada";
                break;
        }
    }

    function statusKehadiran(data) {
        var status = $(data).val();
        var statusKehadiranBody = $('#statusKehadiranBody');

        if (status == 1) {
            statusKehadiranBody.html(`
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-6">
                            <b>Jam Masuk:</b>
                            <input type="time" class="form-control" id="jamMasuk">
                        </div>
                        <div class="col-6">
                            <b>Jam Keluar:</b>
                            <input type="time" class="form-control" id="jamKeluar">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Aktivitas:</b>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" id="keterangan"></textarea>
                        </div>
                    </div>
                </div>
            `);
        } else if (status == 0) {
            statusKehadiranBody.html(`
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Alasan:</b>
                            <select class="form-control" id="alasanKehadiran">
                                <option value=""></option>
                                <option value="1">Sakit</option>
                                <option value="2">Izin</option>
                                <option value="3">Tanpa Keterangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <b>Keterangan:</b>
                            <textarea class="form-control" id="keterangan"></textarea>
                        </div>
                    </div>
                </div>
            `);
        } else {
            statusKehadiranBody.html('');
        }

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