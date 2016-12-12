<h2 class="customs-title" style="margin-top:0;"><?php echo $data->title;?></h2>
<?php
$content = explode('<!-- pagebreak -->', str_replace('<div class="row"><div class="col-xs-12 col-sm-12"><hr data-pagebreak="pagebreak"></div></div>','<!-- pagebreak -->',$data->content));
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

<h4 class="customs-title">Comments</h4>

<?php echo $data->comments();?>