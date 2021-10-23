var UABBFlipBox;

(function($) {
    
    /**
     * Class for Blog Posts Module
     *
     * @since 1.6.1
     */
    UABBFlipBox = function( settings ){

        // set params
        this.id                             = settings.id;
        this.nodeClass                      = '.fl-node-' + settings.id;
        this.display_vertically_center      = settings.display_vertically_center;
        this.flip_box_min_height_options    = settings.flip_box_min_height_options;
        this.flip_box_min_height            = settings.flip_box_min_height;
        this.flip_box_min_height_medium     = settings.flip_box_min_height_medium;
        this.flip_box_min_height_small      = settings.flip_box_min_height_small;
        this.small_breakpoint               = settings.small_breakpoint;
        this.medium_breakpoint              = settings.medium_breakpoint;
        this.responsive_compatibility       = settings.responsive_compatibility;
        this._init();   
    };

    UABBFlipBox.prototype = {

        nodeClass 						: this.nodeClass,
        id 								: this.id,
        flip_box_min_height_options 	: '',
        display_vertically_center 		: '',
        flip_box_min_height 		    : '',
        flip_box_min_height_medium      : '',
        flip_box_min_height_small       : '',
        small_breakpoint                : '',
        medium_breakpoint               : '',
        responsive_compatibility        : '',

        _init: function() {
        	var $this = this,
                delay = 500,
        		id = $this.id;

			if( !( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) ) {
				$('.fl-node-' + id + ' .uabb-flip-box-outter').hover(function(event){
					event.stopPropagation();
					$(this).addClass('uabb-hover');
                    $( $this.nodeClass ).find('.uabb-face.uabb-front').css('opacity', '0');

				}, function(event) {
					event.stopPropagation();
					$(this).removeClass('uabb-hover');
                    $( $this.nodeClass ).find('.uabb-face.uabb-front').css('opacity', '1');

				});
			}


			if( $this.flip_box_min_height_options == 'uabb-custom-height' ) {
                if( $this.responsive_compatibility == 'yes' ) {
                    $this._uabbFlipBoxResponsive();
                } else {
                    $this._uabbFlipBoxHeight();
                }
			} else {
				$this._uabbFlipBoxAdjustHeight();
			}

			setTimeout(function() {
				$('.uabb-face').css('opacity', '1');
			}, delay);
        },

        _uabbFlipBoxResponsive: function() {

            var $this = this,
                outter = $('.uabb-flip-box-outter');

            $( $this.nodeClass ).find( '.uabb-face' ).css( 'height', '100%' );
            if( window.innerWidth <= $this.small_breakpoint ) {
                outter.parent().removeClass('uabb-custom-height');
                outter.parent().css('height', '100%');
                outter.css('height', '100%');
                outter.parent().addClass('uabb-jq-height');
                $this._uabbFlipBoxAdjustHeight();
            } else {
                outter.parent().addClass('uabb-custom-height');
                outter.parent().removeClass('uabb-jq-height');
                outter.parent().css('height', '');
                outter.css('height', '');
                $this._uabbFlipBoxHeight();
            }
        },

        _uabbFlipBoxAdjustHeight: function() {

        	var currentFlipBox = $( this.nodeClass ),
                uabb_face = currentFlipBox.find( '.uabb-face' ),
                uabb_outter = currentFlipBox.find( '.uabb-flip-box-outter' ),
        		backFlipSection = currentFlipBox.find( '.uabb-back .uabb-flip-box-section' ),
        		frontFlipSection = currentFlipBox.find( '.uabb-front .uabb-flip-box-section' ),
                frontHeight = 0,
                backHeight = 0;

            setTimeout(function() {
                uabb_face.css( 'height', '100%' );
                uabb_outter.css( 'height', '100%' );
                uabb_outter.parent().css( 'height', '100%' );
                frontHeight = parseInt( frontFlipSection.outerHeight() ),
                backHeight = parseInt( backFlipSection.outerHeight() );
				if( ( backHeight >= frontHeight ) ) {
					uabb_face.css('height', backHeight );
				} else {
					uabb_face.css('height', frontHeight );
				}
            }, 200);

        },

        _uabbFlipBoxHeight: function() {

        	var $this = this,
                currentFlipBox = $( $this.nodeClass + ' .uabb-flip-box'),
        		backFlip = currentFlipBox.find( '.uabb-back' ),
        		frontFlip = currentFlipBox.find( '.uabb-front' ),
        		flip_box_min_height = $this.flip_box_min_height,
                flip_box_min_height_medium = $this.flip_box_min_height_medium,
                flip_box_min_height_small = $this.flip_box_min_height_small,
        		display_vertically_center = $this.display_vertically_center,
        		backFlipSection = backFlip.find( '.uabb-flip-box-section' ),
                medium_breakpoint = $this.medium_breakpoint,
                small_breakpoint = $this.small_breakpoint,
        		frontFlipSection = frontFlip.find( '.uabb-flip-box-section' );
            

            setTimeout(function() {
                backFlip.css( 'height', '100%' );
                frontFlip.css( 'height', '100%' );
                currentFlipBox.find( '.uabb-flip-box-outter' ).css( 'height', '' );
                if( window.innerWidth > medium_breakpoint ) {
                    $( currentFlipBox ).css( 'height', flip_box_min_height );
                } else if( window.innerWidth <= small_breakpoint ) {
                    $( currentFlipBox ).css( 'height', flip_box_min_height_small );
                } else {
                    $( currentFlipBox ).css( 'height', flip_box_min_height_medium );
                }
                
                if( display_vertically_center != 'no' ) {
                    if( ( parseInt( backFlipSection.outerHeight() ) ) >= ( parseInt( backFlip.outerHeight() ) ) ) {
                        backFlipSection.addClass( 'uabb_disable_middle' );
                    }

                    if( ( parseInt( frontFlipSection.outerHeight() ) ) >= ( parseInt( frontFlip.outerHeight() ) ) ) {
                        frontFlipSection.addClass( 'uabb_disable_middle' );
                    }
                } 
            }, 200); 
        }
    };
        
})(jQuery);