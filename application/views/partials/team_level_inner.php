<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0">Team Level</h3>
      <select class="form-control" name="state_id" id="state_id" onchange="getTeamLevel(this.value);">
        <option value="">Select Level</option>
        <?php
          if(!empty($level)){
            for($i=0;$i<count($level)-1;$i++){
        ?>
              <option value="<?php echo $level[$i]->parent_id;?>"><?php echo $i+1;?></option>
        <?php
            }
          }
        ?>
      </select>
    </div>
    <div class="table-responsive" id="team_level"></div>
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