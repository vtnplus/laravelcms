{header}
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<?php widgets("left")->make()->send();?>
		</div>
		<div class="col-xs-12 col-sm-9">
			<div class="home-slider">
			     [slider id="shops"][/slider]
			</div>
			<h2>Đang khuyến mãi</h2>
			 [posts type="products" limit=8][/posts]
			<h2>Đang sản có</h2>
			[posts type="products" tags="events"][/posts]
		</div>
		
	</div>
</div>
{footer}