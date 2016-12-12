jQuery(document).ready(function(){
	reloadSize();
	$(window).resize(function(){
		reloadSize();
	});

	$("[data-media]").fancybox({
		'width'				: '85%',
		'height'			: '75%',
        'autoScale'     	: false,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});

	$('[role="iconpicker"]').iconpicker({
		"iconset" : "fontawesome",
		"rows" : "5",
		"cols" : "6"
	});
	$('[role="iconpicker"]').on('change', function(e) { 
		$(this).parent().find("input[name=icons]").val(e.icon);
	    console.log(e.icon);
	});

	$(".nav.side-menu >li.dropdown").on("click", function(){
		
		$(".nav.side-menu").find(".active").removeClass("active");

		$(this).toggleClass("active");
		
	});
	$(".nav.side-menu >li.dropdown >a[href]").removeAttr("href");


	/*
	Quit Edit
	*/
	$('tr[data-quitedit]').on("click", function(event){
		
		if(event.target.nodeName == 'INPUT' || event.target.nodeName == 'A' || event.target.nodeName == 'BUTTON') {
	        return;
	    }
		var count_td = $(this).find("td").length;
		var url = $(this).attr("data-url");
		var html = '<tr id="hookEdit" active-id="'+$(this).attr('data-quitedit')+'"><td style="text-align:left;" colspan="'+count_td+'">Loadding...</td></tr>';
		var $this = $(this);
		if(!url) return;
		if($("#hookEdit").attr("active-id") == $(this).attr('data-quitedit')){
			return;
		}else{
			$("#hookEdit").remove();
			
		}
		if(!$("#_formhidden").attr("id")){
			$("body").append('<iframe id="_formhidden" name="_formhidden" style="height:1px; width:1px; margin-bottom:-1000px;"></iframe>');
			
		}

		$.ajax({
            url : url,
            type : "GET",
            //dateType:"html",
            //contentType: 'multipart/form-data; charset=UTF-8;',
			contentType : false,
			encoding: '', 
            processData: false,
            beforeSend: function () {
            	
            },
            success : function (result){
            	$this.after(html);
            	$("#hookEdit > td").html(result);

            	$(".btn-save-quit").click(function(){
            		$(this).parent().find("[up-data]").each(function(){
            			var _up = $(this).attr("up-data");
            			var _up_format = $(this).attr("up-format");

            			switch(_up_format){
            				case 'src':
            					$this.find('[up-'+_up+']').attr("src",$(this).val());
            				break;
            				default:
            					$this.find('[up-'+_up+']').html($(this).val());
            				break;
            			}
            			write_log("update");
            			window.location.reload();
            		});

            		$(this).parent().attr("target","_formhidden");
            		$(this).parent().submit();
            	});

            },
            complete: function () {
            	

            },
            error: function () {
               $("#hookEdit").remove();
            }
        });
	});

	$('[data-reset]').on("click", function(event){
		var url = $(this).attr("data-href");
		
		$.ajax({
            url : url,
            type : "GET",
            //dateType:"html",
            //contentType: 'multipart/form-data; charset=UTF-8;',
			contentType : false,
			encoding: '', 
            processData: false,
            beforeSend: function () {
            	
            },
            success : function (result){
            	
            			write_log("update");
            			window.location.reload();
            		
            	

            },
            complete: function () {
            	

            },
            error: function () {
              
            }
        });
	});
	/*
	Bootrasp Query
	*/
	

	$("[data-input-upload-image]").on("change", function(){
		var fd = new FormData();
		var pr = $(this).parent().find("e");
		var prb = $(this).parent();
		var fset = $(this).parent().parent().parent().find("input[data-url-files]");
		fd.append( "image", $(this)[0].files[0]);

		$.ajax({
            url : "/admin/media/uploads/upload",
            type : "POST",
            dateType:"json",
            //contentType: 'multipart/form-data; charset=UTF-8;',
			contentType : false,
			encoding: '', 
            data : fd,
            processData: false,
            beforeSend: function () {
            	prb.addClass("btn-danger");
                pr.html("Process..");
            },
            success : function (result){
            	var returnedData = JSON.parse(result);
                
                fset.val(returnedData.sort_url);
                fset.click();

            },
            complete: function () {
            	prb.removeClass("btn-danger");
                pr.html("Browse");

            },
            error: function () {
                alert("ERROR in upload");
            }
        });
	});


	$("[data-input-upload-avatar]").on("change", function(){
		var fd = new FormData();
		var pr = $(this).parent().find("e");
		var prb = $(this).parent();
		var fset = $(this).parent().parent().parent().find("input[data-url-files]");
		fd.append( "image", $(this)[0].files[0]);

		$.ajax({
            url :  "/admin/media/uploads/avatar",
            type : "POST",
            dateType:"json",
            //contentType: 'multipart/form-data; charset=UTF-8;',
			contentType : false,
			encoding: '', 
            data : fd,
            processData: false,
            beforeSend: function () {

            	prb.addClass("btn-danger");
                pr.html("Process..");
            },
            success : function (result){
            	var returnedData = JSON.parse(result);
                
                fset.val(returnedData.sort_url);
                fset.click();

            },
            complete: function () {
            	prb.removeClass("btn-danger");
                pr.html("Browse");

            },
            error: function () {
                alert("ERROR in upload");
            }
        });
	});




	/*
	Create Tinymce
	*/
	if (typeof tinymce !== 'undefined') {
	  
	  var getCSS = $('[set="tinymce"]');
	  var css = [];
	  $.each(getCSS, function(i, value){
	  	css.push($(this).attr("href")+'?time=' + new Date().getTime());
	  });

	  var tools = '<div class="btn-toolbar" role="toolbar" aria-label="..."><div class="btn-group" role="group" aria-label="...">';
	  tools += '<button type="button" class="btn btn-default"><i class="glyphicon glyphicon-lock"></i></button><button type="button" class="btn btn-default">P</button>';
	  tools += '<button type="button" class="btn btn-default" data-exe="pagebreak">Break</button>';
	  tools += '<button type="button" class="btn btn-default" data-exe="hr">HR</button>';
	  tools += '</div>';

	  tools += ' <div class="btn-group" role="group" aria-label="...">';
	  tools += '<button type="button" data-exe="img-left-right" class="btn btn-default">Image Left - Right</button>';
	  tools += '<button type="button" data-exe="left-img-right" class="btn btn-default">Left Image - Right</button>';
	  tools += '<button type="button" data-exe="icons-services" class="btn btn-default">Icons Services</button>';
	  tools += '<button type="button" data-exe="title-text" class="btn btn-default">Title - Content</button>';
	  tools += '</div></div>';


	  function loadTinyMce(obj){
		  	$("#inLineEdit .tinymce-contents [class*=col-], #inLineEdit .tinymce-contents > p").tinymce({
		  		relative_urls: false,
	            theme: "modern",
	            element_format: "html",
	            entity_encoding : "raw",
	            menubar : false,
	            statusbar : false,
		  		 inline : true,
		  		forced_root_block : false,
	            force_p_newlines : false,
	            force_br_newlines : true,
	            convert_newlines_to_brs : true,
	            remove_linebreaks : true,
	            body_class: 'container-fluid',
	            image_title: true,
	            image_advtab: true,
		  		plugins: [
	                         "advlist autolink link lists charmap hr anchor",
	                         "code insertdatetime nonbreaking",
	                         "table  tabfocus directionality template paste textcolor code"
	                   ],
	            toolbar : "tabfocus | bullist numlist | link  | forecolor backcolor templates images medias | code",
	            schema: "html5",
	            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
	            extended_valid_elements : "div[*],span[*],i[*],a[*],ul[*],li[*]",
	            valid_children : "+a[div]",
	            setup: function(editor) {
	            	editor.addButton('images', {
			      text: false,
			      icon: "mce-ico mce-i-image",
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<img style="max-width:100%;" src="'+textimg_url+'" class="amite-hover fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'" />');
							}
						},
					});
			      }
			    });
			    editor.addButton('medias', {
			      text: false,
			      icon: "mce-ico mce-i-media",
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<video style="max-width:100%;" data-src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'"></video>');
							}
						},

					});
			      }
			    });
			    
			    editor.addButton('templates', {
			      type: 'splitbutton',
			      text: false,
			      icon: "mce-ico mce-i-template",
			      menu:[{
			          icon: 'alignleft',
			          text: 'Image Left - Right',
			          onclick: function() {
			           	editor.insertContent('<div class="row"><div class="col-xs-12 col-sm-6"><img src=""></div><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div></div>');
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Left - Image Right',
			          onclick: function() {
			           	editor.insertContent('<div class="row"><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div class="col-xs-12 col-sm-6"><img src=""></div></div>');
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Icons Services',
			          onclick: function() {
			          	var html = '<div class="row">';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '</div>';
			           	editor.insertContent(html);
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Layout',
			          onclick: function() {
			            $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/stores/tinymce/templates?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<video data-src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'"></video>');
							}
						},

					});
			          }
			        }]
			      
			    });

			        editor.on('submit', function(e) {
			            
			            tinymce.remove();
			            obj.val($("#inLineEdit .tinymce-contents").html());
			           
			        });
			    }

		  	});
			$("#inLineEdit .tinymce-contents > .row, #inLineEdit .tinymce-contents > p").on("mouseenter", function(){
				$(this).append("<a class=\"btn-remove btn\" onclick='$(this).parent().remove();'>Remove</a>");

			}).on("mouseleave", function(){
				$(this).find("a.btn-remove").remove();
			});

			
	  	}

	  $('[data-editer="tinymce-inline"]').each(function(){
	  	
	  	var $this = $(this);
	  	var $id = $(this).attr("id");

	  	$this.before('<div id="inLineEdit" style="min-height:'+$this.height()+'px;"><div class="tinymce-tools">'+tools+'</div><div class="tinymce-contents">'+html_entity_decode($this.html())+'</div></div>');
	  	$(this).css("display","none");
	  	$('#inLineEdit [role="toolbar"] .btn[type=button]').on("click", function(){
	  		var exeC = $(this).attr("data-exe");
	  		switch(exeC){
	  			case 'img-left-right':
	  				$("#inLineEdit .tinymce-contents").append('<div class="row"><div class="col-xs-12 col-sm-6"><img src="/contents/resources/views/images/no-image.png" style="width:100%;"></div><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div></div>');
	  			break;

	  			case 'left-img-right':
	  				$("#inLineEdit .tinymce-contents").append('<div class="row"><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div class="col-xs-12 col-sm-6"><img src="/contents/resources/views/images/no-image.png" style="width:100%;"></div></div>');
	  			break;
	  			case 'hr':
	  				$("#inLineEdit .tinymce-contents").append('<div class="row"><div class="col-xs-12 col-sm-12"><hr></div></div>');
	  			break;
	  			case 'pagebreak':
	  				$("#inLineEdit .tinymce-contents").append('<div class="row"><div class="col-xs-12 col-sm-12"><hr data-pagebreak="pagebreak"></div></div>');
	  			break;

	  			case 'title-text':
	  				$("#inLineEdit .tinymce-contents").append('<div class="row"><div class="col-xs-12 col-sm-12"><h3 class="customs-title">Title Here</h3><p>Contents Here</p></div></div>');
	  			break;

	  			case 'icons-services':
	  				var html = '<div class="row">';
			          	html += '<div class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '</div>';
	  				$("#inLineEdit .tinymce-contents").append(html);
	  			break;
	  			default :
	  				$("#inLineEdit .tinymce-contents").append('<p>Text Here</p>');
	  			break;
	  		}
	  		loadTinyMce($this);
	  		
	  	});

	  	loadTinyMce($this);

	  });
	  
	  $('[data-editer="tinymce"]').tinymce({
	  		relative_urls: false,
            theme: "modern",
            element_format: "html",
            entity_encoding : "raw",
            menubar : true,
            statusbar : true,
            inline : false,
            forced_root_block : false,
            force_p_newlines : false,
            force_br_newlines : true,
            convert_newlines_to_brs : true,
            remove_linebreaks : true,
            body_class: 'container-fluid',
            image_title: true,
            image_advtab: true,
            content_css: css,
            
            plugins: [
                         "advlist autolink link image imagetools lists charmap hr anchor pagebreak",
                         "code fullscreen insertdatetime media nonbreaking",
                         "save table  tabfocus directionality template paste textcolor code"
                   ],
            toolbar : "tabfocus | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link  | forecolor backcolor | pagebreak fullscreen templates images medias | code",
            schema: "html5",
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            extended_valid_elements : "div[*],span[*],i[*],a[*],ul[*],li[*]",
            valid_children : "+a[div]",
            plugin_preview_width: $("body").width() - 60,
            plugin_preview_height: $(window).height() - 120,
            setup: function(editor) {
            	editor.addButton('images', {
			      text: false,
			      icon: "mce-ico mce-i-image",
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<img style="max-width:100%;" src="'+textimg_url+'" class="amite-hover fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'" />');
							}
						},
					});
			      }
			    });
			    editor.addButton('medias', {
			      text: false,
			      icon: "mce-ico mce-i-media",
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<video style="max-width:100%;" data-src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'"></video>');
							}
						},

					});
			      }
			    });
			    
			    editor.addButton('templates', {
			      type: 'splitbutton',
			      text: false,
			      icon: "mce-ico mce-i-template",
			      menu:[{
			          icon: 'alignleft',
			          text: 'Image Left - Right',
			          onclick: function() {
			           	editor.insertContent('<div class="row"><div class="col-xs-12 col-sm-6"><img src=""></div><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div></div>');
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Left - Image Right',
			          onclick: function() {
			           	editor.insertContent('<div class="row"><div class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div class="col-xs-12 col-sm-6"><img src=""></div></div>');
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Icons Services',
			          onclick: function() {
			          	var html = '<div class="row">';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '<div class="col-xs-12 col-sm-3"><h1><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div>';
			          	html += '</div>';
			           	editor.insertContent(html);
			          }
			        },{
			          icon: 'alignleft',
			          text: 'Layout',
			          onclick: function() {
			            $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/stores/tinymce/templates?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<video data-src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'"></video>');
							}
						},

					});
			          }
			        }]
			      
			    });

            }
	  });
	  




	  $('[data-editer="tinymce-mini"]').tinymce({
	  		relative_urls: false,
            theme: "modern",
            element_format: "html",
            entity_encoding : "raw",
            menubar : false,
            statusbar : false,
            inline : false,
            forced_root_block : false,
            force_p_newlines : false,
            force_br_newlines : true,
            convert_newlines_to_brs : true,
            remove_linebreaks : true,
            body_class: 'container-fluid',
            image_title: true,
            image_advtab: true,
            //content_css: css,
            
            plugins: [
                         "advlist autolink link image imagetools lists charmap preview hr anchor pagebreak",
                         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                         "save table contextmenu  tabfocus directionality template paste textcolor code"
                   ],
            toolbar : "alignleft aligncenter alignright alignjustify | bullist numlist | link | forecolor backcolor | pagebreak fullscreen template images medias",
            schema: "html5",
            imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
            extended_valid_elements : "div[*],span[*],i[*],a[*],ul[*],li[*]",
            valid_children : "+a[div]",
            plugin_preview_width: $("body").width() - 60,
            plugin_preview_height: $(window).height() - 120,
            setup: function(editor) {
            	editor.addButton('images', {
			      text: false,
			      icon: "mce-ico mce-i-image",
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<img src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'" />');
							}
						},
					});
			      }
			    });
			    editor.addButton('medias', {
			      text: false,
			      icon: "mce-ico mce-i-media",
			     
			      onclick: function () {
			        $.fancybox({
						'width'				: '75%',
						'height'			: '75%',
				        'autoScale'     	: false,
				        'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe',
						'href'				: '/admin/media/images?ajax=true&target=tinymce',
						'beforeClose'		: function(){
							var textimg_url = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=url]").val();
							var textimg_alt = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=alt]").val();
							var textimg_name = $(".fancybox-iframe").contents().find("#ToolsImagesPreviewText input[name=name]").val();
							if(textimg_url){
								editor.insertContent('<video data-src="'+textimg_url+'" class="fullwith" alt="'+(textimg_alt ? textimg_alt : textimg_name)+'"></video>');
							}
						},

					});
			      }
			    });
            }
	  });
	}
	
	/*
	Hook Control responsive
	*/

	$(".table-responsive").each(function(){
		
		var pLeft = $(this).offset().left;
		var rt = $(window).width() - ($(this).outerWidth() + pLeft);
		var $this = $(this);
		var mLeft = 15;

		var items = {};
		$(this).find('[data-fixed="left"]').each(function(v, i){
			
			var width = $(this).outerWidth();
			var height = $(this).outerHeight();
			
			
			var iLeft = pLeft + mLeft;
			var index = $(this).index() + 1;
			$(this).attr("data-left",mLeft);
			$(this).attr("data-width",width);
			var $trThis = $(this);
			$this.find("table.table tbody tr").each(function(){
				$(this).find("td:nth-child( "+index+" )").css({"position" : "absolute", "left" : $trThis.attr("data-left")+"px", "width" : $trThis.attr("data-width")+"px","margin-top":"-1px", "height" : $(this).height()});
			});
			
			//$this.find("table.table tbody tr td:nth-child( "+index+" )").css({"background" : "red","position" : "fixed", "left" : $(this).attr("data-left"), "width" : width,"margin-top":"-1px", "height" : $(this).height()});
			mLeft += width;
			
		});
		$(this).find('[data-fixed="left"]').each(function(v, i){
			var index = $(this).index() + 1;
			var height = $(this).outerHeight();
			$(this).css({"background":"#F2F2F2","color" : "#000", "position" : "absolute", "left" : $(this).attr("data-left")+"px", "width" : $(this).attr("data-width")+"px","margin-top":"0px", "height" : height});
			//$this.find("table.table tbody tr td:nth-child( "+index+" )").css({"position" : "fixed", "left" : $(this).attr("data-left")+"px", "width" : $(this).attr("data-width")+"px","margin-top":"-1px", "height" : $(this).height()});
		});
		$this.css({"margin-left" : mLeft - 15});
		
		$(this).find('[data-fixed="right"]').each(function(v, i){
			
			var width = $(this).outerWidth();
			
			var height = $(this).outerHeight();
			
				$this.css({"margin-right" : width});
				$(this).css({"position" : "absolute", "right" : "15px", "width" : width,"border-bottom":"2px solid #31B0D5","margin-top":"1px", "height" : height});
		
				$this.find("table.table tbody tr td:last-child").each(function(){
					$(this).css({"position" : "absolute", "right" : "15px", "width" : width,"margin-top":"-1px", "height" : $(this).parent().height()});
					
				});
			
		});
		
		
		
		//var $bg = $(this).find('[data-fixed="right"]').parent().css("background-color");

		
		
	});
	

});


function write_log(){
	$("#write_log").remove();
	$("body").append('<div id="write_log"><h1><i class="glyphicon glyphicon-ok-circle"></i></h1></div>');
	$("#write_log").fadeOut(1500);
}
function reloadSize(){
	//$(".main-container").css({"margin-left" : $(".leftpanel").width()});
	if($(window).width() < 990){
		$(".leftpanel").addClass("leftpanel-mini");
		$(".main-content").addClass("main-content-mini");
		
	}else{
		$(".leftpanel").removeClass("leftpanel-mini");
		$(".main-content").removeClass("main-content-mini");
	}

	$(".leftpanel .footer_panel").css({"width" :$(".leftpanel").outerWidth()});
	$(".navbar-fixed-top").css({"width" : $(".main-content").width(), "left" : $(".leftpanel").outerWidth(), "top" : "0", "z-index":"9"});
	$(".main-container").css({"padding-top" : $(".navbar-fixed-top").height(), "min-height" : $(window).height()});
}