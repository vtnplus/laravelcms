jQuery(document).ready(function(){
	$('.row-gallery').owlCarousel({
		responsiveClass:true,
		lazyLoad:true,
		autoHeight:false,
		autoPlay: true,
		responsive:{
        0:{
            items:1,
            nav:false
        },
		}
	});
	var bLazy = new Blazy({ 
        breakpoints: [{
			          width: 420 // max-width
				, src: 'data-src-small'
			     }
		           , {
			          width: 768 // max-width
			        , src: 'data-src-medium'
			}],
	
    });
});