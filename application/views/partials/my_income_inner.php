<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0">My Income</h3>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush even-background">
        <thead class="thead-light">
          <tr>
            <th scope="col">PNR No</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">Remark</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        		if(!empty($user_pnr)){
        			foreach ($user_pnr as $key => $value) {        				
        	?>
        	<tr>
            	<td><?php echo $value->pnr;?></td>
              <td><?php echo $value->amount;?></td>
              <td><?php date_default_timezone_set("Asia/Kolkata"); echo date('d-m-Y H:i:s', $value->date);?></td>
              <td><?php echo $value->remark;?></td>
            </tr>
            <?php
        			}
	        	}else{
	        ?>
	        <tr>
            	<td colspan="4" style="text-align: center;">No records found</td>
            </tr>
	        <?php
	        	}
	        ?>            
        </tbody>
      </table>
    </div>
  </div>
</div>