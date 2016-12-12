<div>
<ul class="row" style="">
	<li class="col-xs-3">
		Điểm bắt đầu
		<input type="" class="form-control" name="des_start" value="<?php echo @$data->des_start;?>">
	</li>

	<li class="col-xs-3">
		Điểm kết thúc
		<input type="" class="form-control" name="des_end" value="<?php echo @$data->des_end;?>">
	</li>

	<li class="col-xs-6">
		Các điểm đi qua
		<input type="" class="form-control" name="destinations" value="<?php echo @$data->destinations;?>">
	</li>

	<li class="col-xs-3">
		Giá người lớn
		<input type="" class="form-control" name="prices" value="<?php echo @$data->prices;?>">
	</li>

	<li class="col-xs-3">
		Giá trẻ em
		<input type="" class="form-control" name="prices_child" data-prices value="<?php echo @$data->prices_child;?>">
	</li>

	<li class="col-xs-3">
		Phương tiện chính
		<select type="" class="form-control" name="trans">
			<option value="oto">Ô tô</option>
			<option value="ari">Máy bay</option>
			<option value="moto">Xe máy</option>
			<option value="duthuyen">Du thuyền</option>
			<option value="xedap">Xe đạp</option>
			<option value="dibo">Đi bộ</option>
		</select>
	</li>


	<li class="col-xs-3">
		Khách sạn
		<input class="form-control" name="hotel" value="<?php echo @$data->hotel;?>">
	</li>

	<li class="col-xs-3">
		Thời gian đi tour
		<div class="input-group">
			<input type="text" class="form-control" name="duration" value="<?php echo @$data->duration;?>">
		      <span class="input-group-addon">
		        + <input name="duration_plus" <?php echo (@$data->duration_plus == 1 ? "checked" : "");?> type="checkbox" aria-label="...">
		      </span>
	      
	    </div><!-- /input-group -->
	</li>

	<li class="col-xs-3">
		Thời gian khởi hành
		
		<div class="input-group">
			<input type="text" class="form-control" name="timestart" value="<?php echo @$data->timestart;?>">
		      <span class="input-group-addon">
		        Away <input name="duration_plus" <?php echo (@$data->duration_plus == 1 ? "checked" : "");?> type="checkbox" aria-label="...">
		      </span>
	      
	    </div><!-- /input-group -->
	</li>

	<li class="col-xs-12" style="padding-top: 10px;">

   
			<div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#Itinerary" aria-controls="Itinerary" role="tab" data-toggle="tab">Itinerary</a></li>
		    <li role="presentation"><a href="#Policies" aria-controls="Policies" role="tab" data-toggle="tab">Policies</a></li>
		    
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content" style="padding-top: 15px;">
		    <div role="tabpanel" class="tab-pane active" id="Itinerary">
		    	<textarea style="height:600px;" data-editer="tinymce<?php echo config("site.page_editter");?>" type="text" class="form-control" id="inputContent" name="content" placeholder="<?php echo lang("posts.content.content_placeholder");?>"><?php echo data($data->content,null);?></textarea>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="Policies"><textarea style="height:600px;" data-editer="tinymce<?php echo config("site.page_policies");?>" type="text" class="form-control" id="inputpolicies" name="policies" placeholder="<?php echo lang("posts.content.content_policies");?>"><?php echo data($data->policies,null);?></textarea></div>
		   
		  </div>

		</div>

		
	</li>


	


</ul>
</div>
<hr>
<h3>Gallery</h3>
<?php 
if(view()->exists("admin.gallery-panel")){
    echo view("admin.gallery-panel",["data" => $data])->render();
}
?>