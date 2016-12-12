{header_meta}
<?php formopen();?>

<div style="max-width: 480px;margin: auto;" data-center-screen>
	<div style="padding: 30px;border: 1px solid rgba(0,0,0,0.2);
border-radius: 2px;
box-shadow: 0 2px 6px rgba(0,0,0,0.1); background-color: #FFF;">
		<div class="form-group">
			<h3>Logout <a class="btn btn-primary pull-right">Trở về trang chủ</a></h3>
			<hr>
			Bạn đã thoát khỏi hệ thống<br>
			
		</div>
		 
		  <div class="clearfix"></div>
		  <div class="form-group" style="background-color: #F8F8F8;border-top:1px solid #ddd; margin: -30px; margin-top: 30px; padding: 30px; text-align: center;">
		  		
		  		<a class="btn btn-default btn-circle padding-lr-30">Facebook</a>
		  		<a class="btn btn-default btn-circle padding-lr-30">Google+</a>
		  </div>

	</div>
	<br>
	<p>
	Bạn chưa có tài khoản ? <a href="<?php echo base_url("account/register");?>"><i class="glyphicon glyphicon-plus-sign"></i> Đăng ký</a>
	<a class="pull-right" href="<?php echo base_url("account/forget/password");?>"><i class="glyphicon glyphicon-question-sign"></i> Quên mật khẩu</a>
	</p>
</div>
<?php formclose();?>

{footer_meta}