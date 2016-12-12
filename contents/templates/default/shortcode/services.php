<ul class="row row-flex">
<?php foreach ($data as $key => $value) { ?>
	<li class="col-xs-12 col-sm-3">
		<div class="image-box">
		<a href="#" class="thumbnail">
	      <img src="<?php echo base_url($value->thumbs);?>" alt="...">
	    </a>
	    </div>
	    <h4><?php echo $value->title;?></h4>
	    <p><?php echo $value->description;?></p>
	</li>
<?php } ?>
</ul>