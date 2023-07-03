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
                            </div>
                            <div class="wizard-step" id="step_2">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Administration
                                </div>
                            </div>
                            <div class="wizard-step" id="step_3">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Interview
                                </div>
                            </div>
                            <div class="wizard-step" id="step_4">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="wizard-step-label">
                                    On Job
                                </div>
                            </div>
                            <div class="wizard-step" id="step_5">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Graduate
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

    $(document).ready(function() {


        $('#headerProgramName').html(`<h4>Program : ${programData.program_name} (${formatDate(programData.program_start)} - ${formatDate(programData.program_end)})</h4>`);

        stepActive(programData.step);


        const programStart = programData.program_start;
        const programEnd = programData.program_end;
        const weeksArray = getWeeks(programStart, programEnd);

        weeksArray.reverse(); // Membalikkan urutan elemen dalam array

        setWeeks(weeksArray);

    });


    function setWeeks(weeksArray) {
        $('#laporan').html('');
        weeksArray.forEach((week, index) => {
            $('#laporan').append(`
                <div class="col-12">
                    <div class="row mt-3 mb-3 p-3 rounded shadow">
                        <div class="col-12">
                            <div class="row">
                                <b>Minggu ke ${week.mingguKe} (${formatDate(week.weekStart)} - ${formatDate(week.weekEnd)})</b>
                            </div>
                            <div class="row justify-content-end">
                                <a href="${baseUrl}/internship_saya/laporan/?id_program_mahasiswa=${programData.id}&id_program=${programData.id_program}&mingguKe=${week.mingguKe}&weekStart=${week.weekStart}&weekEnd=${week.weekEnd}" class="btn btn-primary">Lengkapi Laporan</a>
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