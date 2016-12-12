<?php
$gallery = @unserialize($data->gallery);
$sizeGalleryCloud = (@$setGallerySize ? $setGallerySize : 'col-xs-3 col-sm-2');
if(!isset($gallery["url"])) $gallery["url"] = [];
?>
<ul class="row row-flex" data-gallery="zthumbs">
	<?php
		foreach ($gallery["url"] as $key => $value) {
			?>
			<li class="<?php echo $sizeGalleryCloud;?> text-center" id="singer_<?php echo $key;?>"><a  style="position: absolute; right:40px; font-size: 16px; z-index: 999; top:5px;"><i class="glyphicon glyphicon-move"></i></a><a onClick="$(this).parent().remove();" style="position: absolute; right:20px; font-size: 16px; z-index: 999; top:5px;"><i class="glyphicon glyphicon-remove-sign"></i></a><div data-media href="<?php admin_url("media/images?ajax=true&amp;target=gallery&data=zthumbs&size=".$sizeGalleryCloud."&singer=singer_".$key);?>" class="thumbnails items"><img src="<?php echo base_url($value);?>"></div><input class="url" name="gallery[url][]" value="<?php echo $value;?>" type="hidden"><input name="gallery[title][]" value="<?php echo $gallery["title"][$key];?>" type="hidden" class="title"></li>
			<?php
		}
	?>
	<li class="<?php echo $sizeGalleryCloud;?> text-center"><a data-media href="<?php admin_url("media/images?ajax=true&amp;target=gallery&data=zthumbs&size=".$sizeGalleryCloud);?>" class="thumbnail" style="border-radius:0;"><img src="<?php echo resources_url_views("images/no-image.png");?>"></a></li>
</ul>

<script type="text/javascript">
	$(function(){
		$("[data-gallery=zthumbs] div.thumbnails.items").css({"line-height" : $("[data-gallery=zthumbs] li:last-child a").height()+"px", "height" : $("[data-gallery=zthumbs] li:last-child a").height()+"px"});
		$( "[data-gallery=zthumbs]" ).sortable({
			
			handle : ".glyphicon-move"
		});
		
	});
</script>
