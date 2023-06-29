<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">


                <div class="card-body">
                    <div class="row" id="internship_list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var data_internship;
    const internship_list = $('#internship_list');

    $(document).ready(function() {

        // simple ajax
        $.ajax({
            url: `<?= base_url(); ?>internship_role/getAllData`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                data_internship = data;
                showList()
            },
            error: function(xhr, textStatus, errorThrown) {
                // Handle error jika request AJAX gagal
                console.log(xhr.status + ': ' + textStatus);
            }
        });


    });

    function showList() {
        var html = '';
        for (let i = 0; i < data_internship.length; i++) {
            var description = data_internship[i].role_description;
            var truncatedDescription = truncateText(description, 100); // Batasi teks hingga 100 karakter
            var readMoreButton = '';
            if (description.length > 100) {
                readMoreButton = `<a href="#" class="read-more" data-description="${description}">Read more</a>`;
            }
            html += `
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <b>${data_internship[i].role_name}</b>
                </div>

                <div class="card-body">
                    <div class="row">
                        <img src="<?= base_url('assets/uploads/image/internship_role/'); ?>${data_internship[i].image}" class="img-thumbnail">
                        <p>${truncatedDescription} ${readMoreButton}</p>
                    </div>
                </div>
            </div>
        </div>
        `;
        }
        internship_list.html(html);
    }

    // Fungsi untuk memotong teks dan menambahkan "..." jika terlalu panjang
    function truncateText(text, maxLength) {
        if (text.length > maxLength) {
            return text.substr(0, maxLength) + '...';
        }
        return text;
    }

    $(document).on('click', '.read-more', function(e) {
        e.preventDefault();
        var description = $(this).data('description');
        $(this).closest('.card-body').find('p').text(description);
    });
</script>