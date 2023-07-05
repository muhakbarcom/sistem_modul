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
                        <h3>Graduation</h3>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <div class="hero align-items-center bg-success text-white" id="secLaporanAkhir">
                            <div class="hero-inner text-center">
                                <h2>Download Sertifikat</h2>
                                <p class="lead" id="msgLaporanAkhir">Selamat anda telah menyelesaikan program magang. Silakan download sertifikat!</p>
                                <div class="row mt-4 justify-content-center">
                                    <div class="text-left text-dark font-weight-bold" id="laporanAkhirTimeline"></div>
                                </div>
                                <div class="mt-2" id="btnDownloadSertifikat">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Nilai</h3>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <div class="hero align-items-center bg-warning text-white" id="secLaporanAkhir">
                            <div class="hero-inner text-center">
                                <h2>Nilai Anda Dalam Program Magang Ini</h2>
                                <h2><b><?= $dataProgram->nilai_akhir; ?></b></h2>
                            </div>
                        </div>
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
        // setWeeks(weeksArray);

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

        $('#btnDownloadSertifikat').html(` <a href="<?= base_url('internship_saya/downloadSertifikat/'); ?>${programData.id}" target="_BLANK" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-download" aria-hidden="true"></i> Download</a>`)


    });

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

    // Fungsi untuk mengubah format tanggal menjadi YYYY-MM-DD
    function formatDateForWeeks(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
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
</script>