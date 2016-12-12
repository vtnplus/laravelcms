{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-pencil"></i> '.lang("invoices.invoices.edit",false),true,'
		<a class="btn btn-default" href="'.admin_url("invoices/invoices",false).'"><i class="glyphicon glyphicon-remove-sign"></i> '.lang("global.cancel",false).'</a> 
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>
<!--ViewHeader-->

    <!--Session_id -->
    <div class="form-group" data-field="session_id,input,requice">
        <label for="inputSession_id" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.session_id");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSession_id" name="session_id" value="<?php echo data($data->session_id);?>" placeholder="<?php echo lang("invoices.invoices.session_id_placeholder");?>">
    </div>
    </div>
   

    <!--Language -->
    <div class="form-group" data-field="language,input,requice">
        <label for="inputLanguage" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.language");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputLanguage" name="language" value="<?php echo data($data->language);?>" placeholder="<?php echo lang("invoices.invoices.language_placeholder");?>">
    </div>
    </div>
   

    <!--Users_id -->
    <div class="form-group" data-field="users_id,number,requice">
        <label for="inputUsers_id" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.users_id");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputUsers_id" name="users_id" value="<?php echo data($data->users_id);?>" placeholder="<?php echo lang("invoices.invoices.users_id_placeholder");?>">
    </div>
    </div>
   

    <!--Stores_id -->
    <div class="form-group" data-field="stores_id,number,requice">
        <label for="inputStores_id" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.stores_id");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputStores_id" name="stores_id" value="<?php echo data($data->stores_id);?>" placeholder="<?php echo lang("invoices.invoices.stores_id_placeholder");?>">
    </div>
    </div>
   

    <!--Created_at -->
    <div class="form-group" data-field="created_at,timestamp,requice">
        <label for="inputCreated_at" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.created_at");?></label>
        <div class="col-sm-10">
        <input type="timestamp" class="form-control" id="inputCreated_at" name="created_at" value="<?php echo data($data->created_at);?>" placeholder="<?php echo lang("invoices.invoices.created_at_placeholder");?>">
    </div>
    </div>
   

    <!--Updated_at -->
    <div class="form-group" data-field="updated_at,timestamp,requice">
        <label for="inputUpdated_at" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.updated_at");?></label>
        <div class="col-sm-10">
        <input type="timestamp" class="form-control" id="inputUpdated_at" name="updated_at" value="<?php echo data($data->updated_at);?>" placeholder="<?php echo lang("invoices.invoices.updated_at_placeholder");?>">
    </div>
    </div>
   

    <!--Created_by -->
    <div class="form-group" data-field="created_by,number,requice">
        <label for="inputCreated_by" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.created_by");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputCreated_by" name="created_by" value="<?php echo data($data->created_by);?>" placeholder="<?php echo lang("invoices.invoices.created_by_placeholder");?>">
    </div>
    </div>
   

    <!--Name -->
    <div class="form-group" data-field="name,input,requice">
        <label for="inputName" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.name");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name" value="<?php echo data($data->name);?>" placeholder="<?php echo lang("invoices.invoices.name_placeholder");?>">
    </div>
    </div>
   

    <!--Totals -->
    <div class="form-group" data-field="totals,number,requice">
        <label for="inputTotals" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.totals");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputTotals" name="totals" value="<?php echo data($data->totals);?>" placeholder="<?php echo lang("invoices.invoices.totals_placeholder");?>">
    </div>
    </div>
   

    <!--Curentcy -->
    <div class="form-group" data-field="curentcy,input,requice">
        <label for="inputCurentcy" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.curentcy");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputCurentcy" name="curentcy" value="<?php echo data($data->curentcy);?>" placeholder="<?php echo lang("invoices.invoices.curentcy_placeholder");?>">
    </div>
    </div>
   

    <!--Payment_id -->
    <div class="form-group" data-field="payment_id,number,requice">
        <label for="inputPayment_id" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.payment_id");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputPayment_id" name="payment_id" value="<?php echo data($data->payment_id);?>" placeholder="<?php echo lang("invoices.invoices.payment_id_placeholder");?>">
    </div>
    </div>
   

    <!--Ships_id -->
    <div class="form-group" data-field="ships_id,number,requice">
        <label for="inputShips_id" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.ships_id");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputShips_id" name="ships_id" value="<?php echo data($data->ships_id);?>" placeholder="<?php echo lang("invoices.invoices.ships_id_placeholder");?>">
    </div>
    </div>
   

    <!--Tax_rate_total -->
    <div class="form-group" data-field="tax_rate_total,number,requice">
        <label for="inputTax_rate_total" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.tax_rate_total");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputTax_rate_total" name="tax_rate_total" value="<?php echo data($data->tax_rate_total);?>" placeholder="<?php echo lang("invoices.invoices.tax_rate_total_placeholder");?>">
    </div>
    </div>
   

    <!--Payment_rate_total -->
    <div class="form-group" data-field="payment_rate_total,number,requice">
        <label for="inputPayment_rate_total" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.payment_rate_total");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputPayment_rate_total" name="payment_rate_total" value="<?php echo data($data->payment_rate_total);?>" placeholder="<?php echo lang("invoices.invoices.payment_rate_total_placeholder");?>">
    </div>
    </div>
   

    <!--Ships_rate_total -->
    <div class="form-group" data-field="ships_rate_total,number,requice">
        <label for="inputShips_rate_total" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.ships_rate_total");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputShips_rate_total" name="ships_rate_total" value="<?php echo data($data->ships_rate_total);?>" placeholder="<?php echo lang("invoices.invoices.ships_rate_total_placeholder");?>">
    </div>
    </div>
   

    <!--Proess_by -->
    <div class="form-group" data-field="proess_by,number,requice">
        <label for="inputProess_by" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.proess_by");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputProess_by" name="proess_by" value="<?php echo data($data->proess_by);?>" placeholder="<?php echo lang("invoices.invoices.proess_by_placeholder");?>">
    </div>
    </div>
   

    <!--Process_date -->
    <div class="form-group" data-field="process_date,timestamp,requice">
        <label for="inputProcess_date" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.process_date");?></label>
        <div class="col-sm-10">
        <input type="timestamp" class="form-control" id="inputProcess_date" name="process_date" value="<?php echo data($data->process_date);?>" placeholder="<?php echo lang("invoices.invoices.process_date_placeholder");?>">
    </div>
    </div>
   

    <!--Status -->
    <div class="form-group" data-field="status,number,requice">
        <label for="inputStatus" class="col-sm-2 control-label"><?php echo lang("invoices.invoices.status");?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="inputStatus" name="status" value="<?php echo data($data->status);?>" placeholder="<?php echo lang("invoices.invoices.status_placeholder");?>">
    </div>
    </div>
   

<!--ViewHeader-->
<hr>
    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <a class="btn btn-default" href="<?php admin_url("invoices/invoices");?>"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo lang("global.cancel");?></a> 
	      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
	    </div>
    </div>
<?php _panel_close();?>
<?php formclose();?>
{footer}