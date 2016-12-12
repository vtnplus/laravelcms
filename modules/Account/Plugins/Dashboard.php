<?php
namespace Modules\Account\Plugins;
/**
* 
*/
class Dashboard
{
	
	function render()
	{
		$data = db("Account::Users")->rows(10);
		?>
		
			<table class="table">
				<thead>
					<tr>
						<td>Email</td>
						<td>Status</td>
						<td>Create</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value) { ?>
						
					<tr>
						<td><?php echo $value->email;?></td>
						<td><?php echo $value->status;?></td>
						<td><?php echo $value->created_at;?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php
	}
}
