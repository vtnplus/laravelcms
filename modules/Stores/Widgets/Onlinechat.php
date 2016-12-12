<?php
namespace Modules\Stores\Widgets;
class Onlinechat{


	public function register(){
		return [
				"name" => "Online Chát",
				"icons"	=>	"",
				"auth"	=> "",
				"source"	=> ""
			];
	}


	public function main($data = []){
		$ex = explode(',',@$data["html"]);
		$tag = [];
		$keyword = explode(',',config("site.keyword"));
		$ex = array_merge($ex, $keyword);


		$keyword = explode(',',config("register.seo.title.0"));
		$ex = array_merge($ex, $keyword);

		foreach ($ex as $key => $value) {
			if($value){
				$tag[] = '<a class="tags-cloud" href="?tags='.trim($value).'">'.trim($value).'</a>';
			}
		}
		
		return implode($tag, " ");
	}


	public function admin($data = []){

		?>
<a class="btn btn-info btn-sm" onClick="addFormsChatOnline()">+ Thêm mới</a>
<ul class="forms">
	<li id="zoomeChatOnlineMake">
		<ul class="row" id="zoomeChatOnline">
			
			<li class="col-xs-6">
				Tên nhân viên
				<input type="" class="form-control" value="<?php echo @$name[0];?>" name="name[]">
			</li>
			<li class="col-xs-6">
				Điện thoại
				<input type="" class="form-control" value="<?php echo @$phone[0];?>" name="phone[]">
			</li>
			<li class="col-xs-6">
				Văn phòng
				<input type="" class="form-control" value="<?php echo @$office[0];?>" name="office[]">
			</li>
			<li class="col-xs-6">
				Avatar
				<input type="" class="form-control" value="<?php echo @$office[0];?>" name="office[]">
			</li>
			
			<li class="col-xs-6">
				Zalo
				<input type="" class="form-control" value="<?php echo @$zalo[0];?>" name="zalo[]">
			</li>
			<li class="col-xs-6">
				Skype
				<input type="" class="form-control" value="<?php echo @$skype[0];?>" name="skype[]">
			</li>
			<li class="col-xs-6">
				Viber
				<input type="" class="form-control" value="<?php echo @$viber[0];?>" name="viber[]">
			</li>
			<li class="col-xs-6">
				Whataps
				<input type="" class="form-control" value="<?php echo @$whataps[0];?>" name="whataps[]">
			</li>

			<li class="col-xs-12">
				Facebook
				<input type="" class="form-control" value="<?php echo @$facebook[0];?>" name="facebook[]">
			</li>
			
		</ul>

		<?php 
		if(is_array(@$name)){ 
			foreach ($name as $key => $value) {
				if($key > 0){
				?>

					<ul class="row">
						<li class="col-xs-12"><hr><a class="btn btn-primary btn-sm" onClick="RemoveFormsChatOnline(this)">Remove</a></li>
						<li class="col-xs-3">
							Name
							<input type="" class="form-control" value="<?php echo @$name[$key];?>" name="name[]">
						</li>
						<li class="col-xs-3">
							Phone
							<input type="" class="form-control" value="<?php echo @$phone[$key];?>" name="phone[]">
						</li>
						<li class="col-xs-3">
							Office
							<input type="" class="form-control" value="<?php echo @$office[$key];?>" name="office[]">
						</li>
						<li class="col-xs-3">
							Avatar
							
						</li>
						
						<li class="col-xs-3">
							Yahoo
							<input type="" class="form-control" value="<?php echo @$yahoo[$key];?>" name="yahoo[]">
						</li>
						<li class="col-xs-3">
							Skype
							<input type="" class="form-control" value="<?php echo @$skype[$key];?>" name="skype[]">
						</li>
						<li class="col-xs-3">
							Viber
							<input type="" class="form-control" value="<?php echo @$viber[$key];?>" name="viber[]">
						</li>
						<li class="col-xs-3">
							Whataps
							<input type="" class="form-control" value="<?php echo @$whataps[$key];?>" name="whataps[]">
						</li>


						<li class="col-xs-12">
							Options
							<textarea type="" class="form-control" name="options[]"><?php echo @$options[$key];?></textarea>
						</li>
					</ul>
				<?php
			}
			}
		} ?>
	</li>
</ul> 

<script type="text/javascript">
	function addFormsChatOnline(){
		var html = $("#zoomeChatOnline").html();
		$("#zoomeChatOnlineMake").append('<ul class="row"><li class="col-xs-12"><hr><a class="btn btn-danger btn-sm" onClick="RemoveFormsChatOnline(this)">Remove</a></li>'+html+'</ul>');
	}

	function RemoveFormsChatOnline(obj){
		$(obj).parent().parent().remove();
	}
</script>
		<?php
	}
}