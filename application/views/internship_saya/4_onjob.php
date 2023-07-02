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
                    <div class="col-12 p-3 bg-warning text-dark">
                        <p>
                            <b>Tata Cara Pengisian IDT</b><br>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, voluptates facilis labore eaque cum harum quis, dignissimos aspernatur consequatur eveniet sed quibusdam distinctio non natus ipsa hic enim accusantium! Minus?
                        </p>
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
                                <b>Minggu ke ${week.mingguKe} (${formatDate(week.weekStart)} - ${formatDate(week.weekStart)})</b>
                            </div>
                            <div class="row justify-content-end">
                                <a href="${baseUrl}/internship_saya/laporan/?id_program=${programData.id_program}&mingguKe=${week.mingguKe}&weekStart=${week.weekStart}&weekEnd=${week.weekEnd}" class="btn btn-primary">Lengkapi Laporan</a>
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
        const currentDate = new Date(); // Tanggal sekarang

        let firstMonday = new Date(startDate);
        firstMonday.setDate(startDate.getDate() + ((1 - startDate.getDay() + 7) % 7));

        let weekStartDate = new Date(firstMonday);
        let weekEndDate = new Date(firstMonday);

        while (weekEndDate <= endDate) {
            weekEndDate.setDate(weekEndDate.getDate() + 4);

            // Hanya tambahkan minggu yang kurang dari atau sama dengan tanggal sekarang
            if (weekStartDate <= currentDate) {
                weeks.push({
                    'mingguKe': weeks.length + 1,
                    'weekStart': formatDateForWeeks(weekStartDate),
                    'weekEnd': formatDateForWeeks(weekEndDate)
                });
            }

            weekStartDate.setDate(weekEndDate.getDate() + 3);
            weekEndDate.setDate(weekStartDate.getDate());
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