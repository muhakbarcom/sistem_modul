<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" id="headerProgramName">

            </div>
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="wizard-steps">
                            <div class="wizard-step" id="step_1">
                                <div class="wizard-step-icon">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Registration
                                </div>
                                <div id="step1Date">

                                </div>
                            </div>
                            <div class="wizard-step" id="step_2">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Administration
                                </div>
                                <div id="step2Date">

                                </div>
                            </div>
                            <div class="wizard-step" id="step_3">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Interview
                                </div>
                                <div id="step3Date">

                                </div>
                            </div>
                            <div class="wizard-step" id="step_4">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="wizard-step-label">
                                    On Job
                                </div>
                                <div id="step4Date">

                                </div>
                            </div>
                            <div class="wizard-step" id="step_5">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Graduate
                                </div>
                                <div id="step5Date">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Internship Daily Timesheet / Kegiatan Harian Magang</h3>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <div class="hero align-items-center bg-warning text-white" id="secLaporanAkhir">
                            <div class="hero-inner text-center">
                                <h2>Unggah Laporan Akhir</h2>
                                <p class="lead" id="msgLaporanAkhir">Anda telah mengisi seluruh laporan harian dan mingguan, tahap selanjutnya adalah mengunggah laporan akhir!</p>
                                <div class="row mt-4 justify-content-center">
                                    <div class="text-left text-dark font-weight-bold" id="laporanAkhirTimeline"></div>
                                </div>
                                <div class="mt-4">
                                    <a id="btnUnggah" onclick="unggahLaporanAkhir()" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-upload" aria-hidden="true"></i> Unggah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 p-3 ">
                        <div id="accordion" class="text-dark">
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                    <h4><b><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            Tata Cara Pengisian IDT</b></h4>
                                </div>
                                <div class="accordion-body collapse bg-warning" id="panel-body-1" data-parent="#accordion">
                                    <p class="mb-0">
                                        Silahkan lengkapi internship Daily Timesheet (IDT) kamu sebelum tanggal 25 pada bulan yang sedan berjalan dengan ketentuan sebagai berikut :
                                    <ol>
                                        <li>Input detail aktivitas harian kamu</li>
                                        <li>Jika berhalangan On Job atau terdapat hari libur nasional, pilih keterangan "Tidak Hadir" sesuai dengan alasan ketidakhadiran kamu.</li>
                                        <li>Setelah IDT selama satu minggu telah terinput, kamu wajib mengisi weekly Report terkait hal yang telah dipelajari dalam kurun waktu tersebut.</li>
                                        <li>Kamu wajib mendapatkan approval minimal 3 Card Minggu. Setiap maksimal tanggal 25 pada bulan yang sedang berjalan.</li>
                                    </ol>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Batch Match Up Juli</h5>
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


