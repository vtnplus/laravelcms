jQuery(document).ready(function(){
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