<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <h6>Materi Bimbingan</h6>
          <div class="form-group">
            <div class="row mt-3">
              <div class="col-12">
                <textarea class="form-control" name="materi" id="materi_teks" placeholder="Masukan keterangan..."></textarea>
              </div>
            </div>
            <div class="row mt-3 ">
              <div class="input-group col-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="materi_file">
                  <label class="custom-file-label" for="materi_file">
                    <i class="fas fa-file"></i> Choose file...
                  </label>
                </div>
              </div>
              <div class="col-6 text-right">
                <button type="button" id="materi_submit" class="btn btn-primary">Submit Materi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <b>Mentor 1</b>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, vel nihil? Aliquid cum vero non aut. Sunt recusandae quis est amet explicabo nisi, fuga soluta suscipit ab doloribus dolore perferendis.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <a class="btn btn-sm btn-info" href=""><i class="fa fa-link"></i> Materi Bimbingan 2023</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <textarea class="form-control" style="border-radius: 20px;" name="diskusi" id="diskusi_teks" placeholder="Mari berdiskusi..." onkeydown="checkEnter(event)"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div id="kolom_komentar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    // show_data();
  });

  function checkEnter(event) {
    if (event.keyCode === 13) {
      event.preventDefault(); // Mencegah karakter baris baru ditambahkan ke textarea
      var text = $('#diskusi_teks').val();

      if (text != '') {
        $('#kolom_komentar').append('<div class="row"><div class="col-12"><p>' + text + '</p></div></div>');
        $('#diskusi_teks').val('');
      }
    }
  }
</script>