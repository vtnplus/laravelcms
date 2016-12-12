{header}
<?php 
$file_cache =  str_replace('Views/admin','Backend/clone_cache/cache.php',__DIR__);
if(file_exists($file_cache)){
	include_once $file_cache;
}
formopen();?>
<?php _panel("Options",true,'<input type="checkbox" value="1" name="catalog"> Catalog <input type="checkbox" value="1" name="brands"> Brands <a class="btn btn-info" href="'.admin_url('tools/contents/extract',false).'">Run Scripts</a> <button class="btn btn-info btn-test" type="submit" name="test" value="1">Test</button> <button type="submit" class="btn btn-primary">Render</button>');?>
<ul class="row">
	<li class="col-xs-3">
		<label class="radio-inline"><input type="radio" class="showcode" name="type" value="list" <?php echo (@$type == "list" ? "checked" : "");?>> List</label>
		<label class="radio-inline"><input type="radio" class="showcode" name="type" value="content" <?php echo (@$type == "content" ? "checked" : "");?>> Contents</label>
		<label class="radio-inline"><input type="radio" class="showcode" name="type" value="catalog" <?php echo (@$type == "catalog" ? "checked" : "");?>> Catalog</label>
		<label class="radio-inline"><input type="radio" class="showcode" name="type" value="brands" <?php echo (@$type == "brands" ? "checked" : "");?>> Brands</label>
	</li>
	<li class="col-xs-2">
		<input type="text" class="form-control" name="projectname" value="<?php echo @$projectname;?>">
	</li>
	
	<li class="col-xs-2">
		<input type="text" class="form-control" name="posttype" value="<?php echo @$posttype;?>">
	</li>

	<li class="col-xs-5">
		<input type="text" class="form-control" name="urls" value="<?php echo @$urls;?>">
	</li>
	<li class="col-xs-12 hide" id="showcode">
	Extract Code
	<textarea style="height: 500px;" class="form-control" name="code"><?php echo @$set_html_code;?></textarea></li>
</ul>
<?php _panel_close();?>


<?php _panel("Render Items Info",true,'');?>
<ul class="row">
	<li class="col-xs-3">
		Start
		<input type="text" class="form-control" name="items[start_class]" value="<?php echo @$items["start_class"];?>">
	</li>
	<li class="col-xs-3">
		Items Class
		<input type="text" class="form-control" name="items[start_items]" value="<?php echo @$items["start_items"];?>">
	</li>

	<li class="col-xs-3">
		Title Class
		<input type="text" class="form-control" name="items[title_class]" value="<?php echo @$items["title_class"];?>">
	</li>

	<li class="col-xs-3">
		Url Info Class
		<input type="text" class="form-control" name="items[urls_info]" value="<?php echo @$items["urls_info"];?>">
	</li>


	<li class="col-xs-3">
		Fix Info Url
		<input type="text" class="form-control" name="items[fixurls_info]" value="<?php echo @$items["fixurls_info"];?>">
	</li>
</ul>
<?php _panel_close();?>
<?php _panel("Render Contents Info",true,'');?>
<ul class="row">	
	<li class="col-xs-3">
		Content Start Class
		<input type="text" class="form-control" name="items[content_start]" value="<?php echo @$items["content_start"];?>">
	</li>

	<li class="col-xs-3">
		Thumnail Class
		<input type="text" class="form-control" name="items[thumnail_class]" value="<?php echo @$items["thumnail_class"];?>">
	</li>

	<li class="col-xs-3">
		Gallery Class
		<input type="text" class="form-control" name="items[gallery_class]" value="<?php echo @$items["gallery_class"];?>">
	</li>

	<li class="col-xs-3">
		Gallery Fixurl
		<input type="text" class="form-control" name="items[gallery_fixurl]" value="<?php echo @$items["gallery_fixurl"];?>">
	</li>


	<li class="col-xs-3">
		Description Class
		<input type="text" class="form-control" name="items[description_class]" value="<?php echo @$items["description_class"];?>">
	</li>

	<li class="col-xs-3">
		Contents Class
		<input type="text" class="form-control" name="items[content_classs]" value="<?php echo @$items["content_classs"];?>">
	</li>
	<li class="col-xs-5">
		Contents Find
		<input type="text" class="form-control" name="items[content_find]" value="<?php echo @$items["content_find"];?>">
	</li>
	<li class="col-xs-4">
		Contents Replace
		<input type="text" class="form-control" name="items[content_replace]" value="<?php echo @$items["content_replace"];?>">
	</li>

</ul>

<?php _panel_close();?>
<?php _panel("Customs Field",true,'<a class="btn btn-primary btn-addcustoms">+</a>');?>
<ul class="row" id="LayerCustoms">
	<?php 
	$customs = (!isset($customs) || !is_array($customs) ? [] : $customs); 
	foreach ($customs as $key => $value) { ?>
	
	<li class="col-xs-3">
		<ul class="row">
			<li class="col-xs-6">
				Field Data
				
				<div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" onClick="$(this).parent().parent().parent().parent().remove();" type="button">-</button>
			      </span>
			      <input type="text" class="form-control" name="customs[name][]" value="<?php echo @$key;?>">
			    </div>
			</li>
			<li class="col-xs-6">
				Field Class
				<input type="text" class="form-control" name="customs[class][]" value="<?php echo @$value;?>">
			</li>
		</ul>
	</li>
	<?php } ?>
