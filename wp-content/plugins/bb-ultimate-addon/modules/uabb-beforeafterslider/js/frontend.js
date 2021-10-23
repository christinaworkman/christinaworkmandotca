
var UABBBeforeAfterSlider;

(function($) {
    
    /**
     * Class for Blog Posts Module
     *
     * @since 1.6.1
     */
    UABBBeforeAfterSlider = function( settings ){
        
        // set params
        this.nodeClass = '.fl-node-' + settings.id;
        this.id = settings.id;
        this.wrapperClass = '.baslider-' + this.id;
        this.before_after_orientation = settings.before_after_orientation;
        this.initial_offset = settings.initial_offset;
        this.move_on_hover = settings.move_on_hover;
        
        this._init();
    };

    UABBBeforeAfterSlider.prototype = {

        nodeClass                   : '',
        wrapperClass                : '',
        before_after_orientation    : '',
        initial_offset              : '',
        move_on_hover               : '',

        _init: function() {

            var self = this,
                wrapperClass = jQuery( self.wrapperClass );
            jQuery(".baslider-" + self.id).twentytwenty(
                {
                    default_offset_pct: self.initial_offset,
                    move_on_hover: self.move_on_hover,
                    orientation: self.before_after_orientation
                }
            );                

            wrapperClass.css( 'width', '' );
            wrapperClass.css( 'height', '' );
     
            
            max = -1;
            jQuery( self.wrapperClass + " img" ).each(function() {
                if( max < jQuery(this).width() ) {
                    max = jQuery(this).width();
                }
            });
            
            wrapperClass.css( 'width', max + 'px' );
        }
    };

})(jQuery);