<script>
    var programData = <?php echo json_encode($dataProgram); ?>;
    var data_internship;
    var baseUrl = '<?php echo base_url(); ?>';
    var data_step;
    var data_laporan_akhir;
    var data_laporan_mingguan;
    var totalWeeks;

    $(document).ready(function() {


        $('#headerProgramName').html(`<h4>Program : ${programData.program_name} (${formatDate(programData.program_start)} - ${formatDate(programData.program_end)})</h4>`);

        stepActive(programData.step);


        const programStart = programData.program_start;
        const programEnd = programData.program_end;
        const weeksArray = getWeeks(programStart, programEnd);

        weeksArray.reverse(); // Membalikkan urutan elemen dalam array
        totalWeeks = weeksArray.length;
        setWeeks(weeksArray);

        getInternshipProgramMahasiswaDetail();
        var step0 = data_step.find(x => x.step == 0);
        var step1 = data_step.find(x => x.step == 1);
        var step2 = data_step.find(x => x.step == 2);
        var step3 = data_step.find(x => x.step == 3);
        var step4 = data_step.find(x => x.step == 4);


        if (step0 != undefined) {
            $('#step1Date').html(`<small>(${step0.created_at})</small>`);
            console.log(step0.created_at);
        }

        if (step1 != undefined) {
            $('#step2Date').html(`<small>(${step1.created_at})</small>`);
        }

        if (step2 != undefined) {
            $('#step3Date').html(`<small>(${step2.created_at})</small>`);
        }

        if (step3 != undefined) {
            $('#step4Date').html(`<small>(${step3.created_at})</small>`);
        }

        if (step4 != undefined) {
            $('#step5Date').html(`<small>(${step4.created_at})</small>`);
        }

        $('#modalBootstrapSave').on('click', function() {
            var modeInput = $('#modeInput').val();
            var fileLaporanAkhir = $('#fileLaporanAkhir').prop('files')[0];
            var id_program_mahasiswa = programData.id;

            var formData = new FormData();
            formData.append('fileLaporanAkhir', fileLaporanAkhir);
            formData.append('id_program_mahasiswa', id_program_mahasiswa);

            unggahLaporanAkhirAction(formData);
        });

        getLaporanMingguan();
        getLaporanAkhir();


    });

    function onGraduated() {
        $.ajax({
            url: baseUrl + 'internship_saya/onGraduate',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: programData.id
            },
            success: function(data) {
                window.location.reload();

            }
        })
    }

    function getLaporanMingguan() {
        $.ajax({
            url: baseUrl + 'internship_saya/getDataLaporanMingguan',
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: programData.id
            },
            success: function(data) {
                data_laporan_mingguan = data.data;

                if (data_laporan_mingguan.length == totalWeeks) {
                    $('#secLaporanAkhir').show();
                } else {
                    $('#secLaporanAkhir').hide();
                }

            }
        })
    }

    function getLaporanAkhir() {
        $.ajax({
            url: baseUrl + 'internship_saya/getDataLaporanAkhir',
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: programData.id
            },
            success: function(data) {
                data_laporan_akhir = data.data;
                var laporanAkhirTimeline = $('#laporanAkhirTimeline');
                var html = '<ol>';

                // each data laporan akhir
                $(data_laporan_akhir).each(function(index, value) {
                    var komentar = '';
                    if (value.status == 'DISETUJUI') {
                        $('#btnUnggah').addClass('disabled');
                        onGraduated();
                    }

                    if (value.status == 'REVIEW') {
                        $('#btnUnggah').addClass('disabled');
                    }

                    if (value.status == 'DITOLAK') {
                        $('#btnUnggah').removeClass('disabled');
                        komentar = `| Komentar: ${value.komentar_mentor || '-'}`;
                    }

                    html += `
                    <li>Laporan berhasil diunggah Tanggal: ${value.tanggal_pengumpulan} | Status: ${value.status} ${komentar}</li>
                    `;
                });
                html += '</ol>';

                laporanAkhirTimeline.html(html);

            }
        })

    }

    function unggahLaporanAkhir() {
        var modalBootstrap = $('#modalBootstrap');
        var modalTitle = $('#modalBootstrapTitle');
        var modalBody = $('#modalBootstrapBody');
        $('#modalBootstrapSave').show();
        modalBootstrap.modal('show');

        modalTitle.html('Unggah Laporan Akhir');
        modalBody.html(`
        <div class="row">
            <div class="col-12">
                <input type="file" id="fileLaporanAkhir" class="form-control">
                <input type="hidden" id="modeInput" value="laporanAkhir">
            </div>
        </div>
        `);
    }

    function unggahLaporanAkhirAction(data) {
        $.ajax({
            url: baseUrl + 'internship_saya/insertLaporanAkhir',
            type: 'POST',
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status) {
                    swal.fire({
                        title: 'Berhasil',
                        text: data.message,
                        icon: 'success'
                    }).then((result) => {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Gagal',
                        text: data.message,
                        icon: 'error'
                    });
                }
            }
        })
    }

    function IsThereWeeklyReport(data) {
        var response = false;
        $.ajax({
            url: baseUrl + 'internship_saya/IsThereWeeklyReport',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: data.id_program_mahasiswa,
                weekStart: data.weekStart,
                weekEnd: data.weekEnd
            },
            success: function(data) {
                if (data.status) {
                    response = data.status;
                } else {

                }
            }
        })

        return response;
    }


    function setWeeks(weeksArray) {
        $('#laporan').html('');
        var button = '';
        weeksArray.forEach((week, index) => {

            var data = {
                id_program_mahasiswa: programData.id,
                weekStart: week.weekStart,
                weekEnd: week.weekEnd
            }

            var isThereWeeklyReport = IsThereWeeklyReport(data);
            // check is there weekly report
            if (isThereWeeklyReport) {
                button = `<a href="${baseUrl}/internship_saya/laporan/?id_program_mahasiswa=${programData.id}&id_program=${programData.id_program}&mingguKe=${week.mingguKe}&weekStart=${week.weekStart}&weekEnd=${week.weekEnd}" class="btn btn-success">Lihat Laporan</a>`;
            } else {
                button = `<a href="${baseUrl}/internship_saya/laporan/?id_program_mahasiswa=${programData.id}&id_program=${programData.id_program}&mingguKe=${week.mingguKe}&weekStart=${week.weekStart}&weekEnd=${week.weekEnd}" class="btn btn-primary">Lengkapi Laporan</a>`;
            }

            $('#laporan').append(`
                <div class="col-12">
                    <div class="row mt-3 mb-3 p-3 rounded shadow">
                        <div class="col-12">
                            <div class="row">
                                <b>Minggu ke ${week.mingguKe} (${formatDate(week.weekStart)} - ${formatDate(week.weekEnd)})</b>
                            </div>
                            <div class="row justify-content-end">
                                ${button}
                            </div>
                            <div class="row">
                                S S R K J
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    function getInternshipProgramMahasiswaDetail() {
        $.ajax({
            url: baseUrl + 'internship_program/getInternshipProgramMahasiswaDetail',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                id_program_mahasiswa: programData.id
            },
            success: function(data) {
                data_step = data;
            }
        })
    }

    function stepActive($step) {
        switch ($step) {
            case '0':
                $('#step_1').addClass('wizard-step-active');
                break;
            case '1':
                $('#step_1').addClass('wizard-step-active');
                $('#step_2').addClass('wizard-step-active');
                break;
            case '2':
                $('#step_1').addClass('wizard-step-active');
                $('#step_2').addClass('wizard-step-active');
                $('#step_3').addClass('wizard-step-active');
                break;
            case '3':
                $('#step_1').addClass('wizard-step-active');
                $('#step_2').addClass('wizard-step-active');
                $('#step_3').addClass('wizard-step-active');
                $('#step_4').addClass('wizard-step-active');
                break;
            case '4':
                $('#step_1').addClass('wizard-step-active');
                $('#step_2').addClass('wizard-step-active');
                $('#step_3').addClass('wizard-step-active');
                $('#step_4').addClass('wizard-step-active');
                $('#step_5').addClass('wizard-step-active');
                break;
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

    function getWeeks(start, end) {
        const weeks = [];
        const startDate = new Date(start);
        const endDate = new Date(end);
        const currentDate = new Date();

        let firstMonday = new Date(startDate);
        firstMonday.setDate(startDate.getDate() + ((1 - startDate.getDay() + 7) % 7));

        let weekStartDate = new Date(firstMonday);
        let weekEndDate = new Date(firstMonday);

        // find end days of currentDate
        let currentDateInWeek = new Date(currentDate);
        currentDateInWeek.setDate(currentDateInWeek.getDate() + 4);

        while (weekEndDate <= endDate) {
            weekEndDate = new Date(weekEndDate);
            weekEndDate.setDate(weekEndDate.getDate() + 4);

            if (weekEndDate <= currentDateInWeek) {
                weeks.push({
                    'mingguKe': weeks.length + 1,
                    'weekStart': formatDateForWeeks(weekStartDate),
                    'weekEnd': formatDateForWeeks(weekEndDate)
                });
            }

            weekStartDate = new Date(weekEndDate);
            weekStartDate.setDate(weekEndDate.getDate() + 3);
            weekEndDate = new Date(weekStartDate);
        }

        return weeks;
    }

    // Fungsi untuk mengubah format tanggal menjadi YYYY-MM-DD
    function formatDateForWeeks(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>