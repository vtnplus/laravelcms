<div style="background-color: #f2f2f2; margin-left: -17px; margin-right: -17px; padding: 15px;margin-bottom: 15px;">
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
		<textarea class="form-control" name="content" style="height: 250px;"><?php echo @$data->content;?></textarea>
	</li>

</ul>
</div>
<a class="btn btn-primary">+</a>

<?php for ($i=0; $i < 6; $i++) { ?>

<ul class="row" style="margin-bottom: 15px;">
	<li class="col-xs-6">
		Mô tả
		<input type="" class="form-control" name="">
	</li>
	<li class="col-xs-2">
		Phương tiện
		<select type="" class="form-control" name="">
			<option>Ô tô</option>
			<option>Máy bay</option>
			<option>Xe máy</option>
			<option>Du thuyền</option>
			<option>Xe đạp</option>
			<option>Đi bộ</option>
		</select>
	</li>

	<li class="col-xs-2">
		Điềm Khởi hành
		<input type="" class="form-control" name="">
	</li>
	<li class="col-xs-2">
		Điểm đến
		<input type="" class="form-control" name="">
	</li>
	<li class="col-xs-12" style="padding-top: 10px;">
		<textarea class="form-control"></textarea>
	</li>

</ul>
<?php } ?>