{header_meta}
<?php formopen();?>

<div style="max-width: 480px;margin: auto;" data-center-screen>
	<div style="padding: 30px;border: 1px solid rgba(0,0,0,0.2);
border-radius: 2px;
box-shadow: 0 2px 6px rgba(0,0,0,0.1);background-color: #FFF;">
		<div class="form-group">
			<h3>Quên mật khẩu</h3>
			<hr>
		</div>
		<div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Nhập Email của bạn">
		  </div>
		  

		  <button type="submit" class="btn btn-info pull-right btn-circle padding-lr-30">Gởi lại mật khẩu</button>

		  <div class="clearfix"></div>
		  <div class="form-group" style="background-color: #F8F8F8;border-top:1px solid #ddd; margin: -30px; margin-top: 30px; padding: 30px; text-align: center;">
		  		
		  		<p class="helper">Hoặc đăng nhập với</p>
		  		<a href="#" class="btn azm-social azm-btn azm-facebook"><i class="fa fa-facebook"></i> Facebook</a>
		  		<a href="#" class="btn azm-social azm-btn azm-google-plus"><i class="fa fa-google-plus"></i> Goole Plus</a>
		  </div>

	</div>
	<br>
	<p>
	Bạn chưa có tài khoản ? <a href="<?php echo base_url("account/register");?>"><i class="glyphicon glyphicon-plus-sign"></i> Đăng ký</a>
	<a class="pull-right" href="<?php echo base_url("account/login");?>"><i class="glyphicon glyphicon-question-sign"></i> Đăng nhập</a>
	</p>
</div>
<?php formclose();?>

{footer_meta}