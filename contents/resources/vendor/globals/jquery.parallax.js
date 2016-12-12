$.fn.parallax = function() {
    $window = $(window);

    $(this).find(".background").each(function(){
        
        var $bgobj = $(this);
        
        
        $(window).scroll(function() {

            var yPos = -($window.scrollTop() / ($bgobj.data('speed') ? $bgobj.data('speed') : 5));
            var coords = '50% '+ yPos + 'px';

            $bgobj.css({ backgroundPosition: coords });
            

            //$bgobj.css({ 'transform': 'translate3d(0, ' +   yPos + 'px, 0)','background-color' : 'transparent', 'background-repeat' : 'repeat','background-attachment' : 'scroll', 'background-clip' : 'border-box', 'background-origin' : 'padding-box', 'background-size' : 'auto auto'});

        });
    });
};

//style='transform: translate3d(0px, 231px, 0px); background-color: transparent; background-repeat: repeat; background-attachment: scroll; background-position: initial; background-clip: border-box; background-origin: padding-box; background-size: auto auto;'