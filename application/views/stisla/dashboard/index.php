<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <!-- <h4>Report</h4> -->
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h2>Welcome to <?= $setting_aplikasi->nama; ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>