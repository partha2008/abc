<?php echo $head;?>

<div id="wrapper">
	<?php echo $header;?>
	<div id="page-wrapper" style="min-height: 374px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List of Messages</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
				<div class="panel-body">
					<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					  <div class="row">
						 <div class="col-sm-12 pull-right">
							<form action="<?php echo base_url('admin/message-list');?>" method="GET" role="form">
								<div id="dataTables-example_filter" class="dataTables_filter">
									<label>Search by:<input name="search_key" type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example" id="user-search" value="<?php echo $search_key;?>"></label>
									<button type="submit" class="btn btn-primary">Search</button>
								</div>
							</form>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-sm-12">
							<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
							   <thead>
								  <tr role="row">
									<th>Sender</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Date</th>
								  </tr>
							   </thead>
							   <tbody>
							    <?php if(!empty($message_details)){ ?>
								<?php foreach($message_details AS $detail) {
								?>
								  <tr class="gradeA odd" role="row">	
									 <td><?php echo $detail->first_name.' '.$detail->last_name;?></td>
									 <td><?php echo $detail->subject;?></td>
									 <td><?php echo $detail->message;?></td>
									 <td><?php echo date('d-m-Y', $detail->date);?></td>
								  </tr>
								  <?php } ?>
								  <?php }else{ ?>
								  <tr class="gradeA odd" role="row"><td colspan="4" style="text-align:center;">No records found</td></tr>
								  <?php } ?>
							   </tbody>
							</table>
						 </div>
					  </div>
					 <div class="pagination" style="float:right;">            
						<?php echo $pagination ?>            
					</div>
					</div>
					<!-- /.table-responsive -->
					</div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
</div>

</div>
<!-- /#wrapper -->

<?php echo $footer; ?>
