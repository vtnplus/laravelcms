{header_meta}

<div style="max-width: 480px;margin: auto;" data-center-screen>
	<div style="padding: 30px;border: 1px solid rgba(0,0,0,0.2);
border-radius: 2px;
box-shadow: 0 2px 6px rgba(0,0,0,0.1);background-color: #FFF:">
	<h3>Validate Code Register</h3>
	<hr>
	<p>
		
		<div class="input-group">
	      <input type="text" class="form-control" name="validate_code" placeholder="Enter Code...">
	      <span class="input-group-btn">
	        <button class="btn btn-primary" type="button">Validate!</button>
	      </span>
	    </div>
	</p>
	<p>
	<hr>
	 Hotline : <a href="tel:<?php echo config("site.hotline");?>"><?php echo config("site.hotline");?></a><br>
	 Email : <a href="mailto:<?php echo config("site.email");?>?subject=Register+Account"><?php echo config("site.email");?></a><br>
	 Địa chỉ : <?php echo config("site.address");?>
	 </p>
</div>
</div>
{footer_meta}