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

                            <div class="col-6">
                                <label for="cv">Please Insert Link Interview (Youtube)</label>
                                <input type="text" class="form-control" id="link_interview" name="link_interview">
                                <div class="row mt-3">
                                    <div class="col-12" id="video_interview">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-icon icon-right btn-primary" id="btnNext" disabled>Next <i class="fas fa-arrow-right"></i></button>
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

    $(document).ready(function() {

        $('#link_interview').on('keyup', function() {

            var link = $(this).val();
            if (link == '') {
                $('#btnNext').attr('disabled', true);
                $('#video_interview').html(''); // Kosongkan konten video jika link kosong
            } else {
                // Ubah URL agar sesuai dengan format URL yang dapat ditampilkan dalam tag <iframe>
                var videoUrl = convertToEmbedUrl(link);
                $('#video_interview').html(`<iframe width="100%" height="315" src="${videoUrl}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
                $('#btnNext').attr('disabled', false);
            }
        });

        $('#headerProgramName').html(`<h4>Program : ${programData.program_name} (${formatDate(programData.program_start)} - ${formatDate(programData.program_end)})</h4>`);

        stepActive(programData.step);



        // showList();

        $('#btnNext').on('click', function() {
            var link_interview = $("#link_interview").val();
            if (link_interview == undefined) {
                iziToast.error({
                    title: 'Link interview required!',
                    message: 'Please insert link first!',
                    position: 'topRight'
                });
            } else {

                let data = {
                    link_interview: link_interview,
                    id: programData.id
                };

                $.ajax({
                    url: `<?= base_url(); ?>internship_saya/interview`,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        if (data.status == true) {
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

    function convertToEmbedUrl(url) {
        var videoId;
        // Cek apakah URL adalah URL YouTube
        if (url.indexOf('youtube.com') > -1 || url.indexOf('youtu.be') > -1) {
            // Ambil ID video dari URL
            if (url.indexOf('youtube.com') > -1) {
                // URL format: https://www.youtube.com/watch?v=VIDEO_ID
                var urlParams = new URLSearchParams(new URL(url).search);
                videoId = urlParams.get('v');
            } else {
                // URL format: https://youtu.be/VIDEO_ID
                videoId = url.split('/').pop();
            }
            // Ubah URL menjadi URL embed dengan ID video
            if (videoId) {
                return `https://www.youtube.com/embed/${videoId}`;
            }
        }
        // Jika URL bukan URL YouTube atau tidak ada ID video, kembalikan URL asli
        return url;
    }

    // Fungsi untuk memeriksa apakah string adalah URL yang valid
    function isValidUrl(string) {
        // Regex pattern untuk URL
        var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
            '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
        return pattern.test(string);
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