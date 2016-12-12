<?php
function alert($errors=""){

	$class= "success";
	$msg = [];
	if($errors){
		$getMsg = @$errors->getMessages();
		

		if(is_array($getMsg)){

			foreach ($getMsg as $key => $value) {
				if(is_array($value)){
					$class = "error";
					foreach ($value as $keyv => $valuev) {
						$msg[] = $valuev;
					}
				}
				
			}
		}

		
	}

	

	$arvkey = ["success","error"];
	foreach ($arvkey as $key => $value) {
		$session = session($value);
		if($session){
			$class= $value;
			$msg[] = $session;
		}
	}
	if($msg){
	echo '<div class="notes alert alert-'.$class.' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>'.ucfirst($class).'!</strong> <br>'.implode($msg, "<br>").'
</div>';
	}
}