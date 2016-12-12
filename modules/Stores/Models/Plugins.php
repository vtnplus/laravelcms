<?php
namespace Modules\Stores\Models;
use Remios\Utils\Database\DBQuery;
class Plugins extends DBQuery{
	function render(){
		$i = 0;
		if(class_exists($this->namespace)){
		ob_start();
		$i = $i + $this->size;
		?>
		<div class="col-xs-12 col-sm-<?php echo $this->size;?>">
			<?php _panel($this->title, true,["close",'up','settings']);?>
			<?php echo with(new $this->namespace)->render();?>
			<?php _panel_close();?>
		</div>
		<?php
		if($i >= 11){
			$i=0;
			echo '</div><div class="row row-flex">';
		}
		$page = ob_get_contents();
   		ob_end_clean();
   		return $page;
   		}
	}
}
