<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Top 5 Project</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
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
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Bottom 5 Project</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
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