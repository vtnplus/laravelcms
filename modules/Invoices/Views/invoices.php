{header}
<div class="container">
	<?php
	if($error){
		
		?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Warning!</strong> <?php echo $error;?>
		  <br>
		  <a href="<?php echo base_url("products");?>">Go to shops</a>
		</div>
		<?php
	}else{
	?>
	<h1>Đơn hàng : <?php echo @$data->name;?></h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<td width="2%">STT</td>
				<td>Tên sản phẩm</td>
				<td>Giá</td>
				<td>Số lượng</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $key => $value) { ?>
				
			<tr>
				<td class="text-center"><span class="label label-danger"><?php echo ($key + 1);?></span></td>
				<td><?php echo $value->items_name;?></td>
				<td><?php echo number_format($value->items_prices);?></td>
				<td><?php echo $value->items_number;?> 
					<div class="btn-group btn-group-xs pull-right" role="group" aria-label="...">
					  <a href="javascript:;" onClick="window.location.href='<?php echo base_url("invoices/order/upitems/".$value->modules."/last/".$value->items_id);?>'" type="button" class="btn btn-warning" style="width:20px;">+</a>
					  <a href="javascript:;" onClick="window.location.href='<?php echo base_url("invoices/order/upitems/".$value->modules."/first/".$value->items_id);?>'" type="button" class="btn btn-success" style="width:20px;">-</a>
					 
					</div>
				</td>
				<td class="text-right"><a href="<?php echo base_url("invoices/order/remove/".$value->id);?>" class="btn btn-xs btn-info">Remove</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<hr>
	<h3>Tổng tiền : <?php echo number_format($data->totals);?>
		<a href="<?php echo base_url("invoices/payments");?>" class="pull-right btn btn-primary">Thanh toán</a>

	</h3>
	<?php } ?>
</div>

{footer}