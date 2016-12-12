<ul class="row row-flex">
<?php foreach ($data as $key => $value) { ?>
	<li class="col-xs-6 col-sm-3">
		<a href="#">
	      <img src="<?php echo base_url($value->thumbs);?>" alt="<?php echo $value->title;?>" style="max-with:100%">
	    </a>
	   
	</li>
<?php } ?>
</ul>