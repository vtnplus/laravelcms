{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel('<i class="glyphicon glyphicon-cog"></i> '.lang("settings.title",false),true,'
		
		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  '.lang("global.save",false).'</button>
		');?>
<!--ViewHeader-->

    
     <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.email");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[email]" value="<?php echo data(@$data->email);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.hotline");?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="inputGender" name="config[hotline]" value="<?php echo data(@$data->hotline);?>">
        </div>

        <div class="col-sm-3">
            <input type="text" class="form-control" id="inputGender" name="config[hotline_1]" value="<?php echo data(@$data->hotline_1);?>">
        </div>

        <div class="col-sm-3">
            <input type="text" class="form-control" id="inputGender" name="config[hotline_2]" value="<?php echo data(@$data->hotline_2);?>" >
        </div>

    </div>


    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.time_zone");?></label>
        <div class="col-sm-4">
            <select type="text" class="form-control selectpicker" data-live-search="true" name="config[time_zone]"><?php time_zone(data(@$data->time_zone));?></select>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="inputGender" name="config[time_short_format]" value="<?php echo data(@$data->time_short_format);?>">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="inputGender" name="config[time_long_format]" value="<?php echo data(@$data->time_long_format);?>">
        </div>
    </div>


    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.users_can_register");?></label>
        <div class="col-sm-2">
            <select type="text" class="form-control selectpicker" data-live-search="true" name="config[users_can_register]">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <span class="help-block">Open Register</span>
        </div>

        <div class="col-sm-2">
            <select type="text" class="form-control selectpicker" data-live-search="true" name="config[users_register_welcome]">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <span class="help-block">Send mail Welcome</span>
        </div>

        <div class="col-sm-3">
             <select type="text" class="form-control selectpicker" data-live-search="true" name="config[users_register_action]">
                <option value="">None</option>
                <option value="captcha">Captcha</option>
                <option value="email">Send code via email</option>
            </select>
            <span class="help-block">Security Via</span>
        </div>

        <div class="col-sm-3">
            <select type="text" class="form-control selectpicker" data-live-search="true" name="config[users_register_groups]">
                <option value="none">Default</option>
                
            </select>
            <span class="help-block">Group Default</span>
        </div>
    </div>



    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.smpt");?></label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="inputGender" name="config[smtp_server]" value="<?php echo data(@$data->smtp_server,base_url("",true));?>">
            <span class="help-block">Server</span>
        </div>

        <div class="col-sm-2">
            <input type="text" class="form-control" id="inputGender" name="config[smtp_username]" value="<?php echo data(@$data->smtp_username);?>">
            <span class="help-block">SMPT User</span>
        </div>

        <div class="col-sm-2">
             <input type="text" class="form-control" id="inputGender" name="config[smtp_password]" value="<?php echo data(@$data->smtp_password);?>">
            <span class="help-block">SMPT Password</span>
        </div>

        <div class="col-sm-2">
            <input type="text" class="form-control" id="inputGender" name="config[smtp_port]" value="<?php echo data(@$data->smtp_port,25);?>">
            <span class="help-block">Port</span>
        </div>
         <div class="col-sm-2">
            <input type="text" class="form-control" id="inputGender" name="config[smtp_encryption]" value="<?php echo data(@$data->smtp_encryption);?>" placeholder="tls, ssl">
            <span class="help-block">Encryption</span>
        </div>
    </div>

<hr>

<h4><?php echo lang("settings.infomation");?></h4>

    
<!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.address");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[address]" value="<?php echo data(@$data->address);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>

    <!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.country");?></label>
        <div class="col-sm-3">
	        <select type="text" class="form-control selectpicker" data-live-search="true" id="inputGender" name="config[country]">
                <?php country(data(@$data->country));?>   
            </select>
	    </div>

	    <div class="col-sm-3">
	        <input type="text" class="form-control" id="inputGender" name="config[city]" value="<?php echo data(@$data->city);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
	    </div>

	    <div class="col-sm-4">
	        <input type="text" class="form-control" id="inputGender" name="config[stase]" value="<?php echo data(@$data->stase);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
	    </div>

    </div>




<!--Gender -->
     <div class="form-group" data-field="gender,input,requice">
        <label for="inputGender" class="col-sm-2 control-label"><?php echo lang("settings.opendor");?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputGender" name="config[opendor]" value="<?php echo data(@$data->opendor);?>" placeholder="<?php echo lang("settings.sitename_placeholder");?>">
    </div>
    </div>



    

<hr>

<!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputheader_tags" class="col-sm-2 control-label"><?php echo lang("settings.header_tags");?></label>
        <div class="col-sm-10">
        <textarea type="text" style="height: 200px;" class="form-control" id="inputheader_tags" name="config[header_tags]" placeholder="<?php echo lang("settings.sitename_placeholder");?>"><?php echo data(@$data->header_tags);?></textarea>
    </div>
    </div>

<!--Gender -->
    <div class="form-group" data-field="gender,input,requice">
        <label for="inputfooter_tags" class="col-sm-2 control-label"><?php echo lang("settings.footer_tags");?></label>
        <div class="col-sm-10">
        <textarea type="text" style="height: 200px;" class="form-control" id="inputfooter_tags" name="config[footer_tags]"  placeholder="<?php echo lang("settings.sitename_placeholder");?>"><?php echo data(@$data->gender);?></textarea>
    </div>
    </div>

    <!--ViewHeader-->
<hr>
    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      
	      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>  <?php echo lang("global.save");?></button>
	    </div>
    </div>
<?php _panel_close();?>
<?php formclose();?>   
{footer}