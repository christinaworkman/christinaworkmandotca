var UABBNumber;

(function($) {
	
	/**
	 * Class for Number Counter Module
	 *
	 * @since 1.6.1
	 */
	UABBNumber = function( settings ){

		// set params
		this.nodeClass           = '.fl-node-' + settings.id;
		this.wrapperClass        = this.nodeClass + ' .uabb-number';
		this.layout				 = settings.layout;
		this.type				 = settings.type;
		this.number				 = settings.number;
		this.numberFormat		 = settings.numberFormat;
		this.locale				 = settings.locale;
		this.max				 = settings.max;
		this.speed 				 = settings.speed;
		this.delay 				 = settings.delay;
		this.breakPoints         = settings.breakPoints;
		this.currentBrowserWidth = $( window ).width();
		// initialize the menu 
		this._initNumber();
		
	};
	
	UABBNumber.addCommas = function( n ){

		var rgx = /(\d+)(\d{3})/;
		n += '';
		x  = n.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	};

	UABBNumber.prototype = {
		nodeClass               : '',
		wrapperClass            : '',
		layout 	                : '',
		type 	                : '',
		number 	                : 0,
		numberFormat			: '',
		locale 					: '',
		max 	                : 0,
		speed 					: 0,
		delay 					: 0,

		_initNumber: function(){
			//alert();
			var self = this;

			if( typeof jQuery.fn.waypoint !== 'undefined' ) {
				$( self.wrapperClass ).waypoint({
					offset: '100%',
					triggerOnce: true,
					handler: function( direction ){
						self._initCount();
					}
				});
			}else {
				self._initCount();
			}

		},

		_initCount: function(){

			var self = this,
				$number = $( self.wrapperClass ).find( '.uabb-number-string' );

			if( !isNaN( self.delay ) && self.delay > 0 ) {
				setTimeout( function(){
					if( self.layout == 'circle' ){
						self._triggerCircle();
					} else if( self.layout == 'bars' ){
						self._triggerBar();
					} else if( self.layout == 'semi-circle' ){
						self._triggerSemiCircle();
					}
					self._countNumber();
				}.bind( self ), self.delay * 1000 );
			}
			else {
				if( self.layout == 'circle' ){
					self._triggerCircle();
				} else if( self.layout == 'bars' ){
					self._triggerBar();
				} else if( self.layout == 'semi-circle' ){
						self._triggerSemiCircle();
				}
				self._countNumber();
			}
		},

		_countNumber: function(){

			var self = this,
				$number = $( self.wrapperClass ).find( '.uabb-number-string' ),
				$string = $number.find( '.uabb-number-int' ),
				$counter_number = self.number;
				current = 0;

			var sAgent = window.navigator.userAgent;
			var Idx = sAgent.indexOf("MSIE");
			
		 	if (Idx > 0 || !!navigator.userAgent.match(/Trident\/7\./) ) {
				Number.isInteger = Number.isInteger || function(value) {
					return typeof value === "number" &&
					isFinite(value) &&
					Math.floor(value) === value;
				};
		  	}

			if( Number.isInteger( $counter_number ) ) {
				var digits = 0;
			} else {
				var digits = $counter_number.toString().split(".")[1].length;
			}

			if ( ! $number.hasClass( 'uabb-number-animated') ) {

	        	var $numFormat = self.numberFormat;
    			var $locale = self.locale.replace(/_/,'-');

			    $string.prop( 'Counter',0 ).animate({
			        Counter: self.number
			    }, {
			        duration: self.speed,
			        easing: 'swing',
			        step: function ( now ) {

			        	if($numFormat == 'locale') {
			        		var $counter = now.toLocaleString($locale, { minimumFractionDigits: digits, maximumFractionDigits:digits });
			        	} else if($numFormat == 'none') {
			        		var $counter = now.toFixed(digits);
			        	} else {
			        		var $counter = UABBNumber.addCommas( now.toFixed(digits) );
			        	}
		            	$string.text( $counter );
			        }
			    });
			    $number.addClass('uabb-number-animated');
			}

		},

		_triggerCircle: function(){

			var self   = this,
				$bar   = $( self.wrapperClass ).find( '.uabb-bar' ),
				r      = $bar.attr('r'),
				circle = Math.PI*(r*2),
				val    = self.number,
				max    = self.type == 'percent' ? 100 : self.max;
   
			if (val < 0) { val = 0;}
			if (val > max) { val = max;}
			
			if( self.type == 'percent' ){
				var pct = ( ( 100 - val ) /100) * circle;			
			} else {
				var pct = ( 1 - ( val / max ) ) * circle;
			}

		    $bar.animate({
		        strokeDashoffset: pct
		    }, {
		        duration: self.speed,
		        easing: 'swing'
		    });
			
		},

		_triggerSemiCircle: function(){

			var self   = this,
				$bar   = $( self.wrapperClass ).find( '.uabb-bar' ),
				r      = $bar.attr('r'),
				circle = Math.PI*(r*2)/2,
				val    = self.number,
				max    = self.type == 'percent' ? 100 : self.max;

			if (val < 0) { val = 0;}
			if (val > max) { val = max;}
			
			if( self.type == 'percent' ){
				var pct = ( ( 100 - val ) /100) * circle;			
			} else {
				var pct = ( 1 - ( val / max ) ) * circle;
			}

		    $bar.animate({
		        strokeDashoffset: pct
		    }, {
		        duration: self.speed,
		        easing: 'swing'
		    });
			
		},

		_triggerBar: function(){

			var self = this,
				$bar = $( self.wrapperClass ).find( '.uabb-number-bar' );

			if( self.type == 'percent' ){
				var number = self.number > 100 ? 100 : self.number;
			} else {
				var number = ( ( self.number / self.max ) * 100 );
			}

		    $bar.animate({
		        width: number + '%'
		    }, {
		        duration: self.speed,
		        easing: 'swing'
		    });

		}
	
	};
		
})(jQuery);