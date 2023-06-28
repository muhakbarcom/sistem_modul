<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Revenue</h4>
        </div>
        <div class="card-body fs-2">
          <b><?= $revenue; ?></b>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="far fa-newspaper"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Direct Cost</h4>
        </div>
        <div class="card-body">
          <b><?= $direct_cost; ?></b>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Overhead Cost</h4>
        </div>
        <div class="card-body">
          <b><?= $overhead_cost; ?></b>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>General Cost</h4>
        </div>
        <div class="card-body">
          <b><?= $overhead_cost; ?></b>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-lg-12 col-md-12 col-12">
    <div class="card">
      <div class="card-header">
        <h4>Profit & Loss</h4>
      </div>
      <div class="card-body">
        <div id="canvas-holder">
          <canvas id="chart-area-profit" width="150" height="150" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script src="<?= base_url(); ?>assets/bower_components/chart.js/Chart.js"></script> -->
<script>
  var pieDataProfit = [{
      value: <?= cektb5(0, $top5, 'amount'); ?>,
      color: "#4B3C77",
      highlight: "#554488",
      label: <?= cektb5(0, $top5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(1, $top5, 'amount'); ?>,
      color: "#2100AA",
      highlight: "#2200aaea",
      label: <?= cektb5(1, $top5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(2, $top5, 'amount'); ?>,
      color: "#DED828",
      highlight: "#cfca26",
      label: <?= cektb5(2, $top5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(3, $top5, 'amount'); ?>,
      color: "#28A0F6",
      highlight: "#2493e2",
      label: <?= cektb5(3, $top5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(4, $top5, 'amount'); ?>,
      color: "#FF8B49",
      highlight: "#e67d41",
      label: <?= cektb5(4, $top5, 'project_code'); ?>
    }

  ];

  var pieDataLoss = [{
      value: <?= cektb5(0, $bottom5, 'amount'); ?>,
      color: "#4B3C77",
      highlight: "#554488",
      label: <?= cektb5(0, $bottom5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(1, $bottom5, 'amount'); ?>,
      color: "#2100AA",
      highlight: "#2200aaea",
      label: <?= cektb5(1, $bottom5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(2, $bottom5, 'amount'); ?>,
      color: "#DED828",
      highlight: "#cfca26",
      label: <?= cektb5(2, $bottom5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(3, $bottom5, 'amount'); ?>,
      color: "#28A0F6",
      highlight: "#2493e2",
      label: <?= cektb5(3, $bottom5, 'project_code'); ?>
    },
    {
      value: <?= cektb5(4, $bottom5, 'amount'); ?>,
      color: "#FF8B49",
      highlight: "#e67d41",
      label: <?= cektb5(4, $bottom5, 'project_code'); ?>
    }

  ];

  window.onload = function() {
    var ctxProfit = document.getElementById("chart-area-profit").getContext("2d");
    window.myPie = new Chart(ctxProfit).Pie(pieDataProfit);
    var ctxLoss = document.getElementById("chart-area-loss").getContext("2d");
    window.myPie = new Chart(ctxLoss).Pie(pieDataLoss);
  };
</script>