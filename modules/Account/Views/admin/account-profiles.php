{header}
<?php formopen(["class" => "form-horizontal"]);?>
<?php _panel("Profiles ",true,'
			
			<button class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> '.lang("global.save",false).'</button>
			');?>
	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.login_info");?></label>

	    <div class="col-sm-5">
	      	<input type="email" class="form-control" input-mask="email" name="email" value="<?php echo $data->email;?>" requiced placeholder="Modules Name">
	      	<div class="help-block"><?php echo lang("user.email");?></div>
	    </div>

	    <div class="col-sm-5">
	      	<input type="text" class="form-control" name="password" placeholder="Modules Name">
	      	<div class="help-block"><?php echo lang("user.password");?></div>
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.thumbnail");?></label>
	    <div class="col-sm-10">
	    	
	      	<div class="input-group">
		      <input type="text" class="form-control" data-url-files name="thumbnail" value="<?php echo $data->thumbnail;?>" placeholder="Avatar">
		      <span class="input-group-btn">
		      	<label class="btn btn-default btn-file">
			        Browse <input type="file" name="image" data-input-upload-avatar="fileupload" style="display: none;">
			    </label>
		        
		      </span>
		    </div>
	    </div>
	    
	</div>

	<hr>
	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.fullname");?></label>
	    <div class="col-sm-2">
	    	
	      	<select class="form-control selectpicker" name="gender">
	      		<option value="Mr." <?php echo ($data->gender == "Mr." ? "selected" : "");?>>Mr.</option>
	      		<option value="Mrs." <?php echo ($data->gender == "Mrs." ? "selected" : "");?>>Mrs.</option>
	      		<option value="Ms." <?php echo ($data->gender == "Ms." ? "selected" : "");?>>Ms.</option>
	      		<option value="Sir." <?php echo ($data->gender == "Sir." ? "selected" : "");?>>Sir.</option>
	      		<option value="Madam." <?php echo ($data->gender == "Madam." ? "selected" : "");?>>Madam.</option>
	      	</select>
	      	<div class="help-block"><?php echo lang("user.gender");?></div>
	    </div>
	    <div class="col-sm-3">
	    	
	      	<input type="text" class="form-control" name="first_name" value="<?php echo $data->first_name;?>" placeholder="First Name">
	      	<div class="help-block"><?php echo lang("user.first_name");?></div>
	    </div>
	    <div class="col-sm-2">
	    	
	      	<input type="text" class="form-control" name="mid_name" value="<?php echo $data->mid_name;?>" placeholder="Mid Name">
	      	<div class="help-block"><?php echo lang("user.mid_name");?></div>
	    </div>
	    <div class="col-sm-3">
	    	
	      	<input type="text" class="form-control" name="last_name" value="<?php echo $data->last_name;?>" placeholder="Last Name">
	      	<div class="help-block"><?php echo lang("user.last_name");?></div>
	    </div>
	</div>

	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.phone");?></label>

	    <div class="col-sm-5">
	    	
	      	<input type="text" class="form-control" input-mask="(+84) 9999-999-999" name="phone" value="<?php echo $data->phone;?>" placeholder="Mobile Phone">
	      	<div class="help-block"><?php echo lang("user.phone");?></div>
	    </div>

	    <div class="col-sm-5">
	    	
	      	<input type="text" class="form-control" input-mask="(+84) 9999-999-999" name="homephone" placeholder="Modules Name">
	      	<div class="help-block">Home Phone</div>
	    </div>
	</div>

	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo lang("user.street_address");?></label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="street_address" value="<?php echo $data->street_address;?>" placeholder="Address">
	    </div>
	</div>



	



	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Location</label>
	    <div class="col-sm-2">
	    	
	       <select class="form-control selectpicker" name="country">
	       		<?php country($data->country);?>
	       </select>
	       <div class="help-block"><?php echo lang("user.country");?></div>
	    </div>

	    <div class="col-sm-4">
	    	
	       <input type="text" class="form-control" name="city" value="<?php echo $data->city;?>" placeholder="City">
	       <div class="help-block"><?php echo lang("user.city");?></div>
	    </div>

	    <div class="col-sm-4">
	    	
	       <input type="text" class="form-control" name="state" value="<?php echo $data->state;?>" placeholder="State">
	       <div class="help-block"><?php echo lang("user.state");?></div>
	    </div>

	</div>


	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Zipcode</label>
	    <div class="col-sm-2">
	    	
	       <input type="text" class="form-control" name="zipcode" value="<?php echo $data->zipcode;?>" placeholder="Zipcode">
	       <div class="help-block"><?php echo lang("user.zipcode");?></div>
	    </div>

	    <div class="col-sm-4">
	    	
	       <input type="text" class="form-control" name="website_url" value="<?php echo $data->website_url;?>" placeholder="website_url">
	       <div class="help-block"><?php echo lang("user.website_url");?></div>
	    </div>

	    <div class="col-sm-4">
	    	
	       <input type="text" class="form-control" name="profiles_url" value="<?php echo $data->profiles_url;?>" placeholder="profiles_url">
	       <div class="help-block"><?php echo lang("user.profiles_url");?></div>
	    </div>

	</div>

	<hr>


	
	<div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Social</label>
	    <div class="col-sm-10">


		<ul class="row forms">
			<li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
				<div class="row">
					<div class="col-xs-1">
						<button type="button" class="btn btn-addsocial btn-block btn-primary">+</button>
						
					</div>
					<div class="col-xs-2">
					<?php
							$amz = [
								"android" => "Android",
								"apple" => "Apple",
								"behance" => "Behance",
								"bitcoin" => "Bitcoin",
								"buysellads" => "Buysellads",
								"codepen" => "Codepen",
								"css3" => "Css3",
								"delicious" => "Delicious",
								"deviantart" => "Deviantart",
								"digg" => "Digg",
								"dribbble" => "Dribbble",
								"dropbox" => "Dropbox",
								"drupal" => "Drupal",
								"email-1" => "Email-1",
								"email-2" => "Email-2",
								"facebook" => "Facebook",
								"flickr" => "Flickr",
								"foursquare" => "Foursquare",
								"git" => "Git",
								"github" => "Github",
								"google" => "Google",
								"google-plus" => "Google-plus",
								"html5" => "Html5",
								"instagram" => "Instagram",
								"joomla" => "Joomla",
								"jsfiddle" => "Jsfiddle",
								"lastfm" => "Lastfm",
								"linkedin" => "Linkedin",
								"linux" => "Linux",
								"maxcdn" => "Maxcdn",
								"medium" => "Medium",
								"pagelines" => "Pagelines",
								"paypal" => "Paypal",
								"pinterest" => "Pinterest",
								"reddit" => "Reddit",
								"rss" => "Rss",
								"share" => "Share",
								"skype" => "Skype",
								"slideshare" => "Slideshare",
								"soundcloud" => "Soundcloud",
								"spotify" => "Spotify",
								"stack-exchange" => "Stack-exchange",
								"stack-overflow" => "Stack-overflow",
								"stumbleupon" => "Stumbleupon",
								"trello" => "Trello",
								"tumblr" => "Tumblr",
								"twitter" => "Twitter",
								"vimeo" => "Vimeo",
								"vine" => "Vine",
								"vk" => "Vk",
								"whatsapp" => "Whatsapp",
								"windows" => "Windows",
								"wordpress" => "Wordpress",
								"xing" => "Xing",
								"yahoo" => "Yahoo",
								"yelp" => "Yelp",
								"youtube" => "Youtube",
								"youtube-play" => "Youtube-play"
								];
							
							?>
						<select class="form-control type">
							<?php foreach ($amz as $key => $value) {
									?>
									<option value="<?php echo $key;?>" data-icon="fa fa-<?php echo $key;?>"><?php echo $value;?></option>
									<?php
								}
							?>
							
						</select>
					</div>
					<div class="col-xs-9 urls">
						<input type="text" class="form-control" name="options[social][private]" placeholder="Socical URL">
					</div>
				</div>
			</li>
			
			<?php
			$options = @unserialize($data->options);
				$social = (isset($options["social"]) ? $options["social"] : []);
				foreach ($social as $key => $value) {
					if($key && $key != "private"){
					?>
					<li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
						<div class="row">
							<div class="col-xs-1">
								<button type="button" class="btn btn-removesocial btn-block btn-info">-</button>
							</div>
							<div class="col-xs-2">
								<a class="btn azm-social btn-block azm-r-square azm- azm-<?php echo $key;?>"><i class="fa fa-<?php echo $key;?>"></i> <?php echo $key;?></a>
								
							</div>
							<div class="col-xs-9">
								<input type="text" name="options[social][<?php echo $key;?>]" class="form-control" value="<?php echo $value;?>" placeholder="<?php echo ucfirst($key);?> Socical URL">
							</div>
						</div>
					</li>
					<?php
					}	
				}
			?>
		</ul>
	</div>
	</div>


		<hr>
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> <?php echo lang("global.save");?></button>
	    </div>
	</div>

<?php _panel_close();?>
<?php formclose();?>



<script type="text/html" id="htmlZone">
<li class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
	<div class="row">
		<div class="col-xs-1">
			<button type="button" class="btn btn-removesocial btn-block btn-info">-</button>
		</div>
		<div class="col-xs-2">
			<a class="btn azm-social btn-block azm-r-square azm- azm-{type}"><i class="fa fa-{type}"></i> {type}</a>
		</div>
		<div class="col-xs-9">
			<input type="text" name="options[social][{type}]" class="form-control" value="{urls}" placeholder="{type} Socical URL">
		</div>
	</div>
</li>
</script>

<script type="text/javascript">
	
	jQuery(document).ready(function(){
	$(".btn-addsocial").on("click",function(){
		var htmlClone = $(this).parent().parent().parent();
		var htmlZone = $("#htmlZone").html();

		var type = htmlClone.find("select.type").val();
		var urls = htmlClone.find(".urls input").val();

		htmlZone = htmlZone.replace(/{type}/g,type).replace('{urls}',urls);

		htmlClone.parent().append(htmlZone);
		$(".btn-removesocial").on("click",function(){
			var htmlClone = $(this).parent().parent().parent();
			htmlClone.remove();

		});

	});

	$(".btn-removesocial").on("click",function(){
		var htmlClone = $(this).parent().parent().parent();
		htmlClone.remove();

	});



	$(".btn-addsocial-controller").on("click",function(){
		var htmlClone = $(this).parent().parent().parent();
		var htmlZone = $("#htmlZone").html();

		var type = htmlClone.find("select.type").val();
		var client_secret = htmlClone.find(".client_secret input").val();
		var client_id = htmlClone.find(".client_id input").val();

		htmlZone = htmlZone.replace(/{type}/g,type).replace('{client_secret}',client_secret).replace('{client_id}',client_id);

		htmlClone.parent().append(htmlZone);

	});

	$(".btn-removesocial-controller").on("click",function(){
		var htmlClone = $(this).parent().parent().parent();
		htmlClone.remove();

	});


});
</script>
{footer}
