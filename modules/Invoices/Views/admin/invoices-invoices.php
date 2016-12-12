{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-th-list"></i> '.lang("invoices.invoices.list",false),false,'<a href="'.admin_url("invoices/invoices/create", false).'" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> '.lang("global.create").'</a> <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> '.lang("global.movetrash").'</button>');?>
<div class="search-box">


            <div class="row">
                
                <div class="col-lg-8 col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="<?php echo lang("global.placeholder_search");?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> <?php echo lang("global.btn_search");?></button>
                      </span>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-8">
                    <div class="input-group">
                    <select class="form-control selectpicker" name="filter">
                    <!--filter-->
                    
                        <option value="id">id</option>
                        <option value="session_id">session_id</option>
                        <option value="language">language</option>
                        <option value="users_id">users_id</option>
                        <option value="stores_id">stores_id</option>
                        <option value="created_at">created_at</option>
                        <option value="updated_at">updated_at</option>
                        <option value="created_by">created_by</option>
                        <option value="name">name</option>
                        <option value="totals">totals</option>
                        <option value="curentcy">curentcy</option>
                        <option value="payment_id">payment_id</option>
                        <option value="ships_id">ships_id</option>
                        <option value="tax_rate_total">tax_rate_total</option>
                        <option value="payment_rate_total">payment_rate_total</option>
                        <option value="ships_rate_total">ships_rate_total</option>
                        <option value="proess_by">proess_by</option>
                        <option value="process_date">process_date</option>
                        <option value="status">status</option> 
                    <!--filter-->           
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-xs-4">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-sort"></i></button>
                </div>

            </div>

        
<div class="addTags"></div>
</div>
<div class="table-responsive">
<table class="table table-hover table-pull">
	<thead>
		<tr>
			<!--ViewHeader-->

            <td data-field="id,number,left"><?php echo lang("invoices.invoices.id");?></td>

            <td data-field="name,input,left"><?php echo lang("invoices.invoices.name");?></td>

            <td data-field="created_at,timestamp,left"><?php echo lang("invoices.invoices.created_at");?></td>

            <td data-field="updated_at,timestamp,left"><?php echo lang("invoices.invoices.updated_at");?></td>

            <td data-field="created_by,number,left"><?php echo lang("invoices.invoices.created_by");?></td>

            <td data-field="totals,number,left"><?php echo lang("invoices.invoices.totals");?></td>

            <td data-field="payment_id,number,left"><?php echo lang("invoices.invoices.payment_id");?></td>

            <td data-field="ships_id,number,left"><?php echo lang("invoices.invoices.ships_id");?></td>

            <td data-field="tax_rate_total,number,left"><?php echo lang("invoices.invoices.tax_rate_total");?></td>

            <td data-field="payment_rate_total,number,left"><?php echo lang("invoices.invoices.payment_rate_total");?></td>

            <td data-field="ships_rate_total,number,left"><?php echo lang("invoices.invoices.ships_rate_total");?></td>

            <td data-field="proess_by,number,left"><?php echo lang("invoices.invoices.proess_by");?></td>

            <td data-field="process_date,timestamp,left"><?php echo lang("invoices.invoices.process_date");?></td>

            <td data-field="status,number,left"><?php echo lang("invoices.invoices.status");?></td>
<!--ViewHeader-->
			<td data-fixed="right"></td>
		</tr>
	</thead>
	<tbody>
		<?php 

		foreach ($data as $key => $value) { ?>
			
		<tr>
			<!--ViewContent-->

            <td><?php echo $value->id;?></td>

            <td><?php echo $value->name;?></td>

            <td><?php echo $value->created_at;?></td>

            <td><?php echo $value->updated_at;?></td>

            <td><?php echo $value->created_by;?></td>

            <td><?php echo $value->totals;?></td>

            <td><?php echo $value->payment_id;?></td>

            <td><?php echo $value->ships_id;?></td>

            <td><?php echo $value->tax_rate_total;?></td>

            <td><?php echo $value->payment_rate_total;?></td>

            <td><?php echo $value->ships_rate_total;?></td>

            <td><?php echo $value->proess_by;?></td>

            <td><?php echo $value->process_date;?></td>

            <td><?php echo $value->status;?></td>
<!--ViewContent-->
			<td><?php button(["edit" => ["invoices/invoices/edit/".$value->id], "delete" => ["invoices/invoices/delete/".$value->id]]);?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php pages($data);?>
</div>
<?php _panel_close();?>
<?php formclose();?>

{footer}