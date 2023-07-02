<div class="section-body" id="sectionBody">
</div>


<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/internship_program/getAll",
            method: "GET",
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    var id_program = data[i].id_program;
                    var isRegistered = false;
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/internship_program/isRegistered",
                        method: "POST",
                        async: false,
                        data: {
                            id_program: id_program
                        },
                        dataType: 'json',
                        success: function(data) {
                            isRegistered = data.status;
                            $('#sectionBody').html(html);
                        }
                    });
                    var button = '';

                    if (isRegistered) {
                        button = `<button disabled class="btn btn-primary">Anda Telah Terdaftar</button>
                        <br>
                        <a target="_BLANK" href="<?= base_url('internship_saya/registration/'); ?>${id_program}"><small>Lihat Status Pendaftaran</small></a>
                        `;
                    } else {
                        button = `
                        <button class="btn btn-primary" onclick="register(${id_program})">Daftar</button>`;
                    }

                    html += `
                    <div class="row">
                        <div class="col-12">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="<?= base_url('assets/images/background/banner.webp'); ?>">
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">${data[i].program_name} (${formatDate(data[i].program_start)} - ${formatDate(data[i].program_end)})</a></h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p>${data[i].program_desc}</p>
                                    <div class="article-cta">
                                       ${button}
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    `;

                }
                $('#sectionBody').html(html);
            }
        });
    });


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

    function register(id) {
        var isLoggedIn = "<?= $isLoggedIn; ?>";
        if (!isLoggedIn) {
            Swal.fire(
                'Gagal!',
                'Anda harus login terlebih dahulu.',
                'error'
            );
            return;
        }
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan mendaftar program ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, daftar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/internship_program/register",
                    method: "POST",
                    async: false,
                    data: {
                        id_program: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            Swal.fire(
                                'Berhasil!',
                                'Anda telah terdaftar pada program ini.',
                                'success'
                            ).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Anda gagal terdaftar pada program ini.',
                                'error'
                            );
                        }
                    }
                });
            }
        });


    }
</script>