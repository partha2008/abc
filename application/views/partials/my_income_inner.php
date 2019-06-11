<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0"><?php echo $page_name;?></h3>
    </div>
    <div class="card-body">
        <div class="total_income">
        <h3 class="mb-0">Total Income: <span id="total_income"><?php echo $user_details->total_income;?></span></h3>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group required">
                <label class="form-control-label" for="user_id">From:</label>
                <input type="text" class="form-control datepicker" id="datepicker_from">
              </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group required">
                <label class="form-control-label" for="user_id">To:</label>
                <input type="text" class="form-control datepicker" id="datepicker_to">
              </div>

            </div>

        </div>

   
    <button type="button" class="btn btn-primary" onclick="getMyIncome();">Show</button>
    <div class="table-responsive income-list">
      
      <table class="table align-items-center table-flush even-background">
        <thead class="thead-light">
          <tr>
            <th scope="col">PNR No</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">Remark</th>
          </tr>
        </thead>
        <tbody id="income_body">
          <tr>
            <td colspan="4" style="text-align: center;">No records found</td>
          </tr>
        </tbody>
      </table>

      </div>

    </div>
  </div>
</div>