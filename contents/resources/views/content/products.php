
<ul class="row row-flex">
	<li class="col-xs-12 col-sm-6">
		<a href="#" class="thumbnail">
			<img src="<?php echo $data->thumbs;?>">
		</a>
	</li>
	<li class="col-xs-12 col-sm-6">
		<h2 class="customs-title" style="margin-top:0;"><?php echo $data->title;?></h2>
		Giá bán : <b><?php echo $data->prices();?></b><br>
		Giao hàng : Tận nơi<br><br><br>

		<h4 class="customs-title" style="margin-top:0;">Mua trực tuyến</h4>
		<ul class="row">

			<li class="col-xs-6">
				Số lượng
				<input type="text" class="form-control" name="">
			</li>
			<li class="col-xs-6">
				Điện thoại
				<input type="text" class="form-control" name="">
			</li>
			<li class="col-xs-12" style="margin-bottom: 10px;">
				Địa chỉ giao hàng
				<input type="text" class="form-control" name="">
			</li>
			<li class="col-xs-6">
				<select class="form-control selectpicker">
					<option>Thanh toán khi nhận hàng</option>
				</select>
			</li>
			<li class="col-xs-6">
				<button class="btn btn-sm btn-primary btn-block">Đặt hàng</button>
			</li>
		</ul>

	</li>
</ul>

[social_sharing url="<?php echo $data->links();?>" title="<?php echo $data->title;?>" image="<?php echo base_url($data->thumbs);?>"]
<?php
$content = explode('<!-- pagebreak -->', $data->content);
if(is_array($content) && count($content) > 1){
	$before = $content[0];
	$after = $content[1];
}else{
	$before = false;
	$after = $data->content;
}

if($before){
?>
<a href="<?php echo base_url("pages/".config("register.pages.urls")).($data->seo_urls ? "/".$data->seo_urls : '?pid='.$data->id);?>" title="<?php echo $data->title;?>">
	<?php echo $before;?>
</a>

<hr>
<ul class="row" style="margin-bottom: 30px;">
	<li class="col-xs-3 color-danger">
		Đánh giá<br>
		<div class="iconbox-link">
		<i class="glyphicon glyphicon-star"></i>
		<i class="glyphicon glyphicon-star"></i>
		<i class="glyphicon glyphicon-star"></i>
		<i class="glyphicon glyphicon-star"></i>
		<i class="glyphicon glyphicon-star"></i>
		</div>
	</li>
	<li class="col-xs-3">
		<div class="iconbox size-xs text-left color-warning hover-danger">
          <a class="iconbox-link" href="#first">
            <div class="iconbox-icon"><i class="glyphicon glyphicon-user"></i></div>
          </a>
          <div class="iconbox-text">Người đăng <br><b><?php echo $data->users()->first_name;?> <?php echo $data->users()->last_name;?></b>
          </div>
        </div>
	</li>
	<li class="col-xs-3">
		<div class="iconbox size-xs text-left color-primary hover-danger">
          <a class="iconbox-link" href="#first">
            <div class="iconbox-icon"><i class="fa fa-comments"></i></div>
          </a>
          <div class="iconbox-text">Bình luận <br><b>2,450</b>
          </div>
        </div>
	</li>
	<li class="col-xs-3">
		<div class="iconbox size-xs text-left color-danger hover-danger">
          <a class="iconbox-link" href="#first">
            <div class="iconbox-icon"><i class="glyphicon glyphicon-calendar"></i></div>
          </a>
          <div class="iconbox-text">Cập nhập <br><b>2,450</b>
          </div>
        </div>
	</li>
</ul>
<hr>
<?php } ?>

<?php echo $after;?>

<h3 class="customs-title">Sản phẩm khác</h3>
<?php echo do_shortcode('[posts type="'.$data->type.'" limit=4 random=1][/posts]');?>
<h4 class="customs-title">Comments</h4>

<?php echo $data->comments();?>