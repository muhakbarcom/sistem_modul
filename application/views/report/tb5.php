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
                      <th>Client Name</th>
                      <th>Project Name</th>
                      <th>Project Code</th>
                      <th>Profit(IDR)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($top5 as $value) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->client_name ?></td>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->project_code ?></td>
                        <td class="text-right"><?php echo rupiah($value->amount) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="box-header">
                <h3 class="box-title">Bottom 5 Project</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Client Name</th>
                      <th>Project Name</th>
                      <th>Project Code</th>
                      <th>Loss(IDR)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($bottom5 as $value) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->client_name ?></td>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->project_code ?></td>
                        <td class="text-right"><?php echo rupiah($value->amount) ?></td>
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