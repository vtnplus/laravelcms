<?php
$gallery = @unserialize($data->gallery);
if(!isset($gallery["url"])) $gallery["url"] = [];
if(count($gallery["url"]) > 0){


register("javascript",[
                                    resources_url("fancybox/jquery.fancybox.js"),
                                   
                            ]);
        register("style",[
                            resources_url("fancybox/jquery.fancybox.css"),
                           
                        ]);

?>
<ul class="row" data-gallery="zthumbs">
	<?php
        $align = "left";
		foreach ($gallery["url"] as $key => $value) {
			?>
			<li class="<?php echo ($key == 0 ? "master col-sm-6" : "child col-sm-2");?> text-center" id="singer_<?php echo $key;?>"><a class="fancybox" rel="gallery" href="<?php echo base_url($value);?>" class="thumbnails items" title="<?php echo $gallery["title"][$key];?>">
                    <div class="gallery-<?php echo ($key == 0 ? "style" : "style-2");?>">
                        <div class="image-box">
                            <img src="<?php echo base_url($value);?>" title="<?php echo $gallery["title"][$key];?>" alt="<?php echo $gallery["title"][$key];?>">
                        </div>
                    </div></a></li>
			<?php

		}
	?>
	
</ul>

<script>
    $(document).ready(function() {
        $('.fancybox').fancybox({
            helpers : {
                title: {
                    type: 'inside'
                }
            },
            nextEffect: 'fade',
            prevEffect: 'fade'
        });

        $('.gallery-style-2 .image-box').each(function(){
            $(this).height($(this).width());
            $(this).css({"line-height" : $(this).height()+"px"});
        });
       
    });
</script>


<?php } ?>