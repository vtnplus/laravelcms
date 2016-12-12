$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});



jQuery(document).ready(function(){
	
	if (typeof $.fn.priceFormat !== 'undefined') {
		$('[name=prices], input.prices, [data-prices]').priceFormat({
			prefix : '',
			centsLimit : 0,
			

		});


		$("form").submit(function(){
			$('[name=prices], input.prices, [data-prices]').each(function(){
				var inputs = $(this).unmask();
				$(this).val(inputs);
			});
			
		});
	}

	$("[data-fixheader]").each(function(){
		var attachClass = $(this).attr("data-fixheader");
		var outHeight = $(this).height();
		
		$("."+attachClass).css({"margin-top": outHeight+"px"});
	});
	$("[data-center-screen]").centerScreen();
	//$('input').iCheck();
	

	$("[addShops]").on("click",function(){
		$(this).shoppings($(this).attr("addShops"));
		$(this).text("Success");
		$(this).addClass("btn-success");
	});

	$("[addRemember]").on("click",function(){
		$(this).remembrs($(this).attr("addRemember"));
	});

	$('.selectpicker').selectpicker({
	  size: 8,
	  iconBase : "",
	});

	$("[input-mask]").each(function(){
		var format = $(this).attr("input-mask");
		$(this).inputmask({mask : format});
	});

	$(".dropdown.hover, .dropdown-toggle.hover, .btn-group.hover").hover(function(){
		$(this).toggleClass("open");
	});

	$('[data-toggle="tooltip"]').tooltip();

	if (typeof colorpicker !== 'undefined') {
    	jQuery('[data-target="colorpicker"]').colorpicker();
	}
    
    /*
	lazy Image Loadding
    */
    if (typeof lazyload !== 'undefined') {
	   $("img.lazy").lazyload();
	}

	/*
	Append Amite Class
	*/
	$("[hover-amite]").each(function(){
		var amite = $(this).attr("data-hover-amite");
		$(this).hoverAnimate(amite);
	});

	$('[data-checkall]').on("click",function(){
		var index = $(this).parent().index() + 1;
		var target = $(this).attr("data-checkall");

		var allChecked = $(this);
        $(target).find("td:nth-child( "+index+" ) input[type=checkbox]").each(function() {
          $(this).prop("checked", allChecked.is(':checked'));
        });
	});

	
	if($('[swipe="left"]').length > 0){
		$('[swipe="left"]').html('<div class="swipe-container"><div class="swipe-menu"><div>'+$("[data-left-menu]").html().replace("navbar-right navbar-menu","")+'</div></div></div>');
		$("[data-swipe-left], .navbar .navbar-header button").on("click", function(){
			$('[swipe="left"]').addClass("active");
			return false;
		});

		$('[swipe="left"]').swipe( {
		        //Truoc qua trai
		        swipeLeft:function(event, direction, distance, duration, fingerCount) {
		        	
		        	$(this).removeClass("active");
		         
		        },
		        swipeRight:function(event, direction, distance, duration, fingerCount) {
		        	if($('[swipe="right"]').hasClass("active")){
		        		$('[swipe="right"]').removeClass("active");
		        	}
		         	 $(this).addClass("active");
		        	

		        },
		        
		        //Default is 75px, set to 0 for demo so any distance triggers swipe
		        threshold:75
		    });
	
	}
	if($('[swipe="right"]').length > 0){
		$('[swipe="right"]').html('<div class="swipe-container"><div class="swipe-menu"><div>'+$("[data-right-menu]").html().replace("navbar-right navbar-menu","")+'</div></div></div>');

		$("[data-swipe-right]").on("click", function(){
			$('[swipe="right"]').addClass("active");
			return false;
		});

	    $('[swipe="right"]').swipe( {
	        
	        //Truoc qua trai
		        swipeLeft:function(event, direction, distance, duration, fingerCount) {
		        	if($('[swipe="left"]').hasClass("active")){
		        		$('[swipe="left"]').removeClass("active");
		        	}
		          $(this).addClass("active");
		          //$(this).css({"right" : "0", "marginRight":"0"});  
		        },
		        swipeRight:function(event, direction, distance, duration, fingerCount) {
		          $(this).removeClass("active");
		          //$(this).css({"right" : "-100%", "marginRight":"15px"}).addClass("Khoa");  
		        },
		        //Default is 75px, set to 0 for demo so any distance triggers swipe
		        threshold:75
	    });
	}
	/*
	Type Search typeahead
	*/
	
	$("input.typeahead").each(function(){
			
			var url = $(this).attr("ajax-url");
			
			var code = $.ajax({type: "GET", url: url, async: false}).responseJSON;
			
			$(this).typeahead({
			   source: code,
			});

		});
	

	var places = [
	  {name: "New York"}, 
	  {name: "Los Angeles"},
	  {name: "Copenhagen"},
	  {name: "Albertslund"},
	  {name: "Skjern"}  
	];

	$('[data-role="tagsinput"]').tagsinput({
	freeInput: false,
    confirmKeys: [44],
	  typeahead: {
	    source: places.map(function(item) { return item.name }),

	    afterSelect: function() {
	    	this.$element[0].value = '';
	    }
	  }
	}); 

});
