(function($) {
     UABBImageCarousel = function( settings ){

        // set params
        this.id                = settings.id;
        this.nodeClass         = '.fl-node-' + settings.id;

        this.infinite          = settings.infinite;
        this.arrows            = settings.arrows;
        this.slidesToScroll    = settings.slidesToScroll;
        this.autoplay          = settings.autoplay;
        this.on_pause_hover    = settings.onhover;
        this.autoplaySpeed     = settings.autoplaySpeed;

        this.desktop           = settings.desktop;
        this.medium            = settings.medium;
        this.small             = settings.small;

        this.medium_breakpoint = settings.medium_breakpoint;
        this.small_breakpoint  = settings.small_breakpoint;
        this.next_arrow = settings.next_arrow;
        this.prev_arrow = settings.prev_arrow;
        this.enable_fade = settings.enable_fade;
        this.enable_dots = settings.enable_dots;
        
        /* Execute when slick initialize */
        $( this.nodeClass ).find( '.uabb-image-carousel' ).on('init', $.proxy( this._adaptiveImageHeight, this ) );

        this._initImageCarousel();

        /* Fires after images loaded lazily */
        $( this.nodeClass ).find( '.uabb-image-carousel' ).on('lazyLoaded', $.proxy( this._adaptiveImageHeight, this ) );

    };

    UABBImageCarousel.prototype = {
        nodeClass               : '',
        wrapperClass            : '',
        infinite                : '',
        arrows                  : '',
        desktop                 : '',
        medium                  : '',
        small                   : '',
        slidesToScroll          : '',
        autoplay                : '',
        autoplaySpeed           : '',
        small_breakpoint        : '',
        medium_breakpoint       : '',

        _initImageCarousel: function() {
            var self = this,
                node = $( self.nodeClass ),
                img_carousel = node.find( '.uabb-image-carousel' );

            img_carousel.uabbslick({
                dots: self.enable_dots,
                fade: self.enable_fade,
                infinite: self.infinite,
                arrows: self.arrows,
                lazyLoad: 'ondemand',
                slidesToShow: self.desktop,
                slidesToScroll: self.slidesToScroll,
                autoplay: self.autoplay,
                pauseOnHover:self.on_pause_hover,
                autoplaySpeed: self.autoplaySpeed,
                adaptiveHeight: true,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class=" '+ self.prev_arrow +' "></i></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="'+ self.next_arrow +' "></i></button>',
                responsive: [
                    {
                        breakpoint: self.medium_breakpoint,
                        settings: {
                            slidesToShow: self.medium
                        }
                    },
                    {
                        breakpoint: self.small_breakpoint,
                        settings: {
                            slidesToShow: self.small,
                        }
                    }
                ]
                });

            img_carousel.on('afterChange', $.proxy( this._adaptiveImageHeight, this ) );
        },

        _adaptiveImageHeight: function() {

            var node = $( this.nodeClass ),
                post_active = node.find('.uabb-image-carousel-item.slick-active'),
                max_height = -1;

            post_active.each(function( i ) {

                var $this = $( this ),
                    this_height = $this.innerHeight();

                if( max_height < this_height ) {
                    max_height = this_height;
                }
            });

            node.find('.uabb-image-carousel .slick-list.draggable').animate({ height: max_height }, { duration: 200, easing: 'linear' });
            max_height = -1;
        }
    };
})(jQuery);
