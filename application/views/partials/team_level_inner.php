<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0">Team Level</h3>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush even-background">
        <thead class="thead-light">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Sponsor Name</th>
            <th scope="col">Sponsor ID</th>            
            <th scope="col">Mobile No</th>
            <th scope="col">Joining Date</th>
            <th scope="col">Activation Date</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        		if(!empty($children)){
        			foreach ($children as $key => $value) {        				
        	?>
        	<tr>
            	<td><?php echo $value->first_name.' '.$value->last_name;?></td>
              <td><?php echo $value->sponsor_id;?></td>
              <td><?php echo $value->parent_first_name.' '.$value->parent_last_name;?></td>
              <td><?php echo $value->parent_sponsor_id;?></td>              
              <td><?php echo $value->mobile_no;?></td>
              <td><?php date_default_timezone_set("Asia/Kolkata"); echo date('d-m-Y H:i:s', $value->date_added);?></td>
              <td><?php date_default_timezone_set("Asia/Kolkata"); echo date('d-m-Y H:i:s', $value->approved_on);?></td>
            </tr>
            <?php
        			}
	        	}else{
	        ?>
	        <tr>
            	<td colspan="7" style="text-align: center;">No records found</td>
            </tr>
	        <?php
	        	}
	        ?>            
        </tbody>
      </table>
    </div>
    <!--<div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>-->
  </div>
</div>