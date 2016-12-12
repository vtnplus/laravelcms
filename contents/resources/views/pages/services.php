{header}
<?php
$tags = explode(',', $data->tags);
?>
<div class="container">
	<?php echo $data->content;?>
	<h2 class="customs-title">My Services</h2>
	<?php echo do_shortcode('[posts type="'.$type.'"][/posts]');?>
	<?php
		$options = @unserialize($data->options);
		if($options["apps"]["meetourteam"]  == "yes"){
			?>
				<h2 class="customs-title">Our Team</h2>
			<?php echo do_shortcode('[posts type="ourteam"][/posts]');?>
			<?php
		}

		if($options["apps"]["aboutus"] == "yes"){
			?>
				<h2 class="customs-title">About Us</h2>
			<?php echo do_shortcode('[posts type="abouus"][/posts]');?>
			<?php
		}


		if($options["apps"]["contact"]  == "yes"){
			?>
				<h2 class="customs-title">Contact</h2>
			<?php echo do_shortcode('[contact type="'.$type.'"][/contact]');?>
			<?php
		}


	?>
</div>
{footer}