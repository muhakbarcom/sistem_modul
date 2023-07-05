<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <div class="card-body">

          <form id="myform" method="post" onsubmit="return false">

            <div class="row" style="margin-bottom: 10px">
              <div class="col-xs-12 col-md-4 text-center">
                <div style="margin-top: 4px" id="message">

                </div>
              </div>
              <div class="col-xs-12 col-md-4 text-right">

              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                <thead>
                  <tr>
                    <th width=""></th>
                    <th width="10px">No</th>
                    <th>Role Name</th>
                    <th>Role Description</th>
                    <th>Image</th>

                    <th width="80px">Action</th>
                  </tr>
                </thead>


              </table>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

  });
</script>