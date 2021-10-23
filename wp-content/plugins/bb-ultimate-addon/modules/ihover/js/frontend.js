(function ( $, window, undefined ) {
    // Hide until page load
    $( window ).on('load', function() {
        $('.uabb-ih-container').css({'visibility':'visible', 'opacity':1});
    });
    $(document).ready(function () {
        uabb_ihover_init();
        $(document).ajaxComplete(function(e, xhr, settings){
            uabb_ihover_init();
        });
    });
    $(window).resize(function(){
        uabb_ihover_init();
    });
    
    function uabb_ihover_init() {
        $('.uabb-ih-list').each(function(index, el){
            var elem = $(el);
            var s   = elem.attr('data-shape');
            var h  = elem.attr('data-height');
            var w   = elem.attr('data-width');
            var rh = elem.attr('data-res_height');
            var rw  = elem.attr('data-res_width');
            var ww = jQuery(window).width() || '';
                
            elem.find('li').each(function(){
                // Shape
                $(el).find('.uabb-ih-item').addClass('uabb-ih-' + s);
            });
        });
    }

    if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
        var is_touch_device = false;
    else
        var is_touch_device = true;

    if(!is_touch_device){
        jQuery('.uabb-ih-item').hover(function(event){
            jQuery(this).addClass('uabb-ih-hover');
        },function(event){
            event.stopPropagation();
            jQuery(this).removeClass('uabb-ih-hover');
        });
    } else{
        jQuery('.uabb-ih-item').on( 'click', function(event){
            var $this = jQuery(this);
            if($this.hasClass('uabb-ih-hover')){
                $this.removeClass('uabb-ih-hover');
            }
            else{
                jQuery('.uabb-ih-hover').removeClass('uabb-ih-hover');
                $this.addClass('uabb-ih-hover');
            }
        });
    }
}(jQuery, window));