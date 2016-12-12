<ol class="dd-list">
		<?php 
			foreach ($data as $key => $value) {
				
			?>
						<li class="dd-item dd3-item" data-id="<?php echo @$value->id;?>">
						<div class="dd-handle dd3-handle">&nbsp;</div>
							<div class="dd3-content">
								<div style="position: relative;" data-ajax="<?php echo admin_url("settings/menu/manager/".$value->groups."/".$value->id);?>" target-id="<?php echo @$value->id;?>"><?php echo $value->title;?>
								

								<a href="<?php echo admin_url("catalog/content/manager/".$value->type."/".$value->id);?>" target-id="<?php echo @$value->id;?>" title="Builder Submenu">
								<i style="position: absolute; right: 40px; top: 5px; color: green; left: initial; margin-right: 0px; cursor: pointer;" class="glyphicon glyphicon-th-list"></i>
								</a>

								<a href="<?php echo admin_url("catalog/content/manager/".$value->type."/".$value->id);?>" target-id="<?php echo @$value->id;?>">
								<i style="position: absolute; right: 20px; top: 5px; color: rgb(10, 174, 196); left: initial; margin-right: 0px; cursor: pointer;" class="glyphicon glyphicon-pencil"></i>
								</a>
								

								<a href="<?php echo admin_url("catalog/content/delete/".@$value->id);?>">
								<i style="position: absolute; right: 0px; top: 5px; color: rgb(238, 81, 144); left: initial; margin-right: 0px; cursor: pointer;" class="glyphicon glyphicon-remove"></i></a>
								</div>
							</div>

					        <?php
					         	echo with(new Modules\Catalog\Backend\Content)->getItems(@$value->type,@$value->id);
					        ?>
					    </li>
					    
		<?php } ?>
</ol>