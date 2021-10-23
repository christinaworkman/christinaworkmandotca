(function($) {

	window.onLoadUABBReCaptcha = function() {
		var reCaptchaFields = $( '.uabb-grecaptcha' ),
			widgetID;
		if ( reCaptchaFields.length > 0 ) {
			reCaptchaFields.each( function(){
				var self 		= $( this ),
				 	attrWidget 	= self.attr( 'data-widgetid' );

				// Avoid re-rendering as it's throwing API error
				if ( ( typeof attrWidget !== typeof undefined && attrWidget !== false ) ) {
					return;
				}
				else {
					widgetID = grecaptcha.render( $( this ).attr( 'id' ), { 
						sitekey : self.data( 'sitekey' ),
						theme	: self.data( 'theme' ),
						callback: function( response ){
							if ( response != '' ) {
								self.attr( 'data-uabb-grecaptcha-response', response );
							}
						}
					});
					self.attr( 'data-widgetid', widgetID );					
				}
			});
		}
	};

	UABBContactForm = function( settings )
	{
		this.settings	= settings;
		this.nodeClass	= '.fl-node-' + settings.id;
		this.ajaxurl  	= settings.uabb_ajaxurl;
		this.name_required = settings.name_required;
		this.email_required = settings.email_required;
		this.subject_required = settings.subject_required;
		this.phone_required = settings.phone_required;
		this.msg_required = settings.msg_required;		
		this.msg_toggle = settings.msg_toggle;
		this.button_text = settings.button_text;
		this.form 		= $( this.nodeClass + ' .uabb-contact-form' );
		this.button		= this.form.find( '.uabb-contact-form-submit' );
		this.recaptcha_version = settings.recaptcha_version;
		reCaptchaField = $('#'+ this.settings.id + '-uabb-grecaptcha');
		reCaptchaValue = reCaptchaField.data( 'uabb-grecaptcha-response' );
		if ( 'v3' === this.recaptcha_version && reCaptchaField.length > 0 ) {
			grecaptcha.ready( function () {
				recaptcha_id = reCaptchaField.attr( 'data-widgetid' );
				grecaptcha.execute( recaptcha_id );
			});
		}

		this._init();
	};

	UABBContactForm.prototype = {
	
		settings	: {},
		nodeClass	: '',
		ajaxurl 	: '',
		name_required : 'no',
		email_required : 'yes',
		subject_required : 'no',
		phone_required : 'no',
		msg_required : 'no',
		
		_init: function()
		{
			var phone		= $( this.nodeClass + ' .uabb-phone input' );
			phone.on( 'keyup', this._removeExtraSpaces );
			$( this.nodeClass + ' .uabb-contact-form-submit' ).click( $.proxy( this._submit, this ) );
		},
		
		_submit: function( e )
		{
			var self        = this,
				nodeClass   = self.nodeClass,
				theForm	  	= $( nodeClass + ' .uabb-contact-form' ),
				submit	  	= $( nodeClass + ' .uabb-contact-form-submit' ),
				name	  	= $( nodeClass + ' .uabb-name input' ),
				email		= $( nodeClass + ' .uabb-email input' ),
				phone		= $( nodeClass + ' .uabb-phone input' ),
				subject	  	= $( nodeClass + ' .uabb-subject input' ),
				message	  	= $( nodeClass + ' .uabb-message textarea' ),
				reCaptchaField  = $( '#'+ self.settings.id + '-uabb-grecaptcha' ),
				reCaptchaValue	= reCaptchaField.data( 'uabb-grecaptcha-response' ),
				mailto	  	= $( nodeClass + ' .uabb-mailto' ),
				ajaxurl	  	= self.ajaxurl, //FLBuilderLayoutConfig.paths.wpAjaxUrl,
				_nonce      = theForm.data('nonce'),
				email_regex = /\S+@\S+\.\S+/,
				phone_regex = /^[ 0-9.()\[\]+-]*$/,
				isValid	  	= true;
				termsCheckbox 	= $( nodeClass + ' .uabb-terms-checkbox input' ),
				postId      	= theForm.closest( '.fl-builder-content' ).data( 'post-id' ),
				templateId		= theForm.data( 'template-id' ),
				templateNodeId	= theForm.data( 'template-node-id' ),
				nodeId      	= theForm.closest( '.fl-module' ).data( 'node' );
			e.preventDefault();

			name.on( 'focus', this._removeErrorClass );
			email.on( 'focus', this._removeErrorClass );
			phone.on( 'focus', this._removeErrorClass );
			phone.on( 'keyup', this._removeExtraSpaces );
			subject.on( 'focus', this._removeErrorClass );
			message.on( 'focus', this._removeErrorClass );

			// End if button is disabled (sent already)
			if ( submit.hasClass( 'uabb-disabled' ) ) {
				return;
			}
			
			// validate the name
			if( self.name_required == 'yes' ) {
				if( name.length ) {
					if ( name.val().trim() === '' ) {
						isValid = false;
						name.parent().addClass( 'uabb-error' );
						name.addClass( 'uabb-form-error' );
						name.siblings( '.uabb-form-error-message' ).show();
					} 
					else if ( name.parent().hasClass( 'uabb-error' ) ) {
						name.parent().removeClass( 'uabb-error' );
						name.siblings( '.uabb-form-error-message' ).hide();
					}
				}
			}
			
			// validate the email
			if( self.email_required == 'yes' ) {
				if( email.length ) {
					if ( email.val().trim() === '' ) {
						isValid = false;
						email.parent().addClass( 'uabb-error' );
						email.siblings( '.uabb-form-error-message' ).show();
						email.siblings().addClass( 'uabb-form-error-message-required' );
					} 
					else {
						email.siblings().removeClass( 'uabb-form-error-message-required' );
						email.parent().removeClass( 'uabb-error' );
						email.siblings( '.uabb-form-error-message' ).hide();
					}
				}
			} else {
				email.siblings().removeClass( 'uabb-form-error-message-required' );
			}

			if( email.length ) {
				if ( email.val().trim() !== '' ) {
					if( email_regex.test( email.val().trim() ) ) {
						email.parent().removeClass( 'uabb-error' );
						email.siblings( '.uabb-form-error-message' ).hide();
					} else {
						isValid = false;
						email.parent().addClass( 'uabb-error' );
						email.siblings( '.uabb-form-error-message' ).show();
					}
				}
			}

			// validate the subject..just make sure it's there
			if( self.subject_required == 'yes' ) {
				if( subject.length ) {
					if ( subject.val().trim() === '' ) {
						isValid = false;
						subject.parent().addClass( 'uabb-error' );
						subject.siblings( '.uabb-form-error-message' ).show();
					} 
					else if ( subject.parent().hasClass( 'uabb-error' ) ) {
						subject.parent().removeClass( 'uabb-error' );
						subject.siblings( '.uabb-form-error-message' ).hide();
					}
				}
			}
			
			// validate the phone..just make sure it's there
			if( self.phone_required == 'yes' ) {
				if( phone.length ) {
    				if( phone.val().trim() === '' ) {
    					isValid = false;
						phone.parent().addClass( 'uabb-error' );
						phone.siblings( '.uabb-form-error-message' ).show();
						phone.siblings().addClass( 'uabb-form-error-message-required' );
    				} else {
    					phone.siblings().removeClass( 'uabb-form-error-message-required' );
						phone.parent().removeClass( 'uabb-error' );
						phone.siblings( '.uabb-form-error-message' ).hide();
    				}
				}
			} else {
				phone.siblings().removeClass( 'uabb-form-error-message-required' );
			}

			if( phone.length ) {
				if ( phone.val().trim() !== '' ) {
					if( phone_regex.test( phone.val().trim() ) ) {
						phone.parent().removeClass( 'uabb-error' );
						phone.siblings( '.uabb-form-error-message' ).hide();
					} else {
						isValid = false;
						phone.parent().addClass( 'uabb-error' );
						phone.siblings( '.uabb-form-error-message' ).show();
					}
				}
			}
			
			// validate the message..just make sure it's there
			if ( (self.msg_required == 'yes') && ( self.msg_toggle == 'show' ) ) {
				if ( message.val().trim() === '' ) {
					isValid = false;
					message.parent().addClass( 'uabb-error' );
					message.siblings( '.uabb-form-error-message' ).show();
				} 
				else if ( message.parent().hasClass( 'uabb-error' ) ) {
					message.parent().removeClass( 'uabb-error' );
					message.siblings( '.uabb-form-error-message' ).hide();
				}
			}

			if ( termsCheckbox.length ) {
				if ( ! termsCheckbox.is(':checked') ) {
					isValid = false;
					termsCheckbox.closest( '.uabb-contact-form .uabb-terms-checkbox' ).addClass( 'uabb-error' );
				}
				else if ( termsCheckbox.closest( '.uabb-contact-form .uabb-terms-checkbox' ).hasClass( 'uabb-error' ) ) {
					termsCheckbox.closest( '.uabb-contact-form .uabb-terms-checkbox' ).removeClass( 'uabb-error' );
				}
			}

			// validate if reCAPTCHA is enabled and checked
			if ( 'v2' == self.recaptcha_version && reCaptchaField.length > 0 ) {
				if ( 'undefined' === typeof reCaptchaValue || reCaptchaValue === false ) {
					isValid = false;
					reCaptchaField.parent().addClass( 'uabb-error' );
				} else {
					reCaptchaField.parent().removeClass('uabb-error');
				}
			}
			
			// end if we're invalid, otherwise go on..
			if ( !isValid ) {
				return false;
			} 
			else {
			
				// disable send button
				$recaptcha_version = self.recaptcha_version;
				submit.addClass( 'uabb-disabled' );
				submit.html( '<span>'+self.button.closest( '.uabb-contact-form-button' ).data( 'wait-text' )+'</span>' );
				$reCaptchaValue = reCaptchaValue;

				// post the form data
				$.post(ajaxurl, {
					action	: 'uabb_builder_email',
					security : _nonce,
					name	: name.val(),
					subject	: subject.val(),
					email	: email.val(),
					phone	: phone.val(),
					mailto	: mailto.val(),
					message	: message.val(),
					recaptcha_version : $recaptcha_version,
					recaptcha_response : reCaptchaValue,
					terms_checked		: termsCheckbox.is( ':checked' ) ? '1' : '0',
					post_id 			: postId,
					node_id 			: nodeId,
					template_id 		: templateId,
					template_node_id 	: templateNodeId
				}, $.proxy( self._submitComplete, self ) );
			}
		},

		_removeExtraSpaces: function() {
			var textValue = $( this ).val();
		    textValue = textValue.replace( / /g,"" );
			$( this ).val( textValue )
		},
		
		_removeErrorClass: function(){
			$( this ).parent().removeClass( 'uabb-error' );
			$( this ).siblings( '.uabb-form-error-message' ).hide();
		},

		_submitComplete: function( response ) {
			var nodeClass   = this.nodeClass,
				urlField 	= $( nodeClass + ' .uabb-success-url' ),
				submit	  	= $( nodeClass + ' .uabb-contact-form-submit' ),
				noMessage 	= $( nodeClass + ' .uabb-success-none' );

			submit.html( '<span>'+this.button_text+'</span>' );
			
			// On success show the success message
			if( response === '1' || response == 1 || response == '1' ) {

				$( nodeClass + ' .uabb-send-error' ).fadeOut();
				
				if ( urlField.length > 0 ) {
					window.location.href = urlField.val();
				} 
				else if ( noMessage.length > 0 ) {
					noMessage.fadeIn();
				}
				else {
					$( nodeClass + ' .uabb-contact-form' ).hide();
					$( nodeClass + ' .uabb-success-msg' ).fadeIn();
				}
			} 
			// On failure show fail message and re-enable the send button
			else {
				$( nodeClass + ' .uabb-contact-form-submit' ).removeClass( 'uabb-disabled' );
				$( nodeClass + ' .uabb-send-error' ).fadeIn();
				return false;
			}
		}
	};
	
})(jQuery);