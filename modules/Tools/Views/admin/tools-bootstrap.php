{header}
<?php formopen();?>
<?php _panel("Sample",true,'<button class="btn btn-primary" type="submit">Render</button>');?>
<?php
$brand_color = [
	["#d87c7c","#919e8b","#d7ab82","#6e7074","#61a0a8","#efa18d","#787464","#cc7e63","#724e58","#4b565b"],
	["#516b91","#93b7e3","#516b91","#59c4e6","#edafda","#93b7e3","#a5e7f0","#cbb0e3","#724e58","#4b565b"],
	["#666666","#999999","#4ea397","#22c3aa","#7bd9a5","#d0648a","#f58db2","#f2b3c9","#724e58","#4b565b"],
	["#dddddd","#fc97af","#87f7cf","#f7f494","#72ccff","#f7c5a0","#d4a4eb","#d2f5a6","#76f2f2","#4b565b"],
	["#008acd","#aaaaaa","#2ec7c9","#b6a2de","#5ab1ef","#ffb980","#d87a80","#8d98b3","#e5cf0d","#97b552"],
	["#333333","#aaaaaa","#c12e34","#e6b600","#0098d9","#2b821d","#005eaa","#339ca8","#cda819","#32a487"],
	["#ffaf51","#eeeeee","#ff715e","#ffaf51","#ffee51","#8c6ac4","#715c87","#333333","#cda819","#32a487"],
	["#eeeeee","#aaaaaa","#dd6b66","#759aa0","#e69d87","#8dc1a9","#ea7e53","#eedd78","#73a373","#73b9bc"],
	["#893448","#d95850","#893448","#d95850","#eb8146","#ffb248","#f2d643","#ebdba4","#73a373","#73b9bc"],
	["#666666","#999999","#3fb1e3","#6be6c1","#626c91","#a0a7e6","#c4ebad","#96dee8","#73a373","#73b9bc"],
	["#27727b","#aaaaaa","#c1232b","#27727b","#fcce10","#e87c25","#b5c334","#fe8463","#9bca63","#fad860"],
	["#333333","#aaaaaa","#e01f54","#001852","#f5e8c8","#b8d2c7","#c6b38e","#a4d8c2","#f3d999","#d3758f"]
];
foreach ($brand_color as $key => $value) {
	echo '<div class="col-xs-12 col-sm-3"><div data-color="'.implode($value,"|").'" style="padding:5px; border:1px solid #ddd;float:left; margin-bottom:10px;">';
	foreach ($value as $keyColor => $valueColor) {
		echo '<span style="float:left; width:20px; height:20px; margin-right:5px; background-color:'.$valueColor.'"></span>';
	}
	echo '</div></div>';
}
?>
<hr>
<div class="row form-horizontal">
	<div class="col-xs-12 col-sm-2">
		<div class="form-group">
		    <label for="inputBody" class="col-sm-2 control-label">Text</label>
		    <div class="col-sm-10">
		    	<div class="input-group">
		      		<input type="text" class="form-control colorpicker-component colorpickers" id="inputinputBody" placeholder="Email">
		      		<span class="input-group-addon">
			        	<input type="checkbox" aria-label="...">
			      	</span>
			    </div>
		    </div>
		  </div>
	</div>
	
	<?php 
	$tags = ['a','code','h1','h2','h3','h4','h5','h6','h7','p','div','b'];
	foreach ($tags as $key => $value) {
		?>
		<div class="col-xs-12 col-sm-2">
			<div class="form-group">
		    <label for="input<?php echo $value;?>" class="col-sm-2 control-label"><?php echo $value;?></label>
		    <div class="col-xs-10">
		    	<div class="input-group">
		      	<input type="text" name="tags[<?php echo $value;?>]" class="form-control colorpicker-component colorpickers setcolor_<?php echo ($value == "a" ? 1 : 0);?> " id="input<?php echo $value;?>" placeholder="Color" value="<?php echo @$data[$value];?>">
		      	
			      <span class="input-group-addon">
			        <input type="checkbox" aria-label="...">
			      </span>
			    </div>
		    </div>
		   
		  </div>
			
		</div>
		<?php
	}
	?>
