{header}
<?php
$tags = explode(',', $data->tags);
?>
<div class="container">
	<?php
		foreach ($tags as $key => $value) {
			?>
			<a href="" class="btn btn-default"><?php echo trim($value);?></a>
			<?php
		}
	?>
	<?php do_shortcode('[posts type="'.$type.'"][/posts]');?>
</div>
{footer}