var UABBTimeline;

(function($) {

	UABBTimeline = function( settings ){

		// set params
		this.settings        = settings;
		this.node            = settings.id;
		this.content_type    = settings.content_type;
		this.infinite_load   = settings.infinite_load;
		this.node_module     = $( '.fl-node-' + this.node );
		this.nodeClass       = '.fl-node-' + this.node;
		this.wrapperClass    = '.fl-node-' + this.node + ' .uabb-days';
		this.loaderUrl       = settings.loaderUrl;
		this.postClass       = '.fl-node-' + this.node + ' .uabb-timeline-field';
		this.is_carousel         = settings.is_carousel;
        this.infinite         = settings.infinite;
        this.desktop         = settings.desktop;
        this.moduleUrl  = settings.moduleUrl;
        this.prevArrow  = settings.prevArrow;
        this.nextArrow  = settings.nextArrow;
        this.medium         = settings.medium;
        this.small         = settings.small;
        this.slidesToScroll         = settings.slidesToScroll;
        this.autoplay         = settings.autoplay;
        this.lazyload         = settings.lazyload;
        this.autoplaySpeed         = settings.autoplaySpeed;
        this.small_breakpoint         = settings.small_breakpoint;
        this.medium_breakpoint         = settings.medium_breakpoint;

		// initialize
		if( 'yes' == this.is_carousel ) {
			this._initHorizontalLayout();
		} else {
			this._initVerticalLayout();
			if( 'posts' === this.content_type && this._hasPosts()) {
               this._initInfiniteScroll();
        	}
		}
	};

	UABBTimeline.prototype = {

		_initHorizontalLayout: function(){
			var nodeClass = jQuery( this.nodeClass ),
				$grid = nodeClass.find( '.uabb-days' ),
				$connector = nodeClass.find( '.uabb-timeline-connector' );

            $grid.uabbslick({
                infinite: this.infinite,
                arrows: false,
                lazyLoad: this.lazyload,
                slidesToShow: this.desktop,
                slidesToScroll: this.slidesToScroll,
                autoplay: this.autoplay,
                autoplaySpeed: this.autoplaySpeed,
            	focusOnSelect: true,
            	asNavFor: $connector,
                responsive: [
                    {
                        breakpoint: this.medium_breakpoint,
                        settings: {
                            slidesToShow: this.medium,
                            slidesToScroll: this.medium,
                        }
                    },
                    {
                        breakpoint: this.small_breakpoint,
                        settings: {
                            slidesToShow: this.small,
                            slidesToScroll: this.small,
                        }
                    }
                ]
            });

            $connector.uabbslick({
                infinite: this.infinite,
                arrows: true,
                lazyLoad: false,
                slidesToShow: this.desktop,
                slidesToScroll: this.slidesToScroll,
                autoplay: this.autoplay,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class=" '+ this.prevArrow +' "></i></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="'+ this.nextArrow +' "></i></button>',
                autoplaySpeed: this.autoplaySpeed,
                focusOnSelect: true,
                asNavFor: $grid,
                responsive: [
                    {
                        breakpoint: this.medium_breakpoint,
                        settings: {
                            slidesToShow: this.medium,
                            slidesToScroll: this.medium,
                        }
                    },
                    {
                        breakpoint: this.small_breakpoint,
                        settings: {
                            slidesToShow: this.small,
                            slidesToScroll: this.small,
                        }
                    }
                ]
            });
		},

		_initVerticalLayout: function(){

			node_module = $( '.fl-node-' + this.node );
			this_node = node_module.find( '.uabb-timeline-node' );
			var timeline_main = node_module.find(".uabb-timeline-main");

		if ( timeline_main.length < 1 ) {
			return false;
		}

		var line_inner   		= node_module.find(".uabb-timeline__line__inner");
		line_outer   		= node_module.find(".uabb-timeline__line");
		icon_class 		= node_module.find(".uabb-timeline-marker-wrapper");
		var card_last 			= node_module.find(".uabb-timeline-field:last-child");

		var timeline_start_icon = icon_class.first().position();
		var timeline_end_icon = icon_class.last().position();

		line_outer.css('top', timeline_start_icon.top );

		var timeline_card_height = card_last.height();

		var last_item_top = card_last.offset().top - this_node.offset().top;

		var last_item, parent_top;

		if( this_node.hasClass('uabb-timeline-arrow-center')) {

			line_outer.css('bottom', timeline_end_icon.top );

			parent_top = last_item_top - timeline_start_icon.top;
			last_item = parent_top + timeline_end_icon.top;

		} else if( this_node.hasClass('uabb-timeline-arrow-top')) {

			var top_height = timeline_card_height - timeline_end_icon.top;
			line_outer.css('bottom', top_height );

			last_item = last_item_top;

		} else if( this_node.hasClass('uabb-timeline-arrow-bottom')) {

			var bottom_height = timeline_card_height - timeline_end_icon.top;
			line_outer.css('bottom', bottom_height );

			parent_top = last_item_top - timeline_start_icon.top;
			last_item = parent_top + timeline_end_icon.top;

		}

		var initial_height = 0;

		line_inner.height(initial_height);

		// Listen for events.
		window.addEventListener("load", $.proxy(this._uabbTimelineFunc, this));
		window.addEventListener("resize", $.proxy(this._uabbTimelineFunc, this));
		window.addEventListener("scroll", $.proxy(this._uabbTimelineFunc, this));

		},

		_hasPosts: function(){
            return $(this.postClass).length > 0;
        },

        _initInfiniteScroll: function(){
            if(this.infinite_load == 'yes' && typeof FLBuilder === 'undefined') {
                var $this = this;
                setTimeout(function(){
                   $this._infiniteScroll();
                }, 500);
            }
        },

        _infiniteScroll: function(settings){
            var path        = $('.fl-node-' + this.node + ' #uabb-timeline-pagination a.next').attr('href'),
                pagePattern = /(.*?(\/|\&|\?)paged-[0-9]{1,}(\/|=))([0-9]{1,})+(.*)/,
                wpPattern   = /^(.*?\/?page\/?)(?:\d+)(.*?$)/,
                pageMatched = null;

                scrollData = {
                    navSelector     : '.fl-node-' + this.node + ' #uabb-timeline-pagination',
                    nextSelector    : '.fl-node-' + this.node + ' #uabb-timeline-pagination a.next',
                    itemSelector    : this.postClass,
                    append          : this.postClass,
                    prefill         : true,
                    bufferPx        : 200,
                    loading         : {
                        msgText         : 'Loading',
                        finishedMsg     : '',
                        img             : this.loaderUrl,
                        speed           : 10,
                    }
                };
            if ( pagePattern.test( path ) ) {
                scrollData.path = function( currPage ){
                    pageMatched = path.match( pagePattern );
                    path = pageMatched[1] + currPage + pageMatched[5];
                    return path;
                }
            }
            else if ( wpPattern.test( path ) ) {
                scrollData.path = path.match( wpPattern ).slice( 1 );
            }

            $(this.wrapperClass).infinitescroll( scrollData, $.proxy(this._infiniteScrollComplete, this) );
            setTimeout(function(){
                $(window).trigger('resize');
            }, 100);

        },

        _infiniteScrollComplete: function(elements){
            window.addEventListener("load", $.proxy(this._uabbTimelineFunc, this));
			window.addEventListener("resize", $.proxy(this._uabbTimelineFunc, this));
			window.addEventListener("scroll", $.proxy(this._uabbTimelineFunc, this));
        },

		// Callback function for all event listeners.
		_uabbTimelineFunc: function(elements){
			node_module = $( '.fl-node-' + this.node );
			this_node = node_module.find( '.uabb-timeline-node' );
			icon_class 		= node_module.find(".uabb-timeline-marker-wrapper");
			timeline_main   	= node_module.find(".uabb-timeline-main");
			if ( timeline_main.length < 1 ) {
				return false;
			}

			var $document = $(document);
			last_item = null;
			// Repeat code for window resize event starts.
			timeline_start_icon = icon_class.first().position();
			timeline_end_icon 	= icon_class.last().position();

			card_last 			= node_module.find(".uabb-timeline-field").last();

			line_inner   		= node_module.find(".uabb-timeline__line__inner");
			line_outer.css('top', timeline_start_icon.top );

			timeline_card_height = card_last.height();

			last_item_top = card_last.offset().top - this_node.offset().top;

			if( this_node.hasClass('uabb-timeline-arrow-center')) {

				line_outer.css('bottom', timeline_end_icon.top );
				parent_top = last_item_top - timeline_start_icon.top;
				last_item = parent_top + timeline_end_icon.top;

			} else if( this_node.hasClass('uabb-timeline-arrow-top')) {

				var top_height = timeline_card_height - timeline_end_icon.top;
				line_outer.css('bottom', top_height );
				last_item = last_item_top;

			} else if( this_node.hasClass('uabb-timeline-arrow-bottom')) {

				var bottom_height = timeline_card_height - timeline_end_icon.top;
				line_outer.css('bottom', bottom_height );
				parent_top = last_item_top - timeline_start_icon.top;
				last_item = parent_top + timeline_end_icon.top;
			}
			elementEnd = last_item + 20;

			// Repeat code for window resize event ends.

			var viewportHeight = document.documentElement.clientHeight;
			var viewportHeightHalf = viewportHeight/2;
			var elementPos = this_node.offset().top;
			var new_elementPos = elementPos + timeline_start_icon.top;

			var photoViewportOffsetTop = new_elementPos - $document.scrollTop();

			if (photoViewportOffsetTop < 0) {
				photoViewportOffsetTop = Math.abs(photoViewportOffsetTop);
			} else {
				photoViewportOffsetTop = -Math.abs(photoViewportOffsetTop);
			}

			if ( elementPos < (viewportHeightHalf) ) {

				if ( (viewportHeightHalf) + Math.abs(photoViewportOffsetTop) < (elementEnd) ) {
					line_inner.height((viewportHeightHalf) + photoViewportOffsetTop);
				}else{
					if ( (photoViewportOffsetTop + viewportHeightHalf) >= elementEnd ) {
						line_inner.height(elementEnd);
					}
				}
			} else {
				if ( (photoViewportOffsetTop  + viewportHeightHalf) < elementEnd ) {
					if (0 > photoViewportOffsetTop) {
						line_inner.height((viewportHeightHalf) - Math.abs(photoViewportOffsetTop));
					} else {
						line_inner.height((viewportHeightHalf) + photoViewportOffsetTop);
					}
				} else {
					if ( (photoViewportOffsetTop + viewportHeightHalf) >= elementEnd ) {
						line_inner.height(elementEnd);
					}
				}
			}

			var timeline_icon_pos, timeline_card_pos;
			var elementPos, elementCardPos;
			var timeline_icon_top, timeline_card_top;
			timeline_icon = node_module.find(".uabb-timeline-marker-wrapper");
			animate_border 	= node_module.find(".animate-border");

			for (var i = 0; i < timeline_icon.length; i++) {

				timeline_icon_pos = $(timeline_icon[i]).offset().top;
				timeline_card_pos = $(animate_border[i]).offset().top;

				elementPos = this_node.offset().top;
				elementCardPos = this_node.offset().top;

				timeline_icon_top = timeline_icon_pos - $document.scrollTop();
				timeline_card_top = timeline_card_pos - $document.scrollTop();

				if ( ( timeline_card_top ) < ( ( viewportHeightHalf ) ) ) {

					animate_border[i].classList.remove("out-view");
					animate_border[i].classList.add("in-view");

				} else {
					// Remove classes if element is below than half of viewport.
					animate_border[i].classList.add("out-view");
					animate_border[i].classList.remove("in-view");
				}

				if ( ( timeline_icon_top ) < ( ( viewportHeightHalf ) ) ) {

					// Add classes if element is above than half of viewport.
					timeline_icon[i].classList.remove("out-view-timeline-icon");
					timeline_icon[i].classList.add("in-view-timeline-icon");

				} else {

					// Remove classes if element is below than half of viewport.
					timeline_icon[i].classList.add("out-view-timeline-icon");
					timeline_icon[i].classList.remove("in-view-timeline-icon");

				}
			}
		},
	};
})(jQuery);
