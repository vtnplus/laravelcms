<?php _panel("<i class='glyphicon glyphicon-tags'></i> SEO Options",true,'
    <a class="btn btn-primary"  onClick="switchSEO()">Edit</a>
    
');?>

    <div class="form-group">
        <div class="preview_google col-sm-12">
            <a class="title"><?php echo @$data->title;?></a>
            <span class="links help-block"><?php echo @$data->links();?></span>
            <div class="description"><?php echo data(@$data->meta_description,config("site.description"));?></div>
        </div>
    </div>


    <div class="editSEO hide" id="editSEO">
<!--Seo_urls -->
    <div class="form-group" data-field="seo_urls,input,0,0,0">
        <label for="inputSeo_urls" class="col-sm-2 control-label"><?php echo lang("pages.home.seo_urls");?></label>
        <div class="col-sm-10">
			<div class="input-group"><input type="text" class="form-control" id="inputSeo_urls" name="seo_urls" value="<?php echo data(@$data->seo_urls,null);?>" placeholder="<?php echo lang("pages.home.seo_urls_placeholder");?>"><span class="input-group-btn"><button class="btn btn-primary" type="button">Render!</button></span></div>
					
    	</div>
    </div>
	

	
	

	<!--Meta_keyword -->
    <div class="form-group" data-field="meta_keyword,input,0,0,0">
        <label for="inputMeta_keyword" class="col-sm-2 control-label"><?php echo lang("pages.home.meta_keyword");?></label>
        <div class="col-sm-10">
<input type="text" class="form-control" id="inputMeta_keyword" name="meta_keyword" value="<?php echo data($data->meta_keyword,"auto");?>" placeholder="<?php echo lang("pages.home.meta_keyword_placeholder");?>">
		<span class="help-block">Các từ khóa cách nhau bởi (,)</span>
    	</div>
    </div>
	

	<!--Meta_descritpion -->
    <div class="form-group" data-field="meta_descritpion,input,0,0,0">
        <label for="inputMeta_descritpion" class="col-sm-2 control-label"><?php echo lang("pages.home.meta_descritpion");?></label>
        <div class="col-sm-10">
<input type="text" class="form-control" id="inputMeta_descritpion" name="meta_description" value="<?php echo data($data->meta_description,"auto");?>" placeholder="<?php echo lang("pages.home.meta_descritpion_placeholder");?>">
		<span class="help-block">Các từ khóa cách nhau bởi (,)</span>
    	</div>
    </div>
    </div>
<?php _panel_close();?>

<script type="text/javascript">
    function switchSEO(){
        $('.editSEO').toggleClass('hide');
    }
</script>
<style type="text/css">
.preview_google .title{
    white-space: nowrap;
    color: #1a0dab;
    font-size: 18px;
}

    .preview_google .title:hover{
        text-decoration: underline;

    }
    .preview_google .links{
        color: #006621;
        font-style: normal;
        font-size: 14px;
        
    }
    .preview_google .description{
        line-height: 1.4;
        word-wrap: break-word;
        color: #545454;
    }
</style>