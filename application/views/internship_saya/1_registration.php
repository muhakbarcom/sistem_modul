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

                <form class="wizard-content mt-2">
                    <div class="wizard-pane">
                        <div class="form-group row justify-content-center">

                            <div><b>Please Select Role</b></div>
                            <div class="col-12 mt-2">
                                <div class="selectgroup w-100" id="role">

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
    const role = $('#role');

    $(document).ready(function() {


        $('#headerProgramName').html(`<h4>Program : ${programData.program_name} (${formatDate(programData.program_start)} - ${formatDate(programData.program_end)})</h4>`);

        stepActive(programData.step);

        $.ajax({
            url: `<?= base_url(); ?>internship_role/getAllData`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                data_internship = data;
                var html = '';
                for (let i = 0; i < data_internship.length; i++) {

                    html += `<label class="selectgroup-item">
                                        <input type="radio" name="id_role" value="${data_internship[i].id_internship_role}" class="selectgroup-input">
                                        <span class="selectgroup-button">${data_internship[i].role_name}</span>
                                    </label>`;
                }
                role.html(html);
            },
            error: function(xhr, textStatus, errorThrown) {
                // Handle error jika request AJAX gagal
                console.log(xhr.status + ': ' + textStatus);
            }
        });

        // showList();

        $('#btnNext').on('click', function() {
            var id_role = $("input[name='id_role']:checked").val();
            if (id_role == undefined) {
                iziToast.error({
                    title: 'Role must be selected!',
                    message: 'Please select role first!',
                    position: 'topRight'
                });
            } else {
                $.ajax({
                    url: `<?= base_url(); ?>internship_saya/registration`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id_role: id_role,
                        id_program: programData.id_program,
                        id: programData.id
                    },
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


    });

    // function showList() {
    //     var dataInternship = data_internship;
    //     var html = '';
    //     for (let i = 0; i < dataInternship.length; i++) {

    //         html += `
    //         <label class="selectgroup-item">
    //                                     <input type="radio" name="id_role" value="${data_internship[i].id_internship_role}" class="selectgroup-input">
    //                                     <span class="selectgroup-button">${data_internship[i].role_name}</span>
    //                                 </label>
    //     `;
    //     }
    //     role.html(html);
    // }

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