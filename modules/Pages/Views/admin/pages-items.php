<?php if($data){ ?>

	<?php 

	foreach ($data as $key => $value) { ?>
		
	<tr class="supper_pages" data-url="<?php admin_url("pages/home/quitedit/".$value->id);?>" data-quitedit="<?php echo $value->id;?>" data-quitview="<?php echo $value->id;?>">
		<!--ViewContent-->

        <td class="text-center"><?php echo $value->id;?></td>

        <td class="its" style="padding-left:<?php echo ($inum);?>px;">
            <span up-title><i class="glyphicon glyphicon-circle-arrow-right"></i> <?php echo $value->title;?></span>
            <a class="pull-right btn btn-xs btn-default" href="<?php echo $value->links();?>" target="_bank"><i class="glyphicon glyphicon-eye-open"></i> View</a>

        </td>

        

       

        <td><?php echo data($value->display_as,"Default");?></td>

        <td class="text-center"><?php echo $value->visists;?></td>

        <td><?php echo $value->updated_at();?></td>
<!--ViewContent-->
		<td>
            
            <?php button_tranlation("pages/home/copy/".$value->id."/{language}");?>
            <?php button(["edit" => ["pages/home/edit/".$value->id], "delete" => ["pages/home/delete/".$value->id]]);?>
            
        </td>
	</tr>
    <?php echo with(new \Modules\Pages\Backend\Home)->getSubpages($value->id, $inum+30);?>
	<?php } ?>

<?php } ?>