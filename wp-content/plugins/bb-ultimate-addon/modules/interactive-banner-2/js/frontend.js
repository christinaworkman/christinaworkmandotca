(function ( $, window, undefined ) {
	$(window).on( 'load', function(a){
		jQuery('.uabb-ib2-outter').each(function(index, value){

			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				$(this).click(function(){
					//event.stopPropagation();
					var node = jQuery(this).closest( '.fl-module-interactive-banner-2' ).attr( 'data-node' ),
						ib2_outter = jQuery('.fl-node-' + node + ' .uabb-ib2-outter');
					if( ib2_outter.hasClass( 'uabb-ib2-hover' ) ){
				        ib2_outter.removeClass('uabb-ib2-hover');
				    } else {
				        ib2_outter.addClass('uabb-ib2-hover');
				    }
				});
			}
		});
	});

	if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
		var is_touch_device = false;
	else
		var is_touch_device = true;


	if(!is_touch_device){
		jQuery('.uabb-ib2-outter').hover(function(event){
			event.stopPropagation();
			jQuery(this).addClass('uabb-ib2-hover');
		},function(event){
			event.stopPropagation();
			jQuery(this).removeClass('uabb-ib2-hover');
		});
	}

}(jQuery, window));
