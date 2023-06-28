<!-- Default box -->
<style>
  .dot1 {
    height: 15px;
    width: 15px;
    background-color: #4B3C77;
    border-radius: 50%;
    display: inline-block;
  }

  .dot2 {
    height: 15px;
    width: 15px;
    background-color: #2100AA;
    border-radius: 50%;
    display: inline-block;
  }

  .dot3 {
    height: 15px;
    width: 15px;
    background-color: #DED828;
    border-radius: 50%;
    display: inline-block;
  }

  .dot4 {
    height: 15px;
    width: 15px;
    background-color: #28A0F6;
    border-radius: 50%;
    display: inline-block;
  }

  .dot5 {
    height: 15px;
    width: 15px;
    background-color: #FF8B49;
    border-radius: 50%;
    display: inline-block;
  }
</style>
<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-12">Current data : <?php echo bulan_surat(date('Y-m')); ?></div>
</div>
<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= base_url('assets/img/dollar4.png'); ?>" alt="" width="50px">
            </div>
            <div class="col-md-8">
              <div class="row text-bold" style="color: #5B99E7;">Revenue</div>
              <div class="row" style="font-size: 20px;"><b><?= $revenue; ?></b></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= base_url('assets/img/dollar2.png'); ?>" alt="" width="50px">
            </div>
            <div class="col-md-8">
              <div class="row text-bold" style="color: #5B99E7;">Direct Cost</div>
              <div class="row" style="font-size: 20px;"><b><?= $direct_cost; ?></b></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="col-md-12">
      <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/dollar3.png'); ?>" alt="" width="50px">
          </div>
          <div class="col-md-8">
            <div class="row text-bold" style="color: #5B99E7;">Overhead Cost</div>
            <div class="row" style="font-size: 20px;"><b><?= $overhead_cost; ?></b></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="col-md-12">
      <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/dollar1.png'); ?>" alt="" width="50px">
          </div>
          <div class="col-md-8">
            <div class="row text-bold" style="color: #5B99E7;">General Cost</div>
            <div class="row" style="font-size: 20px;"><b><?= $general_cost; ?></b></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
          <div class="row">
            <div class="col-md-6">
              <div class="box-header">
                <h3 class="box-title">Profit</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <div id="canvas-holder">
                      <canvas id="chart-area-profit" width="150" height="150" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-striped">
                      <?php $no = 1; ?>
                      <?php foreach ($top5 as $value) : ?>
                        <tr>
                          <td class="col-md-1"><span class="dot<?= $no++; ?>"></span></td>
                          <td><?= $value->name . " (" . $value->project_code . ")"; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box-header">
                <h3 class="box-title">Loss</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <div id="canvas-holder">
                      <canvas id="chart-area-loss" width="150" height="150" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-striped">
                      <?php $no = 1; ?>
                      <?php foreach ($bottom5 as $value) : ?>
                        <tr>
                          <td class="col-md-1"><span class="dot<?= $no++; ?>"></span></td>
                          <td><?= $value->name . " (" . $value->project_code . ")"; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;background-color:#fff">
          <div class="row">
            <div class="col-md-6">
              <div class="box-header">
                <h3 class="box-title">Top 5 Project</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Project Name</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($top5 as $value) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->name; ?></td>
                        <td><?= rupiah($value->amount); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box-header">
                <h3 class="box-title">Bottom 5 Project</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Project Name</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($bottom5 as $value) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->name; ?></td>
                        <td><?= rupiah($value->amount); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
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