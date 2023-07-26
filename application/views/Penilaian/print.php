<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?= base_url(); ?>/stisla_assets/modules/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="card">
    <div class="card-body">
      <h4 class="text-center mb-3 mt-3">Daftar Nilai Program Magang<br>PT Telekomunikasi Indonesia Tbk Direktorat Digital Bussiness</h4>

      <div class="row justify-content-center">
        <div class="col-md-8  mt-3 mb-3">
          <div class="row">
            <div class="col-4">Nama Mahasiswa</div>
            <div class="col-8">: <?= $info->first_name . ' ' . $info->last_name; ?></div>
          </div>
          <div class="row">
            <div class="col-4">NIM</div>
            <div class="col-8">: <?= $info->nim; ?></div>
          </div>
          <div class="row">
            <div class="col-4">Fakultas/Jurusan</div>
            <div class="col-8">: <?= $info->jurusan; ?></div>
          </div>
          <div class="row">
            <div class="col-4">Perguruan Tinggi</div>
            <div class="col-8">: <?= $info->perguruan_tinggi; ?></div>
          </div>
          <div class="row">
            <div class="col-4">Pelaksanaan Magang</div>
            <div class="col-8">: <?= $info->program_start . ' - ' . $info->program_end; ?></div>
          </div>
          <div class="row">
            <div class="col-4">Posisi Magang</div>
            <div class="col-8">: <?= $info->role_name; ?></div>
          </div>
          <hr>

          <div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2" class="text-center">No</th>
                  <th rowspan="2" class="text-center">Komponen</th>
                  <th colspan="2" class="text-center">Daftar Nilai</th>
                </tr>
                <tr>
                  <th class="text-center">Angka</th>
                  <th class="text-center">Dengan Huruf</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nilai as $value) : ?>
                  <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $value->kriteria; ?></td>
                    <td class="text-right"><?= $value->nilai; ?></td>
                    <td><?= terbilang($value->nilai); ?></td>
                  </tr>
                <?php endforeach; ?>
                <tr>
                  <td colspan="2" class="text-center">Total Nilai Pembimbing Perusahaan</td>
                  <td class="text-right"><?= $total; ?></td>
                  <td><?= terbilang($total); ?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row mt-3" style="margin-top: 50px;">
            <div class="col-9" style="margin-top: 150px;">
              <div class="row mb-3">Kriteria Total Nilai Pembimbing Perusahaan</div>
              <div class="row" style="margin-top: 50px;">86-100 Sangat Memuaskan</div>
              <div class="row">71-85 Memuaskan</div>
              <div class="row">
                <=70 Cukup Memuaskan</div>
              </div>
              <div class="col-3" style="margin-top: 150px;">
                <div class="row">Bandung, <?= tanggal_laporan_internship(date('Y-m-d')); ?></div>
                <div class="row mb-3">Pembimbing</div>
                <div class="row" style="margin-top: 100px;">Bagus Satria</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.print();
    </script>
</body>

</html>