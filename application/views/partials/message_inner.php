<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="mb-0"><?php echo $page_name;?></h3>
    </div>
    <div class="card-body">
      <?php
          $msg = $this->session->userdata('has_error');
          if(!$msg && isset($msg)){
        ?>
        <div class="alert alert-success alert-dismissible fade show">   
          <h4 class="alert-heading">Success!</h4> <?php echo $this->session->userdata('msg_notification');?>  
        </div>
        <?php
            $this->session->unset_userdata('msg_notification');
            $this->session->unset_userdata('has_error');
          }
        ?>
        <?php
          if($msg && isset($msg)){
        ?>
        <div class="alert alert-danger alert-dismissible fade show">   
          <h4 class="alert-heading">Error!</h4> <?php echo $this->session->userdata('msg_notification');?>  
        </div>
        <?php
            $this->session->unset_userdata('msg_notification');
            $this->session->unset_userdata('has_error');
          }
        ?> 
      <form action="<?php echo base_url('member/send_message');?>" method="post">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group required">
                <label class="form-control-label" for="user_id">Subject </label>
                <input type="text" class="form-control" name="subject">
              </div>

            </div>
            <div class="col-sm-12">
                <div class="form-group required">
                <label class="form-control-label" for="user_id">Message </label>
                <textarea rows="4" class="form-control" name="message"></textarea>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
      <div class="table-responsive msg-list">           
        <table class="table align-items-center table-flush even-background">
          <thead class="thead-light">
            <tr>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(!empty($messages)){
                foreach ($messages as $key => $value) {               
            ?>
            <tr>
                <td><?php echo $value->subject;?></td>
                <td><?php echo $value->message;?></td>
                <td><?php echo date('d-m-Y H:i:s', $value->date);?></td>
              </tr>
              <?php
                }
              }else{
            ?>
               <tr>
                <td colspan="3" style="text-align: center;">No records found</td>
              </tr>
            <?php
              }
            ?>  
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>