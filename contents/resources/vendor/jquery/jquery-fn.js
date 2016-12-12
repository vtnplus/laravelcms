
jQuery.fn.extend({
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
    }
});

$.fn.scrollView = function () {
  return this.each(function () {
    $('html, body').animate({
      scrollTop: $(this).offset().top
    }, 1000);
  });
}
        
$.fn.centerScreen = function(){
    var height = $(this).outerHeight();
    var screenHeight = $(document).height();
    var fixTop = ((screenHeight - height) / 2);
    $(this).css({"margin":"auto", "margin-top" : fixTop});
};



$.fn.shoppings = function(id){
   
    $.ajax({
            url : '/invoices/order/create/'+id,
            type : "GET",
            //dateType:"html",
            //contentType: 'multipart/form-data; charset=UTF-8;',
            contentType : false,
            encoding: '', 
            processData: false,
            beforeSend: function () {
                
            },
            success : function (result){
               

            },
            complete: function () {
               

            },
            error: function () {
              
            }
        });
};


$.fn.remembers = function(){
   
};


$.fn.animateCss = function (animationName) {
        var fx = 'bounce flash pulse rubberBand shake swing tada wobble jello bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flip flipInX flipInY flipOutX flipOutY lightSpeedIn lightSpeedOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight slideInUp slideInDown slideInLeft slideInRight slideOutUp slideOutDown slideOutLeft slideOutRight zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp zoomOut zoomOutDown zoomOutLeft zoomOutRight zoomOutUp hinge rollIn rollOut';
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).removeClass(fx);
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
};


$.fn.hoverAnimate = function(animationName){
    var $this = $(this);
    $this.on("mouseenter",function(){
        $(this).animateCss(animationName);
    });
    /*
    .mouseleave(function(e){
        
        
    });
    */
};

$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$.fn.outHTML = function(value){
	// If there is no element in the jQuery object
    if(!this.length)
        return null;
    // Returns the value
    else if(value === undefined){
        
        var element = (this.length) ? this[0] : this,
            result;

        // Return browser outerHTML (Most newer browsers support it)
        if(element.outerHTML)
            result = element.outerHTML;
        // Return it using the jQuery solution
        else
            result = $(document.createElement("div")).append($(element).clone()).html();
        
        // Trim the result
        if(typeof result === "string")
            result = $.trim(result);
        
        return result;
        
    }
    // Deal with function
    else if( $.isFunction(value) ){
        
        this.each(function(i){
            var $this = $( this );
            $this.outerHTML( value.call(this, i, $this.outerHTML()) );
        });
        
    }
    // Replaces the content
    else {
        
        var $this = $(this),
            replacingElements = [],
            $value = $(value),
            $cloneValue;
        
        for(var x = 0; x < $this.length; x++){
            
            // Clone the value for each element being replaced
            $cloneValue = $value.clone(true);
            
            // Use jQuery to replace the content
            $this.eq(x).replaceWith($cloneValue);
            
            // Add the replacing content to the collection
            for(var i = 0; i < $cloneValue.length; i++)
                replacingElements.push($cloneValue[i]);
        
        }
        
        // Return the replacing content if any
        return (replacingElements.length) ? $(replacingElements) : null;

    }
};
