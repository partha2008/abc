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