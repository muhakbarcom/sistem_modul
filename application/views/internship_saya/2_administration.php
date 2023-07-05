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

                <form class="wizard-content mt-2">
                    <div class="wizard-pane">
                        <div class="form-group row justify-content-center">

                            <div class="col-6">
                                <label for="cv">Please Upload your CV</label>
                                <input type="file" class="form-control" id="cv" name="cv">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-icon icon-right btn-primary" id="btnNext">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


<script>
    var programData = <?php echo json_encode($dataProgram); ?>;
    var data_internship;
    var data_step;
    var baseUrl = `<?= base_url(); ?>`;

    $(document).ready(function() {


        $('#headerProgramName').html(`<h4>Program : ${programData.program_name} (${formatDate(programData.program_start)} - ${formatDate(programData.program_end)})</h4>`);

        stepActive(programData.step);



        $('#btnNext').on('click', function() {
            var cv = $("#cv").prop('files')[0];
            console.log(cv)
            if (cv == undefined) {
                iziToast.error({
                    title: 'CV must be selected!',
                    message: 'Please select cv first!',
                    position: 'topRight'
                });
            } else {
                // new formdata
                var formData = new FormData();

                formData.append('cv', cv);
                formData.append('id', programData.id);


                $.ajax({
                    url: `<?= base_url(); ?>internship_saya/administration`,
                    type: 'POST',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    async: false,
                    data: formData,
                    success: function(data) {
                        if (data.status == true) {
                            // console.log(data)
                            window.location.reload();
                        } else {
                            iziToast.error({
                                title: 'Fail!',
                                message: data.message,
                                position: 'topRight'
                            });
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error jika request AJAX gagal
                        console.log(xhr.status + ': ' + textStatus);
                    }
                });
            }

        })

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
    });

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
</script>