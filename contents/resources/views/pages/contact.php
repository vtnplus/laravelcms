{header}

<div class="container">
	<?php echo $data->content;?>
	<div class="row">
		<div class="col-lg-4">
			<h3 class="customs-title"><?php echo config("site.sitename");?></h3>
			
			 Hotline : <a href="tel:<?php echo config("site.hotline");?>"><?php echo config("site.hotline");?></a><br>
			 Email : <a href="mailto:<?php echo config("site.email");?>?subject=Register+Account"><?php echo config("site.email");?></a><br>
			 Địa chỉ : <?php echo config("site.address");?>
		</div>
		<div class="col-lg-8">
			<?php formopen(["action" => base_url("stores/sendmail")]);?>
				<ul class="row">
					<li class="col-xs-12 col-sm-6">
						<div class="form-group">
						    <label for="exampleInputEmail1"><?php echo lang("global.youremail");?></label>
						    <input type="email" class="form-control" name="text[email]" required="" placeholder="<?php echo lang("global.youremail_placeholder");?>">
						</div>
					</li>
					<li class="col-xs-12 col-sm-6">
						<div class="form-group">
						    <label for="exampleInputPassword1"><?php echo lang("global.yourphone");?></label>
						    <input type="tel" class="form-control" name="text[phone]" placeholder="<?php echo lang("global.yourphone_placeholder");?>">
						</div>
					</li>
				</ul>
				
				  
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1"><?php echo lang("global.subject");?></label>
				    <input type="text" class="form-control" name="text[subject]" required="" placeholder="<?php echo lang("global.subject");?>">
				  </div>

				  <div class="form-group">
				  	<textarea class="form-control" style="height: 300px;" name="text[content]" required=""></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> <?php echo lang("button.send");?></button>
				  <label type="submit" class="btn btn-info"><i class="glyphicon glyphicon-open"></i> <?php echo lang("button.attach");?> <input type="file" name="" style="display: none;"></label>
			<?php formclose();?>
		</div>
	</div>
</div>
{footer}