</ul>
<?php _panel_close();?>
<?php _panel("Pages",true,'');?>
<ul class="row">
	

	<li class="col-xs-3">
		Pages Urls
		<input type="text" class="form-control" name="pages[pages_urls]" value="<?php echo @$pages["pages_urls"];?>">
	</li>

	<li class="col-xs-3">
		Pages Start
		<input type="number" class="form-control" name="pages[pages_start]" value="<?php echo @$pages["pages_start"];?>">
	</li>

	<li class="col-xs-3">
		Pages End
		<input type="number" class="form-control" name="pages[pages_end]" value="<?php echo @$pages["pages_end"];?>">
	</li>

</ul>
<?php _panel_close();?>

<?php formclose();?>
<?php _panel("Test View");?>
<?php


$dom = with(new Remios\Utils\DOMHtml);
$file_cache =  str_replace('Views/admin','Backend/clone_cache/cache-list.php',__DIR__);
$itemList = [];
if(file_exists($file_cache)){
	$itemList = require_once $file_cache;
}
if(!@$urls && @$type == "list"){
	print_r($itemList);
}else{
	$contentUrl = $itemList[0];
	$contentFeed = "";

	$zomeSQL = file_get_contents(str_replace('Views/admin','Backend/clone_cache/cache-sql.txt',__DIR__));
	
	$data = $dom->file_get_html($contentUrl["urls"])->find(data(@$items["content_start"],"body"),0);
	
	if(@$items["content_classs"]){
		$contentFeed = $data->find(@$items["content_classs"],0)->innertext;
	}
	
	$gallery = [];
	if(@$items["gallery_class"]){
		@list($gallryID, $attr) = explode(';', @$items["gallery_class"]);
		$galleryFeed = $data->find(@$gallryID);
		//dd($galleryFeed);
		foreach ($galleryFeed as $key => $value) {
			if(@trim($attr)){
				$gallery[] = (@$items["gallery_fixurl"] ? @$items["gallery_fixurl"]."/" : "").$value->getAttribute($attr);
			}else{
				$gallery[] = (@$items["gallery_fixurl"] ? @$items["gallery_fixurl"]."/" : "").$value->src;
			}
			
		}
	}

	$gallery = serialize($gallery);
	
	$thumbs = '';
	$build = str_replace(
			[	'{title}',
				'{content}',
				'{description}',
				'{gallery}',
				'{thumbs}'
			],
			[	$contentUrl["title"],
				removeLinks($contentFeed),
				'',
				$gallery,
				$thumbs
			],
			$zomeSQL);
	$customs_builder = [];
	$customs_builder[] = $contentUrl["urls"];
	if(is_array($customs)){
			
			foreach ($customs as $key => $value) {
				@list($a_find, $number,$format,$a_array) = explode(';', $value);
				$number = ($number ? $number : 0);
				switch ($format) {
					case 'html':
						$format = 'innertext';
						break;
					case 'src':
						$format = 'src';
						break;
					case 'attr':
						$format = 'attr';
					break;
					case 'href':
						$format = 'href';
					break;
					case 'prices':
						$format = 'prices';
					break;
					default:
						$format = 'plaintext';
						break;
				}
				

				$a_array = @explode('=', $a_array);
				if($format == "prices"){
					$values = intval($value ? str_replace(['. ','.','đ'],'',@$data->find($a_find,$number)->plaintext) : "");
				}else if($format == "attr"){
					$values = ($value ? @$data->find($a_find,$number)->{$format} : "");
				}else{
					$values = ($value ? @$data->find($a_find,$number)->{$format} : "");
				}
				
				if(@$a_array[0] == "last"){
					$values = explode($a_array[1], $values);
					$values = trim($values[count($values) - 1]);
				}

				$customs_builder[] = '"'.$key.'" => \''.$values.'\',';
			}
			
		}
	print_r($gallery);
}


function removeLinks($str){
	$regex = '/<a (.*)<\/a>/isU';
	preg_match_all($regex,$str,$result);
	foreach($result[0] as $rs)
	{
	    $regex = '/<a (.*)>(.*)<\/a>/isU';
	    $text = preg_replace($regex,'$2',$rs);
	    $str = str_replace($rs,$text,$str);
	}
	return $str;
}
?>
<?php _panel_close();?>

<script type="text/html" id="customs_field">
	<li class="col-xs-3">
		<ul class="row">
			<li class="col-xs-6">
				Field Data
				<input type="text" class="form-control" name="customs[name][]" value="">
			</li>
			<li class="col-xs-6">
				Field Class
				<input type="text" class="form-control" name="customs[class][]" value="">
			</li>
		</ul>
	</li>
</script>
<script type="text/javascript">
	$(function(){
		$('.showcode').click(function() {
			
		        if ($(this).val() == "catalog" || $(this).val() == "brands") {
		        	$("#showcode").removeClass("hide");
		   		}else{
		   			$("#showcode").addClass("hide");
		   		}
		});
		$(".btn-addcustoms").click(function(){
			$("#LayerCustoms").append($("#customs_field").html());
		});
		$(".btn-test").click(function(){
			window.location.href="?url="+$('input[name=urls]').val();
		});
	});
</script>
{footer}