</div>
<?php _panel_close();?>
<div class="row">
	<div class="col-xs-12 col-sm-4">
		<?php _panel("Topbar");?>
			
			<div class="input-group colorpicker-component colorpickers"> <input type="text" value="#00AABB" class="form-control" /> <span class="input-group-addon"><i></i></span> </div>
			
			
			<label class="checkbox-inline"><input type="checkbox" aria-label="...">Gradien</label> 
		<?php _panel_close();?>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?php _panel("Navbar");?>
			<div class="input-group colorpicker-component colorpickers"> <input name="class[navbar-nav]" type="text" value="<?php echo @$data['navbar-nav'];?>" class="form-control setcolor_1" /> <span class="input-group-addon"><i></i></span> </div>
			<label class="checkbox-inline"><input type="checkbox" aria-label="...">Gradien</label> 
		<?php _panel_close();?>
	</div>


	<div class="col-xs-12 col-sm-4">
		<?php _panel("Header");?>
			<div class="input-group colorpicker-component colorpickers"> <input type="text" value="#00AABB" class="form-control" /> <span class="input-group-addon"><i></i></span> </div>
			<label class="checkbox-inline"><input type="checkbox" aria-label="...">Gradien</label> 
		<?php _panel_close();?>
	</div>



	<div class="col-xs-12 col-sm-4">
		<?php _panel("BC");?>
			<div class="input-group colorpicker-component colorpickers"> <input type="text" value="#00AABB" class="form-control" /> <span class="input-group-addon"><i></i></span> </div>
			<label class="checkbox-inline"><input type="checkbox" aria-label="...">Gradien</label> 
		<?php _panel_close();?>
	</div>


	<div class="col-xs-12 col-sm-4">
		<?php _panel("Button");?>
		<ul class="rowbutton">
		<?php 
		$variableButton = ["default","primary","success","info","warning","danger"];
		foreach ($variableButton as $key => $value) { ?>
			
		<li style="margin-bottom: 15px;">
			<ul class="row">
				<li class="col-xs-4">
					<button class="btn btn-<?php echo $value;?> btn-block preview_<?php echo ($key + 2);?>" style="border:0px;background-color: <?php echo @$data['btn-'.$value];?>"><?php echo $value;?></button>
				</li>
				<li class="col-xs-4">
					<input type="text" name="class[btn-<?php echo $value;?>]" class="form-control setcolor_<?php echo ($key + 2);?> changebutton colorpickers" value="<?php echo @$data['btn-'.$value];?>" />
				</li>
				<li class="col-xs-4"><label class="checkbox-inline"><input name="gradien[btn-<?php echo $value;?>]" value="1" <?php echo(@$data["gradien"]['btn-'.$value] == 1 ? "checked" : "");?> type="checkbox" aria-label="...">Gradien</label></li>
			</ul>
		</li>

		<?php } ?>



		</ul>
		<?php _panel_close();?>
	</div>


	<div class="col-xs-12 col-sm-4">
		<?php _panel("Alert");?>
		<ul class="rowbutton">
		<?php 
		$variableButton = ["success","info","warning","danger"];
		foreach ($variableButton as $key => $value) { ?>
			
		<li style="margin-bottom: 15px;">
			<ul class="row">
				<li class="col-xs-4">
					<div class="alert alert-<?php echo $value;?> btn-block preview_<?php echo ($key + 4);?>" style="background-color: <?php echo @$data['alert-'.$value];?>; border:0; padding: 6px 12px;"><?php echo $value;?></div>
				</li>
				<li class="col-xs-4">
					<input type="text" class="form-control setcolor_<?php echo ($key + 4);?> colorpickers"  name="class[alert-<?php echo $value;?>]"  value="<?php echo @$data['alert-'.$value];?>" />
				</li>
				<li class="col-xs-4"><label class="checkbox-inline"><input type="checkbox" name="gradien[alert-<?php echo $value;?>]" value="1" <?php echo(@$data["gradien"]['alert-'.$value] == 1 ? "checked" : "");?>>Gradien</label></li>
			</ul>
		</li>

		<?php } ?>



		</ul>
		<?php _panel_close();?>
	</div>


	<div class="col-xs-12">
		<?php _panel("Footer");?>
		<div class="preview_9" style="padding: 30px; margin-left: -17px;margin-right: -17px; margin-bottom: -14px;">
		<ul class="row">
			<li class="col-xs-3">
				Background
				<div class="input-group colorpicker-component colorpickers"> 
					<input type="text" name="brand[footer][background-color]" value="#00AABB" class="form-control setcolor_10" /> <span class="input-group-addon"><i></i></span> 
				</div>
				<label class="checkbox-inline"><input type="checkbox" aria-label="...">Gradien</label> 
				
			</li>

			<li class="col-xs-3">
				Text
				<div class="input-group colorpicker-component colorpickers"> 
					<input type="text" name="brand[footer][color]" value="#00AABB" class="form-control setcolor_1" /> <span class="input-group-addon"><i></i></span> 
				</div>
				
			</li>

			<li class="col-xs-3">
				Links
				<div class="input-group colorpicker-component colorpickers"> 
					<input type="text" name="brand[footer][a]" value="#00AABB" class="form-control setcolor_3" /> <span class="input-group-addon"><i></i></span> 
				</div>
				
			</li>

			<li class="col-xs-3">
				Widgets title
				<div class="input-group colorpicker-component colorpickers"> 
					<input type="text" name="brand[footer][.panel-title]" value="#00AABB" class="form-control setcolor_7" /> <span class="input-group-addon"><i></i></span> 
				</div>
				
			</li>

		</ul>
		</div>
		<?php _panel_close();?>
	</div>


	<div class="col-xs-12">
		<?php _panel("Order");?>
		<?php _panel_close();?>
	</div>

</div>
<script type="text/javascript">
$(function() { 
	$('[data-color]').on("click", function(){
		var color = $(this).attr("data-color").split("|");
		$.each(color, function(index, e){
			$(".setcolor_"+index).val(e);
			$(".preview_"+index).css("background-color",e);
			
		});
	});
	

	$('.colorpickers').each(function(){
		var color = $(this).val();
		if(color){
			$(this).colorpicker({color : color, format : "hex"}); 
		}else{
			$(this).colorpicker({format : "hex"}); 
		}
		
	});
	$(".changebutton").on('changeColor', function(e) { 
		$(this).parent().parent().find("button").css({"background-color": e.color.toHex()});
	 });
	

}); 
</script>
<?php formclose();?>
{footer}