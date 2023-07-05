<!DOCTYPE html>
<html>

<head>
  <title>Desain Sertifikat Internship</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .certificate {
      width: 800px;
      height: 600px;
      margin: 50px auto;
      background-color: #fff;
      border: 4px solid #000;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      position: relative;
    }

    .certificate-header {
      background-color: #000;
      color: #fff;
      padding: 20px;
    }

    .certificate-header h2 {
      font-size: 30px;
      margin: 0;
    }

    .certificate-body {
      padding: 40px;
    }

    .certificate-body h3 {
      font-size: 24px;
      margin: 0;
    }

    .certificate-body p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .certificate-footer {
      background-color: #000;
      color: #fff;
      padding: 20px;
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
    }

    .certificate-footer p {
      font-size: 16px;
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="certificate">
    <div class="certificate-header">
      <h2>Sertifikat Internship</h2>
    </div>
    <div class="certificate-body">
      <h3><?= $first_name . " " . $last_name; ?></h3>
      <p>Telah berhasil menyelesaikan program internship dengan prestasi yang luar biasa dalam program</p>
      <h3><?= $program_name; ?></h3>
      <p>pada</p>
      <?= tanggal_laporan_internship($program_start) . " - " . tanggal_laporan_internship($program_end); ?>
    </div>
    <div class="certificate-footer">
      <small>Diberikan pada tanggal <?= date('d/m/Y'); ?></small>
    </div>
  </div>
  <script>
    window.print();
  </script>
</body>

</html>