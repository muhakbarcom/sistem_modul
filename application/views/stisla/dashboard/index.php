<style type="text/css">
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-chart-line"></i>
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
        <i class="fas fa-dollar-sign"></i>
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
        <i class="fas fa-hand-holding-usd"></i>
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
        <i class="fas fa-coins"></i>
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
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Report</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div id="lineChart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Report</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div id="lineChartProject"></div>
          </div>
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
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Profit</h4>
              </div>
              <div class="card-body">
                <canvas id="myChart3"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Loss</h4>
              </div>
              <div class="card-body">
                <canvas id="myChart4"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-12">
    <div class="card">
      <div class="card-header">
        <h4>Top 5 & Bottom 5 Project</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Top 5</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th>Amount</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($top5 as $value) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->name; ?></td>
                        <td><?= rupiah($value->amount); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Bottom 5</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th>Amount</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($bottom5 as $value) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->name; ?></td>
                        <td><?= rupiah($value->amount); ?></td>
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
<!-- <script src="<?= base_url(); ?>assets/bower_components/chart.js/Chart.js"></script> -->

<script src="<?= base_url("assets/highchart/highcharts.js"); ?>"></script>
<script>
  Highcharts.chart('lineChart', {
    title: {
      text: ''
    },

    subtitle: {
      // text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
      title: {
        text: ''
      }
    },

    xAxis: {
      type: 'datetime',
      crosshair: true,
      crosshair: {
        color: 'rgb(15 135 217 / 21%)',
        width: 100
      },
      gridLineWidth: 0,
      labels: {
        color: '#333'
      }
    },

    tooltip: {
      shared: true,
      crosshairs: true
    },



    plotOptions: {
      series: {
        label: {
          connectorAllowed: true
        },

        pointStart: Date.UTC(<?= $lineChart_month; ?>, <?= $lineChart_day - 1; ?>, 1),
        pointIntervalUnit: 'month'
      }
    },

    series: [{
      name: 'Revenue',
      data: <?= json_encode($lineChart_revenue); ?>,
      color: '#0678d4'
    }, {
      name: 'Total Cost',
      data: <?= json_encode($lineChart_total_cost); ?>,
      color: '#efab58'
    }, {
      name: 'Total Kumulatif',
      data: <?= json_encode($lineChart_kumulatif); ?>,
      color: '#198754 '
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 600
        },
        chartOptions: {

          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });

  // highchart project
  Highcharts.chart('lineChartProject', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Revenue Project'
    },
    subtitle: {
      text: 'August'
    },
    xAxis: {
      categories: <?= json_encode($lineChartProject_projectName); ?>,
      crosshair: true
    },
    yAxis: {
      title: {
        useHTML: true,
        text: 'Revenue Project'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Revenue',
      data: <?= json_encode($lineChartProject_revenue); ?>,

    }]
  });


  var ctx = document.getElementById("myChart3").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?= cektb5(0, $top5, 'amount'); ?>
          <?= cektb5(1, $top5, 'amount'); ?>
          <?= cektb5(2, $top5, 'amount'); ?>
          <?= cektb5(3, $top5, 'amount'); ?>
          <?= cektb5(4, $top5, 'amount'); ?>
        ],
        backgroundColor: [
          '#6777ef',
          '#ffa426',
          '#fc544b',
          '#191d21',
          '#63ed7a',
        ],
        label: 'Dataset 1'
      }],
      labels: [
        <?= cektb5(0, $top5, 'project_code'); ?>
        <?= cektb5(1, $top5, 'project_code'); ?>
        <?= cektb5(2, $top5, 'project_code'); ?>
        <?= cektb5(3, $top5, 'project_code'); ?>
        <?= cektb5(4, $top5, 'project_code'); ?>
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });

  var ctx = document.getElementById("myChart4").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?= cektb5(0, $bottom5, 'amount'); ?>
          <?= cektb5(1, $bottom5, 'amount'); ?>
          <?= cektb5(2, $bottom5, 'amount'); ?>
          <?= cektb5(3, $bottom5, 'amount'); ?>
          <?= cektb5(4, $bottom5, 'amount'); ?>
        ],
        backgroundColor: [
          '#6777ef',
          '#ffa426',
          '#fc544b',
          '#191d21',
          '#63ed7a',
        ],
        label: 'Dataset 1'
      }],
      labels: [
        <?= cektb5(0, $bottom5, 'project_code'); ?>
        <?= cektb5(1, $bottom5, 'project_code'); ?>
        <?= cektb5(2, $bottom5, 'project_code'); ?>
        <?= cektb5(3, $bottom5, 'project_code'); ?>
        <?= cektb5(4, $bottom5, 'project_code'); ?>
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });
</script>